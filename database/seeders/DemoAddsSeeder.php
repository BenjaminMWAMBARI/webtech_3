<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DemoAddsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table users is empty
        if(DB::table('adds')->count() == 0){

            DB::table('adds')->insert([

              
                [
                    'title' => 'Mobiles',
                    'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
                                        exercitation ullamco laboris nisi ut",
                        'user_id' => 1,
                        "price" => 200,
                        'cat_id' => 1,
                        'location' => 'abc',
                        "photos" => '["img-0.jpg"]',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Vehicles',
                    'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
                    exercitation ullamco laboris nisi ut",
                    'user_id' => 1,
                    "price" => 200,
                    'cat_id' => 2,
                    'location' => 'abc',
                    "photos" => '["img-1.jpg"]',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Computers',
                    'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
                    exercitation ullamco laboris nisi ut",
                    'user_id' => 1,
                    "price" => 200,
                    'cat_id' => 3,
                    'location' => 'abc',
                    "photos" => '["img-2.png"]',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
              

            ]);
            
        } 
    }
}
