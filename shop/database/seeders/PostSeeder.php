<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            ['place_id'=>1,
            'user_id'=>1,
            'content'=>'Đà Lạt đẹp quá bà con ơi. Tết này đi là hết ý!!',
            'star'=>5,
            'popular'=>true,
            'updated_at'=>'2022-01-23T09:46:46.000000Z',
            'created_at'=>'2022-01-23T09:46:46.000000Z'
            ],
            ['place_id'=>2,
            'user_id'=>1,
            'content'=>'Phố cổ Hội An  này tui đi có tầm chục lần mà có chán đâu hehe',
            'star'=>5,
            'popular'=>false,
            'updated_at'=>'2022-01-22T09:46:46.000000Z',
            'created_at'=>'2022-01-22T09:46:46.000000Z'
            ],
            ['place_id'=>3,
            'user_id'=>2,
            'content'=>'resort Mũi Né trên cả tuyệt vời á anh em. Có dịp tui sẽ trở lại',
            'star'=>5,
            'popular'=>true,
            'updated_at'=>'2022-01-24T09:46:46.000000Z',
            'created_at'=>'2022-01-24T09:46:46.000000Z'
            ],
        ]);
    }
}
