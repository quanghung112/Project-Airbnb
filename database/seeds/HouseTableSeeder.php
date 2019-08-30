<?php

use App\House;
use Illuminate\Database\Seeder;

class HouseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i<20; $i++){
            $house = new House();
            $house->title = 'Cho thuê phòng chuẩn khách sạn 5*'.$i;
            $house->style = 'Phong tro'.$i;
            $house->loan_type = 'Tim nguoi o tro'.$i;
            $house->address = 'Bùi Đình Túy, 24, Bình Thạnh'.$i;
            $house->city = 'Ho Chi Minh'.$i;
            $house->district = 'Bình Thạnh'.$i;
            $house->sub_district = 'Bùi Đình Túy'.$i;
            $house->bedroom = 1;
            $house->bathroom = 1;
            $house->price = 5200000;
            $house->description = ' Khu vực an ninh - Oto vào tận nhà - phòng trọ tiêu chuẩn khách sạn';
            $house->user_id = 1;
            $house->save();
        }
    }
}
