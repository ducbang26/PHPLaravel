<?php

namespace App\Helpers;

class Helper
{
    public static function Hotel($hotels)
    {
        $html = '';
        
        foreach ($hotels as $key => $hotel) {
            $html .= '
            <tr>
            <td>' . $hotel->id . '</td>
            <td>' . $hotel->hotel_name . '</td>
            <td><img src="' . $hotel->image . '" style="max-height: 100px; max-width: 100px" alt=""></td>
            <td>
            <a class="btn btn-primary btn-sm" href="/admin/hotels/edit/' . $hotel->id .'"><i class="fas fa-edit"></i></a>
            <a href="#" class="btn btn-danger btn-sm" onclick="removeRow(' . $hotel->id .', \'/admin/hotels/destroy\')"><i class="fas fa-trash"></i></a>
            </td>
            </tr>
            ';
            unset($hotel[$key]);
        }
        //<td>' . self::active($hotel->status) . '</td>
        return $html;
    }
    
    public static function active($status=0) : string {
        return $status==0 ? '<span class="btn btn-danger btn-xs">NO</span>' : '<span class="btn btn-success btn-xs">YES</span>';
    }
}
