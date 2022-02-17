<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_images')->insert([
            ['post_id'=>1, 'image'=>'https://dulichvgo.herokuapp.com/uploads/post_images/dalat1.jpg'],
            ['post_id'=>1, 'image'=>'https://dulichvgo.herokuapp.com/uploads/post_images/dalat2.jpg'],
            ['post_id'=>1, 'image'=>'https://dulichvgo.herokuapp.com/uploads/post_images/dalat3.jpg'],
            ['post_id'=>2, 'image'=>'https://dulichvgo.herokuapp.com/uploads/post_images/hoian1.jpg'],
            ['post_id'=>2, 'image'=>'https://dulichvgo.herokuapp.com/uploads/post_images/hoian2.jpg'],
            ['post_id'=>2, 'image'=>'https://dulichvgo.herokuapp.com/uploads/post_images/hoian3.jpg'],
            ['post_id'=>2, 'image'=>'https://dulichvgo.herokuapp.com/uploads/post_images/hoian4.jpg'],
            ['post_id'=>3, 'image'=>'https://dulichvgo.herokuapp.com/uploads/post_images/muine1.jpg'],
            ['post_id'=>3, 'image'=>'https://dulichvgo.herokuapp.com/uploads/post_images/muine2.jpg'],
            ['post_id'=>4, 'image'=>'https://dulichvgo.herokuapp.com/uploads/post_images/caurong1.jpg'],
            ['post_id'=>4, 'image'=>'https://dulichvgo.herokuapp.com/uploads/post_images/caurong2.jpg'],
        ]);
    }
}
