<?php

use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
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
            DB::table('suppliers')->insert([ //,
            	'supplier_code' => 'SPL00'.$i++,
            	'name' => $faker->company,
            	'addres' => $faker->address,
            	'telp' => $faker->e164PhoneNumber,
            	]);
        }
    }
}
