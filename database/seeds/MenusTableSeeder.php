<?php

use Illuminate\Database\Seeder;
use App\Model\Menu;
use App\Model\User;
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
        	
        	$m = Menu::create([
        			'name' => $value,
        			'to' => $value
        		]);

            $user = User::find(1);

            $user->menus()->attach(1, [
                    'user_id' => 1,
                    'menu_id' => $m->id
                ]);

        }




    }
}
