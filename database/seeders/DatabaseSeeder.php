<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CountriesTable::class,
            LedgersTable::class,
            TransactionsTable::class,
            SamplePremiumMember::class,
        ]);

        $this->createUserAdmin();

        // User::factory(10)->create();
    }

    protected function createUserAdmin ()
    {

        User::updateOrCreate([ 'email' => "admin@". env('APP_DOMAIN', 'laravel.dev') ], [
            'name' => "Administarator",
            'email' => "admin@". env('APP_DOMAIN', 'laravel.dev'),
            'password' => bcrypt(env('APP_DOMAIN', 'laravel.dev')),
            'ability' => ['*']
        ]);

        User::updateOrCreate([ 'email' => "demo@". env('APP_DOMAIN', 'laravel.dev') ], [
            'name' => "Demo",
            'email' => "demo@". env('APP_DOMAIN', 'laravel.dev'),
            'password' => bcrypt('demo'),
        ]);

        if(env('APP_ENV') == "local")
        {
            foreach (User::$ROLES as $role) {
                $user = User::updateOrCreate(['email' => strtolower($role) ."@". env('APP_DOMAIN', 'laravel.dev'),],[
                    'name' => ucfirst(str_replace("-", " ", $role)),
                    'email' => strtolower($role) ."@". env('APP_DOMAIN', 'laravel.dev'),
                    'password' => bcrypt(strtolower($role)),
                    'ability' => [$role]
                ]);
            }
        }
    }
}
