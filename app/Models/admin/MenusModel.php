<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenusModel extends Model
{
    use HasFactory;
    protected $table = "menus";
    protected $primarykey = "menu_id";
    protected $fillable = ["menu_id", "menu_type_id", "parent_menu_id", "menu_label", "menu_link", "menu_order", "status", "created_at", "updated_at"];
    
    public static function getMenuByTypeId($menu_type_id)
    {
        return MenusModel::select('menus.*', 'pages.page_title', 'master_menu_types.menu_type_name as menu_type_name')
        ->leftJoin('master_menu_types', 'menus.menu_type_id', '=', 'master_menu_types.menu_type_id')
        ->leftJoin('pages', 'pages.page_id', '=', 'menus.menu_link')
        ->where(['menus.status' => 1, 'menus.menu_type_id' => $menu_type_id])->orderBy('menu_order', 'asc')
        ->get();
    } 
    
    public static function getAllParentMenus($menu_type_id)
    {
        return MenusModel::select('menus.*', 'master_menu_types.menu_type_name as menu_type_name')
        ->leftJoin('master_menu_types', 'menus.menu_type_id', '=', 'master_menu_types.menu_type_id')
        ->where(['menus.status' => 1, 'menus.menu_type_id' => $menu_type_id, 'menus.parent_menu_id' => 0])->orderBy('menu_order', 'asc')
        ->get();
    } 
    
    public static function getAllChildMenus($menu_type_id,$menu_id)
    {
        return MenusModel::select('menus.*', 'master_menu_types.menu_type_name as menu_type_name')
        ->leftJoin('master_menu_types', 'menus.menu_type_id', '=', 'master_menu_types.menu_type_id')
        ->where(['menus.status' => 1, 'menus.menu_type_id' => $menu_type_id, 'menus.parent_menu_id' => $menu_id])->orderBy('menu_order', 'asc')->get();
    }      
    public static function getAllMenus($menu_type_id)
    {
        return MenusModel::select('menus.*', 'master_menu_types.menu_type_name as menu_type_name')
        ->leftJoin('master_menu_types', 'menus.menu_type_id', '=', 'master_menu_types.menu_type_id')
        ->where(['menus.status' => 1, 'menus.menu_type_id' => $menu_type_id, 'menus.parent_menu_id' => 0])->orderBy('menu_order', 'asc')
        ->get();
    }  


}

