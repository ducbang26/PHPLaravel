<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PlaceSeeder::class);
        $this->call(PlaceImageSeeder::class);
        $this->call(BookmarkSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(PostImagesSeeder::class);
        $this->call(LikesSeeder::class);
        $this->call(HotelSeeder::class);
    }
}
