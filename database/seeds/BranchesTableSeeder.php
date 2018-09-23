<?php

use Illuminate\Database\Seeder;
use App\Model\Branch;
use App\Model\Store;
class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Faker\Factory::create();

        for ($i=1; $i < 99; $i++) { 
        	$branch = new Branch();
        	$branch->name = $faker->company;
        	$branch->desc = $faker->sentence($nbWords = 6, $variableNbWords = true);
        	$branch->store_id = $i;
        	$branch->save();
        }
    }
}
