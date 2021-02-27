<?php
namespace Database\Seeders;

use App\Models\Ledger;
use Illuminate\Database\Seeder;

class LedgersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('ledgers')->delete();

        $arrays = [
            ['code' => '1000', 'name' => 'Aktiva', 'type' => 'ASSET', 'isgroup' => true],
            ['code' => '2000', 'name' => 'Kewajiban', 'type' => 'LIABILITY', 'isgroup' => true],
            ['code' => '3000', 'name' => 'Modal', 'type' => 'EQUITY', 'isgroup' => true],
            ['code' => '4000', 'name' => 'Pemasukan', 'type' => 'INCOME', 'isgroup' => true],
            ['code' => '5000', 'name' => 'Pengeluaran', 'type' => 'EXPENSE', 'isgroup' => true],

            ['code' => '1100', 'name' => 'Kas & Bank', 'type' => 'ASSET', 'parent' => '1000', 'isgroup' => true],
            ['code' => '1111', 'name' => 'Kas', 'type' => 'ASSET', 'parent' => '1100'],
            ['code' => '1121', 'name' => 'Bank', 'type' => 'ASSET', 'parent' => '1100'],

            ['code' => '4111', 'name' => 'Pemasukan Umum', 'type' => 'INCOME', 'parent' => '4000'],
            ['code' => '4112', 'name' => 'Pemasukan Sosial', 'type' => 'INCOME', 'parent' => '4000'],
            ['code' => '4113', 'name' => 'Pemasukan acara', 'type' => 'INCOME', 'parent' => '4000'],
            ['code' => '4114', 'name' => 'Pemasukan lainnya', 'type' => 'INCOME', 'parent' => '4000'],

            ['code' => '5111', 'name' => 'Pengeluaran Umum', 'type' => 'EXPENSE', 'parent' => '5000'],
            ['code' => '5112', 'name' => 'Pengeluaran Sosial', 'type' => 'EXPENSE', 'parent' => '5000'],
            ['code' => '5113', 'name' => 'Pengeluaran Ranah', 'type' => 'EXPENSE', 'parent' => '5000'],
            ['code' => '5114', 'name' => 'Pengeluaran Lainnya', 'type' => 'EXPENSE', 'parent' => '5000'],
        ];

        foreach ($arrays as $row) {
            if (!empty($row['parent']))
            {
                $parent = Ledger::code($row['parent']);
                $row['parent'] = $parent->id;
            }
            $ledger = Ledger::UpdateOrCreate(['code' => $row['code']], $row);
        }

    }
}
