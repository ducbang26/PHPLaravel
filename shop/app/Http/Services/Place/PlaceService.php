<?php

namespace App\Http\Services\Place;
use App\Models\Place;
use App\Models\PlaceImages;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class PlaceService
{
    public function getImage()
    {
        return PlaceImages::orderbyDesc('id')->paginate(20);
    }
    public function getImageById($id)
    {
        return PlaceImages::where('place_id',$id)->orderbyDesc('id')->paginate(20);
    }
    public function getAll()
    {
        return Place::orderbyDesc('id')->paginate(20);
    }
    public function create($request)
    {
        try {

            if($request->hasFile('image')){
                $image= $request->file('image');
                $name = 'https://dulichvgo.herokuapp.com/uploads/place_images/'.time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/place_images/');
                $image->move($destinationPath,$name);
                $image_uploaded = $name;
            }
            else{
                $image_uploaded = $request->image;
            }

            return Place::create([
                'place_name' => $request->place_name,
                'star'=> $request->star,
                'description'=> $request->description,
                'image' => $image_uploaded,
                'location' => $request->location,
                'temperature'=> $request->temperature,
                'kinhDo' => $request->kinhDo,
                'viDo' => $request->viDo,
                'popular'=> $request->popular,
                'region'=> $request->region,
            ]);

            Session::flash('success', 'Tạo địa danh thành công');
        } catch (\Exception $err) {

            Session::flash('error', $err->getMessage());
            return false;

        }

        return true;
    }   

    public function update($request, $Place)
    {
        if($request->hasFile('image')){
            $image= $request->file('image');
            $name = 'https://dulichvgo.herokuapp.com/uploads/place_images/'.time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/place_images/');
            $image->move($destinationPath,$name);
            $image_uploaded = $name;
        }
        else{
            $image_uploaded = $request->image;
        }

        $Place->Place_name = $request->Place_name;
        $Place->star = $request->star;
        $Place->description = $request->description;
        $Place->image = $image_uploaded;
        $Place->location = $request->location;
        $Place->kinhDo = $request->kinhDo;
        $Place->viDo = $request->kinhDo;
        $Place->popular = $request->popular;
        $Place->region = $request->region;
        $Place->save();

        $request->session()->flash('success', 'Cập nhật thành công địa danh');
        return true;
    }

    public function destroy($request)
    {
        $id = $request->input('id');
        $Place = Place::where('id', $id)->first();

        if ($Place) 
        {
            return Place::where('id', $id)->delete();
        }
        return false;
    }
}
