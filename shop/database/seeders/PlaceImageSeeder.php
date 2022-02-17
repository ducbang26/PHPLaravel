<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('place_images')->insert([
            ['place_id'=>1, 'image'=>'https://dulichvgo.herokuapp.com/uploads/place_images/dalat1.jpg'],
            ['place_id'=>1, 'image'=>'https://dulichvgo.herokuapp.com/uploads/place_images/dalat2.jpg'],
            ['place_id'=>1, 'image'=>'https://dulichvgo.herokuapp.com/uploads/place_images/dalat3.jpg'],
            ['place_id'=>2, 'image'=>'https://dulichvgo.herokuapp.com/uploads/place_images/hoian1.jpg'],
            ['place_id'=>2, 'image'=>'https://dulichvgo.herokuapp.com/uploads/place_images/hoian2.jpg'],
            ['place_id'=>2, 'image'=>'https://dulichvgo.herokuapp.com/uploads/place_images/hoian3.jpg'],
            ['place_id'=>2, 'image'=>'https://dulichvgo.herokuapp.com/uploads/place_images/hoian4.jpg'],
            ['place_id'=>3, 'image'=>'https://dulichvgo.herokuapp.com/uploads/place_images/muine1.jpg'],
            ['place_id'=>3, 'image'=>'https://dulichvgo.herokuapp.com/uploads/place_images/muine2.jpg'],
            ['place_id'=>4, 'image'=>'https://dulichvgo.herokuapp.com/uploads/place_images/cauvang1.jpg'],
            ['place_id'=>4, 'image'=>'https://dulichvgo.herokuapp.com/uploads/place_images/cauvang2.jpg'],            
            ['place_id'=>5, 'image'=>'https://dulichvgo.herokuapp.com/uploads/place_images/phuquoc1.jpg'],
            ['place_id'=>5, 'image'=>'https://dulichvgo.herokuapp.com/uploads/place_images/phuquoc2.jpg'],
        ]);
    }
}
