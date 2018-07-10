<?php

use Illuminate\Database\Seeder;
use App\Model\User;
use App\Model\Category;
use App\Model\SubCategory;
use App\Model\FurtherCategory;
use App\Model\Unit;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        Category::truncate();
        SubCategory::truncate();
        FurtherCategory::truncate();
        Unit::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SubCategoriesTableSeeder::class);
        $this->call(FurtherCategoriesTableSeeder::class);
<<<<<<< HEAD
=======
        $this->call(UnitsTableSeeder::class);
>>>>>>> b3b7de12289a4665cd3111463c0eeb2ea0b74158
    }
}
