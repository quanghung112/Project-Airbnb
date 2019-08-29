<?php

namespace App\Http\Controllers;

use App\City;
use App\District;
use App\SubDistrict;
use Illuminate\Http\Request;

class Location extends Controller
{
    public function getCity()
    {
        $cities = City::all();
        return response()->json($cities);
    }

    public function getDistrict($matp)
    {
        $districts = District::where('matp', $matp)->get();
        return response()->json($districts);
    }

    public function getSubDistrict($maqh)
    {
        $subDistricts = SubDistrict::where('maqh', $maqh)->get();
        return response()->json($subDistricts);
    }

    public function findCityId($matp){
        $city = City::where('matp',$matp)->get();
        return response()->json($city);
    }

    public function findDistrictId($maqh){
        $district = District::where('maqh',$maqh)->get();
        return response()->json($district);
    }

    public function findSubDistrictId($xaid){
        $subdistrict = SubDistrict::where('xaid',$xaid)->get();
        return response()->json($subdistrict);
    }
}
