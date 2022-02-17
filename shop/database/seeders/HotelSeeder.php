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
            ['place_id'=>2, 'hotel_name'=>'Hoianation Villas Hotel', 'image'=>'https://dulichvgo.herokuapp.com/uploads/hotel_images/ks3.jpg', 'location'=>'Lạc Long Quân, Hội An, Quảng Nam', 'kinhDo'=>'15.8917571', 'viDo'=>'108.3192354'],
            ['place_id'=>3, 'hotel_name'=>'Pandanus Resort', 'image'=>'https://dulichvgo.herokuapp.com/uploads/hotel_images/khachsan3.png', 'location'=>'Số 3 Đường Nguyễn Hữu Thọ, Mũi Né', 'kinhDo'=>'10.9563945', 'viDo'=>'108.113601'],
            ['place_id'=>3, 'hotel_name'=>'Malibu Resort Mũi Né', 'image'=>'https://dulichvgo.herokuapp.com/uploads/hotel_images/ks4.png', 'location'=>'Biển Đông Việt Nam, tp, Bình Thuận, Việt Nam', 'kinhDo'=>'10.9420289', 'viDo'=>'108.2964029'],
            ['place_id'=>4, 'hotel_name'=>'Satya Đà Nẵng Hotel', 'image'=>'https://dulichvgo.herokuapp.com/uploads/hotel_images/ks1.jpg', 'location'=>'155 Đ.Trần Phú, Hải Châu 1, Hải Châu, Đà Nẵng', 'kinhDo'=>'16.0709849', 'viDo'=>'108.2114061'],
            ['place_id'=>4, 'hotel_name'=>'Mường Thanh Grand Đà Nẵng Hotel', 'image'=>'https://dulichvgo.herokuapp.com/uploads/hotel_images/ks5.jpg', 'location'=>'962 Ng.Quyền, An Hải Bắc, Sơn Trà, Đà Nẵng', 'kinhDo'=>'16.0602729', 'viDo'=>'108.1885426'],
            ['place_id'=>5, 'hotel_name'=>'Khách sạn Mường Thanh Luxury', 'image'=>'https://dulichvgo.herokuapp.com/uploads/hotel_images/ks2.jpg', 'location'=>'Tổ 3 Ấp, Đường Bào, Huyện Phú Quốc, Kiên Giang', 'kinhDo'=>'10.1329561', 'viDo'=>'103.9450623'],
        ]);
    }
}
