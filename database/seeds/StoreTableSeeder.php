<?php

use Illuminate\Database\Seeder;
use App\Model\Store;
use App\Model\Address;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Faker\Factory::create();

        for ($i=1; $i < 100; $i++) { 
        	
        	$store = Store::create([
        			'name' => $faker->company,
        			'desc' => $faker->sentence($nbWords = 6, $variableNbWords = true)
        		]);

        	$newStore = Store::find($store->id);

        	$newAddress = new Address();
        	$newAddress->street_lot_blk = $faker->streetAddress;
        	$newAddress->latitude = $faker->latitude($min = 9, $max = 11); 
        	$newAddress->longitude = $faker->longitude($min = 122, $max = 124);
        	$newAddress->province_id = rand(1, 88);
        	$newAddress->city_id = rand(1, 1647);
            $newAddress->brgy_id = rand(1, 42029);
        	$newStore->address()->save($newAddress);

        }
    }
}
