<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
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
            DB::table('products')->insert([ //,
            	'name' => $faker->unique()->sentence($nbWords = 2, $variableNbWords = true),
            	'code' => $faker->unique()->ean13(),
            	'category_id' => $faker->randomElement($array = array ('1' , '2')),
            	'unit_id' => $faker->randomElement($array = array ('1' , '2', '3', '4')),
            	'stock' => rand(1, 15),
            	]);
        }
    }
}
