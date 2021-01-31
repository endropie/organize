<?php
namespace Database\Seeders;

use App\Models\Member;
use App\Models\Premium;
use App\Models\Region;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SamplePremiumMember extends Seeder
{
    public function run()
    {
        if(env('APP_ENV') == 'local')
        {
            \DB::table('members')->delete();
            \DB::table('premiums')->delete();

            $prefix = "123456789";
            $faker = Faker::create('id_ID');
            $faker->addProvider(new \Faker\Provider\ro_RO\PhoneNumber($faker));

            for ($i=1; $i <= 20; $i++) {
                $premium = Premium::create([
                    "number"    => $prefix . str_pad($i, 3, "0", STR_PAD_LEFT),
                    "region_id" => Region::inRandomOrder()->first()->id,
                ]);

                for ($m=1; $m <= rand(1, 10); $m++) {
                    $gender = rand(0,10) < 6 ? 'MALE' : "FEMALE";

                    $premium->members()->create([
                            "number" => $premium->number . str_pad($m, 2, "0", STR_PAD_LEFT),
                            "name" => $faker->name(strtolower($gender)),
                            "gender" => $gender,
                            "birth_date" => $faker->date,
                            "birth_place" => $faker->city,
                            "contact_code" =>  "62",
                            "contact" =>  $faker->tollFreePhoneNumber,
                            "address" =>  $faker->address,
                    ]);
                }
            }
        }
    }
}
