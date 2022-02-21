<?php

namespace App\Http\Services\Hotel;

use App\Models\Hotel;
use App\Models\Place;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class HotelService
{

    public function getPlace()
    {
        return Place::orderbyDesc('id')->paginate(20);
    }

    public function getAll()
    {
        return Hotel::orderbyDesc('id')->paginate(20);
    }

    public function create($request)
    {
        try {

            if($request->hasFile('image')){
                $image= $request->file('image');
                $name = 'http://127.0.0.1:8000/uploads/hotel_images/'.time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/hotel_images/');
                $image->move($destinationPath,$name);
                $image_uploaded = $name;
            }
            else{
                $image_uploaded = $request->image;
            }

            return Hotel::create([
                'place_id' => $request->get('place_id'),
                'hotel_name' => $request->hotel_name,
                'image' => $image_uploaded,
                'location' => $request->location,
                'kinhDo' => $request->kinhDo,
                'viDo' => $request->viDo
            ]);

            Session::flash('success', 'Tạo khách sạn thành công');
        } catch (\Exception $err) {

            Session::flash('error', $err->getMessage());
            return false;

        }

        return true;
    }   

    public function update($request, $Hotel)
    {
        if($request->hasFile('image')){
            $image= $request->file('image');
            $name = 'http://127.0.0.1:8000/uploads/hotel_images/'.time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/hotel_images/');
            $image->move($destinationPath,$name);
            $image_uploaded = $name;
        }
        else{
            $image_uploaded = $request->image;
        }

        $Hotel->place_id = $request->place_id;
        $Hotel->hotel_name = $request->hotel_name;
        $Hotel->image = $image_uploaded;
        $Hotel->location = $request->location;
        $Hotel->kinhDo = $request->kinhDo;
        $Hotel->viDo = $request->kinhDo;
        $Hotel->save();

        $request->session()->flash('success', 'Cập nhật thành công khách sạn');
        return true;
    }

    public function destroy($request)
    {
        $id = $request->input('id');
        $Hotel = Hotel::where('id', $id)->first();

        if ($Hotel) 
        {
            return Hotel::where('id', $id)->delete();
        }
        return false;
    }
}