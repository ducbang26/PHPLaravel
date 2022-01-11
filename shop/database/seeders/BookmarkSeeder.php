<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookmarks')->insert([
            ['place_id'=>2, 'user_id'=>1],
            ['place_id'=>3, 'user_id'=>1],
            ['place_id'=>1, 'user_id'=>2],
        ]);
    }
}
