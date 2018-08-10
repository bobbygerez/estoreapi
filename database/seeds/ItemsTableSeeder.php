<?php

use Illuminate\Database\Seeder;
use App\Model\City;
use App\Model\Brgy;
use App\Model\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        $citymunCode = City::orderBy('citymunCode')->select(['citymunCode'])->get();
        $brgyCode = Brgy::orderBy('brgyCode')->select(['brgyCode'])->get();
        for ($i=0; $i < 1000; $i++) { 
        	
        	$item = Item::create([
        			'user_id' => rand(1,4),
        			'unit_id' => rand(1, 10),
        			'category_id' => rand(1, 8),
        			'subcategory_id' => rand(1, 26),
        			'further_category_id' => rand(1, 99),
                    'brgyCode' => rand(1, 42029),
                    'citymunCode' => rand(1, 1646),
                    'provCode'=> rand(1, 87),
        			'name' =>  $faker->text($maxNbChars = 35),
                    'amount' => $faker->randomFloat($nbMaxDecimals = 2, $min = 50, $max = 99000),
                    'discount' => $faker->numberBetween($min = 1, $max = 99),
        			'short_desc' => $faker->text($maxNbChars = 100) 
        		]);

            Item::find($item->id)->colors()->attach($item->id, [
                    'color_id' => rand(1, 11),
                    'item_id' => $item->id
                ]);

        }
    }
}
