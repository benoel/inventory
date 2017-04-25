<?php

use Illuminate\Database\Seeder;

class OutletTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

    	$limit = 30;

    	for ($i = 3; $i < $limit; $i++) {
            DB::table('outlets')->insert([ //,
            	'outlet_code' => 'OTL00'.$i++,
            	'name' => $faker->unique()->colorName,
            	'addres' => $faker->address,
            	'telp' => $faker->e164PhoneNumber,
            	]);
        }
    }
}
