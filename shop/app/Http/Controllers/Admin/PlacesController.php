<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Services\Place\PlaceService;
use App\Models\Place;
use App\Models\Report;
class PlacesController extends Controller
{
    protected $userService;

    public function __construct(PlaceService $placeService)
    {
        $this->placeService = $placeService;
    }
    public function show(place $place)
    {
        return view('admin.places.show', [
            'title' => 'Xem Bài Viết ',
            'places' => $place,
            'places' => $this->placeService->getPlace(),
            'users'=>$this->placeService->getUser(),
            'placeimages'=>$this->placeService->getImageById($place->id)
        ]);
    }
    public function reportShow(Report $report)
    {
        return view('admin.places.reportShow', [
            'title' => 'Xem Địa Điểm ',
            'places' => $this->placeService->getAll(),
            'reports'=>$report,
            'places' => $this->placeService->getPlace(),
            'users'=>$this->placeService->getUser(),
            'placeimages'=>$this->placeService->getImage()
        ]);
    }
    public function report()
    {
        return view('admin.places.reportList', [
            'title' => 'Tố Cáo Địa Điểm ',
            'reports' => $this->placeService->getReport(),
        ]);
    }
    public function index()
    {
        return view('admin.places.list', [
            'title' => 'Danh Sách Địa Điểm',
            'places' => $this->placeService->getAll()
        ]);
    }
    public function unactive(place $place)
    {
        $place->status=0;
        $place->update();
        return redirect('/admin/places/list');
    }
    public function active(place $place)
    {
        $place->status=1;
        $place->update();
        return redirect('/admin/places/list');
    }

}
