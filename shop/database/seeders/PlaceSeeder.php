<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert([
            ['place_name'=>'Tp. Đà Lạt', 
            'star'=>0, 
            'description'=>'Đà Lạt là thành phố tỉnh lỵ của tỉnh Lâm Đồng, nằm trên cao nguyên Lâm Viên, thuộc vùng Tây Nguyên, Việt Nam. Từ xa xưa, vùng đất này vốn là địa bàn cư trú của những cư dân người Lạch, người Chil và người Srê thuộc dân tộc Cơ Ho.',
            'location'=>'Lâm Đồng, Việt Nam', 
            'temperature'=>'Mây rải rác · 23°C', 
            'kinhDo'=>'11.9248092',
            'viDo'=>'108.4610882',
            'popular'=>true,
            'region'=> 'taynguyen',
            ],
            ['place_name'=>'Tp. Hội An', 
            'star'=>0, 
            'description'=>'Hội An là một thành phố trực thuộc tỉnh Quảng Nam, Việt Nam. Phố cổ Hội An từng là một thương cảng quốc tế sầm uất, gồm những di sản kiến trúc đã có từ hàng trăm năm trước, được UNESCO công nhận là di sản văn hóa thế giới từ năm 1999.',
            'location'=>'Quảng Nam, Việt Nam', 
            'temperature'=>'Nhiều mây · 27°C', 
            'kinhDo'=>'15.9184459',
            'viDo'=>'108.3470329',
            'popular'=>true,
            'region'=> 'duyenhainamtrungbo',
            ],
            ['place_name'=>'Mũi Né', 
            'star'=>0, 
            'description'=>'Mũi Né là một địa danh, tên một mũi biển ở thành phố Phan Thiết, tỉnh Bình Thuận, Việt Nam. Đây là một trung tâm du lịch nổi tiếng của tỉnh Bình Thuận và là một trong số các khu du lịch quốc gia của Việt Nam.',
            'location'=>'Tp. Phan Thiết, Bình Thuận, Việt Nam', 
            'temperature'=>'Nhiều mây · 26°C', 
            'kinhDo'=>'10.9605212',
            'viDo'=>'108.2757498',
            'popular'=>false,
            'region'=> 'dongnambo',
            ],
            ['place_name'=>'Cầu Vàng', 
            'star'=>0, 
            'description'=>'Cây cầu vàng trên đỉnh Bà Nà Hill, dài tầm 200m mà rất đông đúc, chụp được quả ảnh không dính người thì gần như là không thể. Do vị trí cao nên rất mát mẻ, cảm giác mát lạnh dễ chịu, thấy được rừng nguyên sinh và cảnh thành phố của Đà Nẵng nữa.',
            'location'=>'Hoà Phú, Hòa Vang, Đà Nẵng, Việt Nam', 
            'temperature'=>'Nhiều mây · 26°C', 
            'kinhDo'=>'15.9950734',
            'viDo'=>'107.9788567',
            'popular'=>false,
            'region'=> 'duyenhainamtrungbo',
            ],
            ['place_name'=>'Phú Quốc', 
            'star'=>0, 
            'description'=>'Đảo nhiệt đới, có dân cư với những bãi biển cát trắng, khu nghỉ dưỡng và những tuyến đường đi bộ đường dài.',
            'location'=>'Tp. Phú Quốc, Kiên Giang, Việt Nam', 
            'temperature'=>'Nhiều mây · 26°C', 
            'kinhDo'=>'10.2288155',
            'viDo'=>'103.8173386',
            'popular'=>false,
            'region'=> 'dongnambo',
            ],
        ]);
    }
}
