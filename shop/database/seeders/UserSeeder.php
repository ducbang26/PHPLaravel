<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['name'=>'Duc Bang', 'email'=>'bang26@gmail.com', 'password'=>bcrypt('123456'), 'profileImg'=>'/anhtest.png', 'isAdmin'=>false],
            ['name'=>'Anh Duy', 'email'=>'anhduy@gmail.com', 'password'=>bcrypt('123456'), 'profileImg'=>'/anhtest.png', 'isAdmin'=>false],
            ['name'=>'DucDuy', 'email'=>'ducduy@gmail.com', 'password'=>bcrypt('123456'), 'profileImg'=>'/anhtest.png', 'isAdmin'=>true],
        ]);
    }
}
