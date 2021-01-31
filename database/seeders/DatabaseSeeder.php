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
            'ability' => [
                'roles' =>  ['*']
            ]
        ]);

        User::updateOrCreate([ 'email' => "demo@". env('APP_DOMAIN', 'laravel.dev') ], [
            'name' => "Demo",
            'email' => "demo@". env('APP_DOMAIN', 'laravel.dev'),
            'password' => bcrypt('demo'),
        ]);

        if(env('APP_ENV') == "local")
        {
            foreach (User::$ROLES as $role) {
                if ($role == 'member-region') {
                    foreach (\App\Models\Region::get() as $region) {
                        $user = $this->createMemberRegionRule($role."-".$region->id);
                        $user->update(['ability->roles' => [$role]]);
                        $user->update(['ability->regions' => [$region->id]]);
                    }
                }
                else {
                    $user = $this->createMemberRegionRule($role);
                    $user->update(['ability->roles' => [$role]]);
                }
            }
        }


    }

    public function createMemberRegionRule ($role)
    {
        return User::updateOrCreate(['email' => strtolower($role) ."@". env('APP_DOMAIN', 'laravel.dev'),],[
            'name' => ucfirst(str_replace("-", " ", $role)),
            'email' => strtolower($role) ."@". env('APP_DOMAIN', 'laravel.dev'),
            'password' => bcrypt(strtolower($role)),
            // 'ability' => ['roles' => [$role]]
        ]);
    }
}
