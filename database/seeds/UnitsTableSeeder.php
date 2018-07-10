<?php

use Illuminate\Database\Seeder;
use App\Model\Unit;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = [
        	'pc/s', 'kgs', 'box', 'pack'
        ];
        foreach ($units as $unit) {
        	
        	Unit::create([
                    'type' => 'product',
        			'name' => $unit,
                    'user_id' => rand(1,4)
        		]);
        }
         $units = [
            'g', 'kg'
        ];
        foreach ($units as $unit) {
            
            Unit::create([
                    'type' => 'weight',
                    'name' => $unit,
                    'user_id' => rand(1,4)
                ]);
        }
        $units = [
            'm', 'cm', 'mm', 'in', 'ft'
        ];
        foreach ($units as $unit) {
            
            Unit::create([
                    'type' => 'length',
                    'name' => $unit,
                    'user_id' => rand(1,4)
                ]);
        }
        
         $units = [
            'l', 'ml', 'gal'
        ];
        foreach ($units as $unit) {
            
            Unit::create([
                    'type' => 'volume',
                    'name' => $unit,
                    'user_id' => rand(1,4)
                ]);
        }
    }
}
