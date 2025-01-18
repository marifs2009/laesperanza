<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenusModel extends Model
{
    use HasFactory;
    protected $table = "menus";
    protected $primarykey = "menu_id";
    protected $fillable = ["menu_id", "menu_type_id", "menu_label", "menu_link", "menu_parent_id", "menu_order", "status", "created_at", "updated_at"];
    
    public static function getMenuByTypeId($menu_type_id)
    {
        return MenusModel::select('menus.*', 'master_menu_types.menu_type_name as menu_type_name')
        ->leftJoin('master_menu_types', 'menus.menu_type_id', '=', 'master_menu_types.menu_type_id')
        ->where(['menus.status' => 1, 'menus.menu_type_id' => $menu_type_id])
        ->get();
    } 



}

