<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Anil Sidhu',
            'email' => 'anil@sidhu.com',
            'password' => Hash::make('123')
        ]);
    }
}
