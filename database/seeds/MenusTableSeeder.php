<?php

use Illuminate\Database\Seeder;
use App\Model\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $menus = ['Users', 'Categories', 'SubCategories', 'FurtherCategories'];

        foreach ($menus as $value) {
        	
        	Menu::create([
        			'name' => $value,
        			'to' => $value
        		]);
        }
    }
}
