<?php

namespace App\Http\Services\Place;
use App\Models\Place;
use App\Models\PlaceImages;


class PlaceService
{
    public function getImage()
    {
        return PlaceImages::orderbyDesc('id')->paginate(20);
    }
    public function getImageById($id)
    {
        return PlaceImages::where('post_id',$id)->orderbyDesc('id')->paginate(20);
    }
    public function getAll()
    {
        return Place::orderbyDesc('id')->paginate(20);
    }
    public function update($request, $Posts)
    {
        $Posts->status = $request->status;
        $Posts->save();
        $request->session()->flash('success', 'Cập nhật thành công trạng thái');
        return true;
    }
}
