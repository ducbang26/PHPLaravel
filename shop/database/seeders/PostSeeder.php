<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            'status'=>true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            ['place_id'=>2,
            'user_id'=>1,
            'content'=>'Phố cổ Hội An  này tui đi có tầm chục lần mà có chán đâu hehe',
            'star'=>5,
            'popular'=>false,
            'status'=>true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            ['place_id'=>3,
            'user_id'=>2,
            'content'=>'resort Mũi Né trên cả tuyệt vời á anh em. Có dịp tui sẽ trở lại',
            'star'=>5,
            'popular'=>true,
            'status'=>true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            ['place_id'=>4,
            'user_id'=>3,
            'content'=>'Cầu này đẹp đẹp quá chời',
            'star'=>5,
            'popular'=>true,
            'status'=>true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
