<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hotel\CreateFormRequest;
use App\Http\Services\Hotel\HotelService;
use App\Models\Hotel;
use App\Models\Place;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    protected $hotelService;

    public function __construct(HotelService $hotelService)
    {
        $this->hotelService = $hotelService;
    }

    public function create()
    {
        return view('admin.hotel.add', [
            'title' => 'Thêm Khách Sạn Mới',
            'places' => $this->hotelService->getPlace()
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $this->hotelService->create($request);

        return redirect()->back();
    }

    public function index()
    {
        return view('admin.hotel.list', [
            'title' => 'Danh Sách Khách Sạn Mới Nhất',
            'hotels' => $this->hotelService->getAll()
        ]);
    }

    public function show(Hotel $hotel)
    {
        return view('admin.hotel.edit', [
            'title' => 'Chỉnh Sửa Khách Sạn: ' . $hotel->hotel_name,
            'hotel' => $hotel,
            'places' => $this->hotelService->getPlace()
        ]);
    }

    public function update(Hotel $hotel, CreateFormRequest $request)
    {
        $this->hotelService->update($request, $hotel);

        return redirect('/admin/hotels/list');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->hotelService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Khách Sạn'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}