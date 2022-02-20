<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Place\CreateFormRequest;
use App\Http\Services\Place\PlaceService;
use App\Models\Place;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlacesController extends Controller
{
    protected $placeService;

    public function __construct(PlaceService $placeService)
    {
        $this->placeService = $placeService;
    }
    public function create()
    {
        return view('admin.place.add', [
            'title' => 'Thêm Địa Danh Mới',
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $this->placeService->create($request);

        return redirect()->back();
    }

    public function index()
    {
        return view('admin.place.list', [
            'title' => 'Danh Sách Địa Danh Mới Nhất',
            'places' => $this->placeService->getAll()
        ]);
    }

    public function show(Place $place)
    {
        return view('admin.place.edit', [
            'title' => 'Chỉnh Sửa Địa Danh: ' . $place->place_name,
            'place' => $place,
        ]);
    }

    public function update(Place $place, CreateFormRequest $request)
    {
        $this->placeService->update($request, $place);

        return redirect('/admin/places/list');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->placeService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Địa Danh'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
    public function unpopular(Place $places)
    {
        $places->popular=0;
        $places->update();
        return redirect('/admin/places/list');
    }
    public function popular(Place $places)
    {
        $places->popular=1;
        $places->update();
        return redirect('/admin/places/list');
    }



}
