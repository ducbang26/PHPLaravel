<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Place;
use App\Models\PlaceImages;

class PlaceController extends Controller
{

    public $successStatus = 200;

    public function getAllPlace() 
    {
        $data = Place::with(['placeImage'])->get();

        return response()->json(['data' => $data], $this-> successStatus);
    }

    public function getPopularPlace() 
    {
        $data = Place::with(['placeImage'])->where('popular', 1)->get();

        return response()->json(['data' => $data], $this-> successStatus);
    }

    public function placeDetail($id) 
    { 
        try {

            $place = Place::with(['placeImage'])->with(['hotels'])->where('id', $id)->get();

            return response()->json(['data' => $place], $this-> successStatus);

        } catch (\Exception $e) {
            return response()->json(['status' => 'error','message' => $e->getMessage(),'data'=>[]],500);
        }
    }

    public function searchPlace($placeName)
    {
        $place = Place::with(['placeImage'])->where('place_name', 'like' , '%'.$placeName.'%')->get();
        return response()->json(['data' => $place], $this-> successStatus);
    }

    public function searchPlaceByRegion($region)
    {
        $place = Place::with(['placeImage'])->where('region', 'like' , '%'.$region.'%')->get();
        return response()->json(['data' => $place], $this-> successStatus);
    }
}
