<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'name' => "Benjamin",
            'email' => "abcabc@abc.com",
            'password' => Hash::make('123123123'),
            'is_admin' => 1,
            'location' => 'abcxyz'
        ]);
    }
}
