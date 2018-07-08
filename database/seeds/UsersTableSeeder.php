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
        		'firstname' => 'admin',
        		'lastname' => 'admin lastname',
        		'email' => 'admin@juanmerkado.com',
        		'password' => Hash::make('12345678')

        	]);

       $user = User::create([
                'firstname' => 'user 1',
                'lastname' => 'user 1',
                'email' => 'user1@juanmerkado.com',
                'password' => Hash::make('12345678')

            ]);
    }
}
