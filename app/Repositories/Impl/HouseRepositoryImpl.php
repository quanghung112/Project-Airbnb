<?php


namespace App\Repositories\Impl;


use App\House;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\HouseRepositoryInterface;
use Carbon\Carbon;

class HouseRepositoryImpl extends EloquentRepository implements HouseRepositoryInterface
{
    public function getModel()
    {
        $model = House::class;
        return $model;
    }


    public function getNewHouse($userId)
    {
        return $this->model->where('user_id', $userId)->orderby('id', 'desc')->take(1)->get();
    }

    public function getHouseOfUser($userId)
    {
        $houses = $this->model->where('user_id', $userId)->orderby('id', 'desc')->get();
        return $houses;
    }

    public function searchHouse($request)
    {
        $city = $request->city;
        $style = $request->style;
        $price = $request->price;
        $bedroom = $request->bedroom;
        $bathroom = $request->bathroom;
        $start_loan = $request->start_loan;
        if ($start_loan == "") {
            $start_loan = Carbon::now()->format('Y-m-d');
        };

//        if ($price == 0) {
        $start_loan = $request->start_loan;
        if ($start_loan == "") {
            $start_loan = Carbon::now()->format('Y-m-d');
        };
        $end_loan = $request->end_loan;
        if ($end_loan == "") {
            $end_loan = "2999-01-01";
        };
        $from = date($start_loan);
        $to = date($end_loan);
        if ($price == 0) {
            $inprice = 0;
            $outprice = 999999999999;
        }
        if ($price == 1000000) {
            $inprice = 1000000;
            $outprice = 1999999;
        }
        if ($price == 2000000) {
            $inprice = 2000000;
            $outprice = 2999999;
        }
        if ($price == 3000000) {
            $inprice = 3000000;
            $outprice = 3999999;
        }
        if ($price == 4000000) {
            $inprice = 4000000;
            $outprice = 4999999;
        }
        if ($price == 5000000) {
            $inprice = 5000000;
            $outprice = 999999999999;
        }

        $houses = $this->model->where('city', 'like', '%' . $city . '%')
            ->where('style', 'like', '%' . $style . '%')
            ->whereBetween('price', [$inprice, $outprice])
            ->where('bedroom', 'like', '%' . $bedroom . '%')
            ->where('bathroom', 'like', '%' . $bathroom . '%')
            ->whereBetween('start_loan', [$from, $to])
            ->whereBetween('end_loan', [$from, $to])
            ->orderby('id', 'desc')->get();

        return $houses;
    }

    public function getCommentOfHouse($obj)
    {
        return $obj->comments;
    }

//    public function getUsersComment($house)
//    {
////        $comments = $this->getCommentOfHouse($house);
//    }

}
