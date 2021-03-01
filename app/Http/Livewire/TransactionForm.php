<?php

namespace App\Http\Livewire;

use App\Models\Premium;
use App\Models\Transaction;
use App\Traits\HasWireDialog;
use Livewire\Component;

class TransactionForm extends Component
{
    use HasWireDialog;

    protected $listeners = [
        'transaction.form.dialog' => 'setDialog',
        'transaction.form.setItemPremium' => 'setItemPremium'
    ];

    public $setup = [
        'PREMIUM' => ['DEBIT' => 1111, 'CREDIT' => 4112],
        'INCOME' => ['DEBIT' => 1111, 'CREDIT' => 4111],
        'EXPENSE' => ['DEBIT' => 5111, 'CREDIT' => 1111],
    ];

    public $record = null;

    protected $validationAttributes = [
        'record.type' => 'Jenis',
        'record.date' => 'Tanggal',
        'record.amount' => 'Jumlah',
        'record.variability.items.*.premium_code' => 'BaseID',
        'record.variability.items.*.quantity' => 'Jumlah',
        'record.variability.items.*.price' => 'Harga',
    ];

    protected function rules ()
    {
        return [
            'record.type' => 'required',
            'record.date' => 'required',
            'record.amount' => 'required',
            'record.variability.items' => $this->record['type'] == 'PREMIUM' ? 'required|min:1' : '',
            'record.variability.items.*.premium_code' => $this->record['type'] == 'PREMIUM' ? 'required|exists:premiums,code,verified_at,NOT_NULL|distinct' : '',
            'record.variability.items.*.quantity' => $this->record['type'] == 'PREMIUM' ? 'required' : '',
            'record.variability.items.*.price' => $this->record['type'] == 'PREMIUM' ? 'required' : '',
        ];
    }

    public function dialogCreated()
    {
        if ($this->dialog['mode'] == 'update')
        {
            $this->setRecord($this->dialog['id']);
        }
        else {
            ## DEFAULT IS MODE "CREATE"
            $this->record = [
                'type' => null,
                'amount' => null,
                'date' => date('Y-m-d'),
                'variability' => [
                    'label' => null,
                    'debit' => [],
                    'credit' => [],
                ]
            ];
            $this->reset('setup');
        }

    }

    public function dialogClosed()
    {
        $this->resetValidation();
        $this->reset('setup', 'record');
    }

    public function setRecord ($id)
    {
        if($record = Transaction::find($id))
        {
            $this->record = $record->toArray();
            $this->record['date'] = $record->date->format('Y-m-d');
            if (in_array($this->record['type'], ['INCOME', 'EXPENSE', 'PREMIUM']))
            {
                // dd(array_keys($this->record['variability']['credits'])[0]);
                $this->setup[$this->record['type']]['CREDIT'] = array_keys($this->record['variability']['credits'])[0];
                $this->setup[$this->record['type']]['DEBIT'] = array_keys($this->record['variability']['debits'])[0];
            }
        }
        else {
            $this->emit('app.notify', ['type' => 'error', 'message' => "ID [" .((string) $id). "] invalid"]);
            $this->setClose();
        }
    }

    public function updated ($name, $value)
    {
        $str = \Str::of($name);
        if($name == 'record.type') $this->setTransactionType($value);
        if($this->record['type'] == 'PREMIUM' && $str->startsWith('record.variability.items.')) {
            if($str->endsWith('quantity') || $str->endsWith('price')) {
                $this->record['amount'] = (double) collect($this->record['variability']['items'])->sum(function ($item) {
                    return (double) intval($item['quantity']) * intval($item['price']);
                });
            }
        }

        if($str->startsWith('record.')) $this->validateOnly($name);
    }

    public function save ()
    {

        $this->validate();

        if (in_array($this->record['type'], ['INCOME' , 'EXPENSE', 'PREMIUM']))
        {
            $this->record['variability']['debits']  = [$this->setup[$this->record['type']]['DEBIT'] => $this->record['amount']];
            $this->record['variability']['credits'] = [$this->setup[$this->record['type']]['CREDIT'] => $this->record['amount']];

            \DB::beginTransaction();
            $record = Transaction::updateOrcreate(['id' => $this->record['id'] ?? null], $this->record);
            $record->amountate();
            $record->premiate();
            \DB::commit();

            $this->emit('app.notify', ['type' => 'success', 'message' => "Transaksi [$record->number] Tersimpan."]);
            $this->setClose();
        }
        elseif ($this->record['type'] == 'GENERAL')
        {
            dd('GENERAL SAVE NO AVAILABEL');
        }
        else {
            $this->emit('app.notify', ['type' => 'error', 'message' => "SIMPAN [TYPE:". $this->record['type'] ."] GAGAL"]);
        }
    }

    public function delete()
    {
        if($trx = Transaction::find($this->record['id'] ?? null))
        {
            \DB::beginTransaction();
            $trx->amountables()->delete();
            $trx->unpremiate();
            $trx->delete();
            \DB::commit();

            return $this->setClose();
        }

        $this->emit('app.notify', ['type' => 'error', 'message' => "HAPUS GAGAL. [ID:Failed]"]);
    }

    public function setTransactionType($type)
    {
        $record['variability']['debit'] = [];
        $record['variability']['credit'] = [];

        if (in_array($type, ['INCOME', 'EXPENSE']))
        {
            $record['variability']['debit'][$this->setup[$type]['DEBIT']] = null;
            $record['variability']['credit'][$this->setup[$type]['CREDIT']] = null;
            unset($this->record['variability']['items']);
        }
        elseif ($type == 'PREMIUM') {
            $record['variability']['debit'][$this->setup[$type]['DEBIT']] = null;
            $record['variability']['credit'][$this->setup[$type]['CREDIT']] = null;
            $this->record['variability']['items'] = array();
            $this->addItemPremium();
        }
        elseif ($type == 'GENERAL') {
            $this->record['variability']['items'] = array();
            $this->addItemPremium();
        }
        else $this->emit('app.notify', ['message' => 'Silahkan pilih type trnsaksi']);

        $this->reset('setup');
    }

    public function setItemPremium ($name, $value)
    {
        $keys = explode('.',$name);
        $this->record['variability']['items'][$keys[3]][$keys[4]] = $value;
        if ($premium = Premium::where('code', $value)->first()) {
            $this->record['variability']['items'][$keys[3]]['price'] = $premium->cost;
            $this->updated("record.variability.items.$keys[3].price", $premium->cost);
        }

        $this->record['variability']['label'] = "Setoran Donasi [". $this->getPremiumLabel() ."]";
    }

    protected function getPremiumLabel ()
    {
        if ($this->record['variability']['items'])
        {
            return collect($this->record['variability']['items'])->whereNotNull('premium_code')->pluck('premium_code')->join(', ');
        }
        return '';
    }

    public function addItemPremium()
    {
        $this->record['variability']['items'][] = [
            'premium_code' => null,
            'quantity' => null,
            'price' => null,
        ];
    }

    public function deleteItemPremium($key)
    {
        unset($this->record['variability']['items'][$key]);

        if (count($this->record['variability']['items']) <= 0) $this->addItemPremium();
    }

    public function addItemGeneral()
    {
        $this->record['variability']['items'][] = [
            'ledger_code' => null,
            'credit' => null,
            'debit' => null,
        ];
    }

    public function deleteItemGeneral($key)
    {
        if (count($this->record['variability']['items']) > 2) {
            unset($this->record['variability']['items'][$key]);
        }
        else {
            $this->emit('app.notify', ['type' => 'warnign', 'message' => 'Penghapusan gagal. Minimal 2 baris']);
        }
    }

    public function render()
    {
        return view('livewire.transaction-form', [
            'income_ledgers' => \App\Models\Ledger::where('isgroup', 0)->where('type', 'INCOME')->get(),
            'expense_ledgers' => \App\Models\Ledger::where('isgroup', 0)->where('type', 'EXPENSE')->get(),
            'asset_ledgers' => \App\Models\Ledger::where('isgroup', 0)->where('type', 'ASSET')->get(),
            'types' => ['GENERAL' => 'Umum', 'INCOME' => 'Pemasukan', 'EXPENSE' => 'Pengeluaran', 'PREMIUM' => 'Donasi Sosial'],
        ]);
    }
}
