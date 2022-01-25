<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hotels')->insert([
            ['place_id'=>1, 'hotel_name'=>'Terracotta Hotel & Resort Dalat', 'image'=>'https://dulichvgo.herokuapp.com/uploads/hotel_images/khachsan1.jpg', 'location'=>'Phân khu chức năng 7.9, KDL hồ Tuyền Lâm, Lâm Đồng', 'kinhDo'=>'11.8986292', 'viDo'=>'108.4359433'],
            ['place_id'=>1, 'hotel_name'=>'Ghé Nhà Mình homestay', 'image'=>'https://dulichvgo.herokuapp.com/uploads/hotel_images/khachsan2.jpg', 'location'=>'Trạm Hành, Thành phố Đà Lạt, Lâm Đồng', 'kinhDo'=>'11.8612636', 'viDo'=>'108.5520484'],
            ['place_id'=>2, 'hotel_name'=>'Palm Garden Resort - Hoi An', 'image'=>'https://dulichvgo.herokuapp.com/uploads/hotel_images/khachsan3.png', 'location'=>'Lạc Long Quân, Hội An, Quảng Nam', 'kinhDo'=>'15.9008048', 'viDo'=>'108.3568353'],
            ['place_id'=>3, 'hotel_name'=>'Pandanus Resort', 'image'=>2, 'location'=>'Số 3 Đường Nguyễn Hữu Thọ, Mũi Né', 'kinhDo'=>'10.9563945', 'viDo'=>'108.113601'],
        ]);
    }
}
