<?php


use App\House;

use Illuminate\Database\Seeder;

class HouseTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $house = new House();
        $house->title = 'Cho thuê phòng chuẩn khách sạn 5*';
        $house->style = 'Phong tro';
        $house->loan_type = 'Tim nguoi o tro';
        $house->address = 'Bùi Đình Túy, 24, Bình Thạnh';
        $house->city = 'Ho Chi Minh';
        $house->district = 'Bình Thạnh';
        $house->sub_district = 'Bùi Đình Túy';
        $house->bedroom = 1;
        $house->bathroom = 1;
        $house->price = 5200000;
        $house->description = ' Khu vực an ninh - Oto vào tận nhà - phòng trọ tiêu chuẩn khách sạn';
        $house->user_id = 1;
        $house->save();
    }
}
