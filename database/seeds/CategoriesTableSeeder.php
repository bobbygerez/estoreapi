<?php

use Illuminate\Database\Seeder;
use App\Model\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $categories = ['Consumer Electronics','Machinery', 'Apparel', 'Automobiles & Motorcyles', 'Home & Garden', 'Beauty & Personal Care', 'Health & Medical', 'Sports & Entertainment'];
        foreach ($categories as $key => $value) {
        	Category::create([
        			'name' => $value,
        		]);
        }
    }
}
