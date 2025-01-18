<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuTypesModel extends Model
{
    use HasFactory;
    protected $table = "master_menu_types";
    protected $primarykey = "menu_type_id";
    protected $fillable = ["menu_type_id","menu_type_name","menu_type_description","status","created_at","updated_at"];

    public static function getAll()
    {
        return MenuTypesModel::where('status', 1)->get();
    } 

    public static function getMenuNameByTypeId($menu_type_id)
    {
        return MenuTypesModel::select('menu_type_name')->where(['status' => 1, 'menu_type_id' => $menu_type_id])->first();
    } 
}

