<?php

use Illuminate\Database\Seeder;
use App\Model\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        		'firstname' => 'super',
        		'lastname' => 'admin ',
        		'email' => 'superAdmin@juanmerkado.com',
        		'password' => Hash::make('12345678')

        	]);

       $user = User::create([
                'firstname' => 'store',
                'lastname' => 'admin',
                'email' => 'storeAdmin@juanmerkado.com',
                'password' => Hash::make('12345678')

            ]);

        $user = User::create([
                'firstname' => 'Super',
                'lastname' => 'Staff',
                'email' => 'superStaff@juanmerkado.com',
                'password' => Hash::make('12345678')

            ]);
         $user = User::create([
                'firstname' => 'Store',
                'lastname' => 'Staff',
                'email' => 'storeStaff@juanmerkado.com',
                'password' => Hash::make('12345678')

            ]);
    }
}
