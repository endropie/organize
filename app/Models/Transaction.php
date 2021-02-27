<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\GenerateNumber;
use App\Traits\HasCommentable;
use App\Traits\HasKeyUUID;
use App\Traits\HasVariability;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, HasKeyUUID, HasVariability, HasCommentable, Filterable, GenerateNumber;

    protected $fillable = [
        'number',
        'date',
        'type',
        'amount',
        'variability'
    ];

    protected $dates = [
        'date'
    ];

    protected $casts = [
        'variability' => 'array',
        'amount' => 'double',
    ];

    protected $variability_defaults = [
        'credits' => [],
        'debits' => [],
    ];

    public function premiums ()
    {
        return $this->hasMany(Premium::class);
    }

    public function premiables ()
    {
        return $this->hasMany(Premiable::class);
    }

    public function amountables ()
    {
        return $this->morphMany(Amountable::class, 'amountable');
    }

    public function premiate ()
    {
        $this->premiables()->delete();

        if ($this->type == 'PREMIUM' && !empty($this->variability['items'])) {
            foreach ($this->variability['items'] as $item) {
                $premium = app(\App\Models\Premium::class)->code($item['premium_code']);

                foreach ($premium->getPremiPeriodNext($item['quantity']) as $period) {
                    $this->premiables()->create([
                        'price' => $item['price'],
                        'period' => $period,
                        'premium_id' => $premium->id
                    ]);
                }
            }

        }

        return $this->premiables->fresh();
    }

    public function amountate ()
    {
        $this->amountables()->delete();

        foreach (($this->variability['credits'] ?? []) as $code => $amount) {
            $ledger = Ledger::code($code);
            // dd($code, $amount, $ledger);
            $this->amountables()->create([
                'ledger_id' => $ledger->id,
                'date' => $this->date,
                'credit' => $amount,
            ]);
        }
        foreach (($this->variability['debits'] ?? []) as $code => $amount) {

            $ledger = Ledger::code($code);
            $this->amountables()->create([
                'ledger_id' => $ledger->id,
                'date' => $this->date,
                'debit' => $amount,
            ]);
        }

        return $this->amountables->fresh();
    }

    public function getLabelAttribute ()
    {
        return $this->variability['label'] ?? '-';
    }

    public function getGenerateNumberPrefix()
    {
        return 'TRX';
    }

    public function getGenerateNumberPeriod()
    {
        return $this->date->format('y') . $this->getGenerateNumberSeparator() . $this->date->format('m');
    }
}
