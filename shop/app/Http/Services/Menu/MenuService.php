<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class MenuService
{
    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }

    public function getAll()
    {
        return Menu::orderbyDesc('id')->paginate(20);
    }

    public function create($request)
    {
        try {
            return Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (string) $request->input('active')
            ]);

            Session::flash('success', 'Tạo danh mục thành công');
        } catch (\Exception $err) {

            Session::flash('error', $err->getMessage());
            return false;

        }

        return true;
    }   

    public function update($request, $menu)
    {
        if ($request->input('parent_id') != $menu->id) {
            $menu->parent_id = (int) $request->input('parent_id');
        }
        $menu->name = (String) $request->input('name');
        $menu->description = (string) $request->input('description');
        $menu->content = (String) $request->input('content');
        $menu->active = (String) $request->input('active');
        $menu->save();

        $request->session()->flash('success', 'Cập nhật thành công danh mục');
        return true;
    }

    public function destroy($request)
    {
        $id = $request->input('id');
        $menu = Menu::where('id', $id)->first();

        if ($menu) 
        {
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }
        return false;
    }
}