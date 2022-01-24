<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->insert([
            ['post_id'=>2, 'user_id'=>1],
            ['post_id'=>3, 'user_id'=>1],
            ['post_id'=>1, 'user_id'=>2],
            ['post_id'=>1, 'user_id'=>1],
        ]);
    }
}
