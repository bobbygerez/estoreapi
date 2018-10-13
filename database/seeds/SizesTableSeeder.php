<?php

use Illuminate\Database\Seeder;
use App\Model\Size;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $sizes = ['XS', 'S', 'M', 'L', 'XL'];
        foreach ($sizes as $value) {
        	
        	Size::create([
        			'user_id' => rand(1, 4),
        			'store_id' => rand(1, 98),
        			'branch_id' => rand(1, 98),
        			'name' => $value,
        			'desc' => ''
        		]);
        }
    }
}
