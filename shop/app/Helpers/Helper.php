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
    public static function Place($places)
    {
        $html = '';

        foreach ($places as $key => $place) {
            $html .= '
            <tr>
            <td>' . $place->id . '</td>
            <td>' . $place->place_name . '</td>
            <td>' . $place->description . '</td> ';
            if($place->popular==1)
            {
                $html .= '<td><a class="btn btn-success btn-sm" href="/admin/places/popular/' . $place->id .'"><i class="fas fa-check"> Active</i></a> </td>';
            }else{
                $html .= '<td><a class="btn btn-danger btn-sm" href="/admin/places/unpopular/' . $place->id .'"><i class="fas fa-window-close"> Nonactive</i></a>
                </td>
              ';
            }
            $html .= '
            <td>
            <a class="btn btn-primary btn-sm" href="/admin/places/edit/' . $place->id .'"><i class="fas fa-edit"></i></a>
            <td><a href="#" class="btn btn-danger btn-sm" onclick="removeRow(' . $place->id .', \'/admin/places/destroy\')"><i class="fas fa-trash"></i></a>
            </td>
            </tr>
            ';
            unset($place[$key]);
        }
        //<td>' . self::active($hotel->status) . '</td>
        return $html;
    }
    public static function User($users)
    {
        $html = '';

        foreach ($users as $key => $user) {
            $html .= '
                <tr>
                <td>' . $user->id . '</td>
                <td>' . $user->name . '</td>
                <td><img src="' . $user->profile_image_url. '" style="max-height: 100px; max-width: 100px" alt=""></td>
                <td>' . $user->email . '</td> ';
                if($user->isAdmin == 1)
                {
                    $html .= ' <td><input type="checkbox" checked disabled="disabled" readonly/></td> ';
                }else  {$html .= ' <td><input type="checkbox"  disabled="disabled" readonly/></td> ';}
                if($user->status == 1)
                {
                    $html .= ' <td><input type="checkbox" checked disabled="disabled" readonly/></td> ';
                }else  {$html .= ' <td><input type="checkbox"  disabled="disabled" readonly/></td> ';}
                $html .= '
                <td>
                ';
                if($user->status==0)
                {
                    $html .= '<a class="btn btn-success btn-sm" href="/admin/users/active/' . $user->id .'"><i class="fas fa-check"></i></a>';
                }else{
                    $html .= '<a class="btn btn-danger btn-sm" href="/admin/users/edit/' . $user->id .'"><i class="fas fa-window-close"></i></a>
                    </td>
                    </tr>';
                }
                unset($user[$key]);
        }
        //<td>' . self::active($hotel->status) . '</td>
        return $html;
    }
    public static function post($posts)
    {
        $html = '';

        foreach ($posts as $key => $post) {
            $html .= '
            <tr>
            <td>' . $post->id . '</td>
            <td>' . $post->content . '</td>
            ';
            if($post->popular==0)
            {
                $html .= '<td><a class="btn btn-success btn-sm" href="/admin/posts/popular/' . $post->id .'"><i class="fas fa-check"> Active</i></a> </td>';
            }else{
                $html .= '<td><a class="btn btn-danger btn-sm" href="/admin/posts/unpopular/' . $post->id .'"><i class="fas fa-window-close"> Nonactive</i></a>
                </td>
              ';
            }
            if($post->status==0)
            {
                $html .= '<td><a class="btn btn-success btn-sm" href="/admin/posts/active/' . $post->id .'"><i class="fas fa-check"> Active</i></a></td>';
            }else{
                $html .= '<td><a class="btn btn-danger btn-sm" href="/admin/posts/unactive/' . $post->id .'"><i class="fas fa-window-close"> Nonactive</i></a></td>
               ';
            }
            $html .= '
            <td>
            <a class="btn btn-primary btn-sm" href="/admin/posts/show/' . $post->id .'"><i class="fas fa-edit"></i></a></td> </tr>';
            unset($post[$key]);
        }
        //<td>' . self::active($hotel->status) . '</td>
        return $html;
    }
    public static function report($reports)
    {
        $html = '';
        foreach ($reports as $key => $report) {
            $html .= '
            <tr>
            <td>' . $report->id . '</td>
            <td>' . $report->content . '</td>
            <td>' . $report->post_id . '</td>
            <td>
            <a class="btn btn-danger btn-sm" href="/admin/posts/reportShow/' . $report->id .'"><i class="fas fa-eye"></i></a>
            <a class="btn btn-primary btn-sm" href="/admin/posts/deleteReport/' . $report->id .'"><i class="fas fa-trash"></i></a>';
            unset($report[$key]);
        }
        //<td>' . self::active($hotel->status) . '</td>
        return $html;
    }
    public static function active($status=0) : string {
        return $status==0 ? '<span class="btn btn-danger btn-xs">NO</span>' : '<span class="btn btn-success btn-xs">YES</span>';
    }
}
