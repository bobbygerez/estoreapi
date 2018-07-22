<?php

use Illuminate\Database\Seeder;
use App\Model\Color;
use App\Model\Image;
class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ['Wht', 'Ylw', 'Fuc', 'Red', 'Sil', 'Gry', 'Olv', 'Pur', 'Mrn', 'Aqu', 'Lim'];

        foreach ($array as $key => $value) {
        	
        	$color = Color::create([
                    'user_id' => rand(1, 4),
        			'name' => $value
        		]);



        }

        for ($i=1; $i < 22; $i++) { 
            Image::create([
                'path' => 'images/uploads/colors/color-' . rand(1,12) . '.jpg',
                'imageable_id' => rand(1, 11),
                'imageable_type' => 'App\Model\Color',
                'is_primary' => 1
            ]);
        }

        
    }
}
