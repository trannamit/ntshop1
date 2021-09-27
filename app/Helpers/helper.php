<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Boolean;

class Helper
{
    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                    <tr>
                        <td>' . $menu->id . '</td>
                        <td>' . $char . $menu->name . '</td>
                        <td>' . $menu->description . '</td>
                        <td>' . self::active($menu->active) . '</td>
                        <td>' . $menu->updated_at . '</td>
                        <td>
                        <a href="/admin/menu/edit/' . $menu->id . '" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" onclick="removeRow(' . $menu->id . ',\'/admin/menu/destroy\')">
                            <i class="fa fa-fas fa-trash"></i>
                        </a>
                        </td>
                    </tr>
                ';

                unset($menus[$key]); // xoá key

                $html .= self::menu($menus, $menu->id, $char . '&emsp;↳ ');
            }
        }
        return $html;
    }
    public static function active($active = 0): string
    {
        return $active == 0 ? '<a class="text-secondary">&ensp;<i class="far fa-circle"></i></a>' : '<a class="text-success">&ensp;<i class="fas fa-check-circle"></i></a>';
    }

    public static function menus($menus, $parent_id = 0): string
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                    <li >
                        <a href="/danh-muc/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html" >
                            ' . $menu->name .  '
                        </a>';
                unset($menus[$key]);
                if (self::isChild($menus, $menu->id)) {
                    $html .= '<ul>';
                    $html .= self::menus($menus, $menu->id);
                    $html .= '</ul>';
                }
                $html .= '<li>

                ';
            }
        }
        return $html;
    }
    public static function menuShop($menus, $parent_id = 0): string
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                    <li >
                        <a href="/danh-muc/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html" >
                            ' . $menu->name .  '<span class="category-widget-btn"></span>
                        </a>';
                unset($menus[$key]);
                if (self::isChild($menus, $menu->id)) {
                    $html .= '<ul>';
                    $html .= self::menus($menus, $menu->id);
                    $html .= '</ul>';
                }
                $html .= '<li>

                ';
            }
        }
        return $html;
    }



    public static function isChild($menus, $id): bool
    {
        foreach ($menus as $menu) {
            if ($menu->parent_id == $id) {
                return true;
            }
        }
        return false;
    }
}
