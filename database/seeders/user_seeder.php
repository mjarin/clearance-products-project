<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class user_seeder extends Seeder
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

            'name'=> 'admin',
            'email'=> 'admin@gmail.com',
            'phone'=> '01840253008',
            'role_as'=> 'admin',
            'password'=>Hash::make('12345678')

        ]);
    }
}
