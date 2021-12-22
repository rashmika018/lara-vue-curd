<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Lead;
use Illuminate\Database\Seeder;

class LeadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Lead::truncate();

        foreach(range(1, 1000) as $i) {
            Lead::create([
                'name' =>  $faker->name,
                'email' => $faker->unique->safeEmail, 
                'phone_number' => $faker->phoneNumber,
                'birth_date' => $faker->date('Y-m-d', '-20 years'),
                'location' => $faker->streetAddress.', '.$faker->streetName.', '.$faker->address,
                'city' => $faker->city,
                'province' => $faker->state,
                'country' => $faker->country,
                'postal_code' => $faker->postcode,
                'types' => implode('', $faker->randomElements(['PROVIDER', 'RENTER', 'BUYER'], 1)),
                'is_gdpr' => $faker->boolean,
                'contract_signing_date' =>  $faker->date('Y-m-d', '-1 years'), //$faker->date('-1 years', 'now', null),
                'contract_end_date' => $faker->date('Y-m-d', '+1 years'), //$faker->dateTimeBetween('+1 years', 'now', null),
                'is_leagal' => $faker->boolean,
                'export_type' => implode('', $faker->randomElements(['ABC', null, 'GOOGLE', 'FACEBOOK', 'INSTAGRAM', 'TEST'], 1)),
                'status' => implode('', $faker->randomElements(['Active', 'Inactive'], 1)),
                'notes' =>  $faker->text
           ]);
        }
    }
}
