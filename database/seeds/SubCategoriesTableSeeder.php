<?php

use Illuminate\Database\Seeder;
use App\Model\SubCategory;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
        	'Mobile Phone & Accessories',
			'Accessories & Parts',
			'Home Audio, Video & Accessories',
			'Auto Electronics',
			'Camera', 
			'Photo & Accessories',
			'Portable Audio', 
			'Video & Accessories',
			'Video Game & Accessories',
			'Electronic Publications',
			'SubCategories 1',
			'SubCategories 2', 
			'SubCategories 3',
			'SubCategories 4',
			'SubCategories 5',
			'SubCategories 6',
			'SubCategories 7',
			'SubCategories 18', 
			'SubCategories 11',
			'SubCategories 12', 
			'SubCategories 13',
			'SubCategories 14',
			'SubCategories 15',
			'SubCategories 16',
			'SubCategories 17',
			'SubCategories 18', 
		];
		foreach ($subcategories as $key => $value) {
				
				SubCategory::create([
						'category_id' => rand(1, 8),
						'name' => $value
					]);
		}
    }
}
