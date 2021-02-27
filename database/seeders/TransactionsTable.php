<?php
namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionsTable extends Seeder
{

    public function run()
    {

        \DB::table('transactions')->delete();
        $arrays = [
            ['date' => '2019-03-30', 'type' => 'INCOME', 'amount' => 73107000, 'credits' => ['4111' => 73107000], 'debits' => ['1111' => 73107000], 'label' => 'KAS Milad IK2T' ],
            ['date' => '2019-04-16', 'type' => 'EXPENSE', 'amount' => 1000000, 'credits' => ['1111' => 1000000], 'debits' => ['5111' => 1000000], 'label' => 'Acara Kabun Milad' ],
            ['date' => '2019-04-17', 'type' => 'EXPENSE', 'amount' => 2100000, 'credits' => ['1111' => 2100000], 'debits' => ['5111' => 2100000], 'label' => 'Acara Balai Baiak' ],
            ['date' => '2019-04-18', 'type' => 'EXPENSE', 'amount' => 1780000, 'credits' => ['1111' => 1780000], 'debits' => ['5111' => 1780000], 'label' => 'Tiket Dian' ],
            ['date' => '2019-04-19', 'type' => 'EXPENSE', 'amount' => 400000, 'credits' => ['1111' => 400000], 'debits' => ['5111' => 400000], 'label' => 'Konsumsi rapat' ],
            ['date' => '2019-04-20', 'type' => 'EXPENSE', 'amount' => 20000, 'credits' => ['1111' => 20000], 'debits' => ['5111' => 20000], 'label' => 'Buat Undangan' ],
            ['date' => '2019-04-21', 'type' => 'INCOME', 'amount' => 1250000, 'credits' => ['4111' => 1250000], 'debits' => ['1111' => 1250000], 'label' => 'Uang Masuk Bodencek' ],
            ['date' => '2019-04-21', 'type' => 'INCOME', 'amount' => 1730000, 'credits' => ['4111' => 1730000], 'debits' => ['1111' => 1730000], 'label' => 'Uang Masuk Pengajian' ],
            ['date' => '2019-04-21', 'type' => 'EXPENSE', 'amount' => 1330000, 'credits' => ['1111' => 1330000], 'debits' => ['5111' => 1330000], 'label' => 'Uang Keluar Pengajian' ],
            ['date' => '2019-10-27', 'type' => 'EXPENSE', 'amount' => 500000, 'credits' => ['1111' => 500000], 'debits' => ['5111' => 500000], 'label' => 'Uang Duka Arianto' ],
            ['date' => '2019-10-27', 'type' => 'EXPENSE', 'amount' => 1000000, 'credits' => ['1111' => 1000000], 'debits' => ['5111' => 1000000], 'label' => 'Uang Duka Mintuo (Mantauk)' ],
            ['date' => '2019-10-27', 'type' => 'EXPENSE', 'amount' => 500000, 'credits' => ['1111' => 500000], 'debits' => ['5111' => 500000], 'label' => 'Uang Duka Suka Bumi' ],
            ['date' => '2019-10-27', 'type' => 'EXPENSE', 'amount' => 1000000, 'credits' => ['1111' => 1000000], 'debits' => ['5111' => 1000000], 'label' => 'Bali Kue Puncak' ],
            ['date' => '2019-10-27', 'type' => 'EXPENSE', 'amount' => 600000, 'credits' => ['1111' => 600000], 'debits' => ['5111' => 600000], 'label' => 'Minuman Rapek 2x' ],
            ['date' => '2019-10-27', 'type' => 'INCOME', 'amount' => 1800000, 'credits' => ['4111' => 1800000], 'debits' => ['1111' => 1800000], 'label' => 'Uang Masuk Pengajian' ],
            ['date' => '2019-10-27', 'type' => 'EXPENSE', 'amount' => 1790000, 'credits' => ['1111' => 1790000], 'debits' => ['5111' => 1790000], 'label' => 'Uang Keluar Pengajuan' ],
            ['date' => '2020-02-22', 'type' => 'EXPENSE', 'amount' => 500000, 'credits' => ['1111' => 500000], 'debits' => ['5111' => 500000], 'label' => 'Uang Duka Bandung' ],
            ['date' => '2020-02-22', 'type' => 'EXPENSE', 'amount' => 500000, 'credits' => ['1111' => 500000], 'debits' => ['5111' => 500000], 'label' => 'Uang Duka Pakanbaru' ],
            ['date' => '2020-02-22', 'type' => 'EXPENSE', 'amount' => 500000, 'credits' => ['1111' => 500000], 'debits' => ['5111' => 500000], 'label' => 'Uang Panggial pemuda Pesta SEP (Kiper)' ],
            ['date' => '2020-02-22', 'type' => 'EXPENSE', 'amount' => 1500000, 'credits' => ['1111' => 1500000], 'debits' => ['5111' => 1500000], 'label' => 'Acara Bandung Raya' ],
            ['date' => '2020-02-29', 'type' => 'EXPENSE', 'amount' => 700000, 'credits' => ['1111' => 700000], 'debits' => ['5111' => 700000], 'label' => 'Uang Duka Ponakan Hera Bardot' ],
            ['date' => '2020-02-29', 'type' => 'EXPENSE', 'amount' => 450000, 'credits' => ['1111' => 450000], 'debits' => ['5111' => 450000], 'label' => 'Karangan Bunga DODI' ],
            ['date' => '2020-02-29', 'type' => 'EXPENSE', 'amount' => 600000, 'credits' => ['1111' => 600000], 'debits' => ['5111' => 600000], 'label' => 'Rapek Pengurus (Mantauk)' ],
            ['date' => '2020-02-29', 'type' => 'EXPENSE', 'amount' => 3475000, 'credits' => ['1111' => 3475000], 'debits' => ['5111' => 3475000], 'label' => 'Biaya Kartu Anggota IK2T ' ],
            ['date' => '2020-02-29', 'type' => 'EXPENSE', 'amount' => 250000, 'credits' => ['1111' => 250000], 'debits' => ['5111' => 250000], 'label' => 'Minuman Rapek Pengurus 2x' ],
            ['date' => '2020-02-29', 'type' => 'EXPENSE', 'amount' => 1200000, 'credits' => ['1111' => 1200000], 'debits' => ['5111' => 1200000], 'label' => 'Acara MILAD IKAKO Amal' ],

            ['date' => '2020-04-01', 'type' => 'EXPENSE', 'amount' => 1000000, 'credits' => ['1111' => 1000000], 'debits' => ['5111' => 1000000], 'label' => 'Pembayaran masker IK2T' ],
            ['date' => '2020-11-10', 'type' => 'EXPENSE', 'amount' => 300000, 'credits' => ['1111' => 300000], 'debits' => ['5111' => 300000], 'label' => 'Konsumsi Rapat di rumah Bendahara' ],
            ['date' => '2020-01-07', 'type' => 'EXPENSE', 'amount' => 800000, 'credits' => ['1111' => 800000], 'debits' => ['5111' => 800000], 'label' => 'Konsumsi Rapat di sekretariat IKAKO' ],
            ['date' => '2020-01-07', 'type' => 'EXPENSE', 'amount' => 10000000, 'credits' => ['1111' => 10000000], 'debits' => ['5111' => 10000000], 'label' => 'Dana Talangan proposal Dasawisma Kp Tanjuang' ],
        ];

        foreach ($arrays as $key => $row) {
            $trx = new Transaction([
                'date' => $row['date'],
                'type' => $row['type'],
                'amount' => $row['amount'],
                'variability' => [
                    'label' => $row['label'],
                    'debits' => $row['debits'],
                    'credits' => $row['credits'],
                ]
            ]);

            $trx->created_at = now()->addSeconds($key);
            $trx->save();
            $trx->amountate();
        }

    }
}
