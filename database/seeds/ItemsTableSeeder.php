<?php

use Illuminate\Database\Seeder;
use App\Model\City;
use App\Model\Brgy;
use App\Model\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $provCode = ['0128','0129','0133','0155','0209','0215','0231','0250','0257','0308','0314','0349','0354','0369','0371','0377','0410','0421','0434','0456','0458','0505','0516','0517','0520', '0541','0562','0604','0606','0619','0630','0645','0679','0712','0722','0746','0761','0826','0837','0848','0860','0864','0878','0972','0973','0983','0997','1013','1018','1035', '1042','1043','1123','1124','1125','1182','1186','1247','1263','1265','1280','1298','1339','1339','1374','1375','1376','1401','1411','1427','1432','1444','1481','1507','1536','1538','1566','1570','1602','1603','1667','1668','1685','1740','1751','1752','1753','1759'];
        $citymunCode = City::orderBy('citymunCode')->select(['citymunCode'])->get();
        $brgyCode = Brgy::orderBy('brgyCode')->select(['brgyCode'])->get();
        for ($i=0; $i < 1000; $i++) { 
        	
        	$item = Item::create([
        			'user_id' => rand(1,4),
        			'unit_id' => rand(1, 10),
        			'category_id' => rand(1, 8),
        			'subcategory_id' => rand(1, 26),
        			'further_category_id' => rand(1, 99),
                    'brgyCode' => $brgyCode[rand(1, count($brgyCode) - 1)]->brgyCode,
                    'citymunCode' => $citymunCode[rand(1, count($citymunCode) - 1)]->citymunCode,
                    'provCode'=> $provCode[rand(1, count($provCode) - 1)],
        			'name' =>  $faker->text($maxNbChars = 35),
                    'amount' => $faker->randomFloat($nbMaxDecimals = 2, $min = 50, $max = 99000),
                    'discount' => $faker->numberBetween($min = 1, $max = 99),
        			'short_desc' => $faker->text($maxNbChars = 100) 
        		]);

            Item::find($item->id)->colors()->attach($item->id, [
                    'color_id' => rand(1, 11),
                    'item_id' => $item->id
                ]);

        }
    }
}
