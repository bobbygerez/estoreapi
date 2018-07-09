<?php

use Illuminate\Database\Seeder;
use App\Model\FurtherCategory;

class FurtherCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<200; $i++){
        	FurtherCategory::create([
        			'subcategory_id' => rand(1, 26),
        			'name' => 'Further Category ' . $i,
        		]);
        }
    }
}
