<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderTypesModel extends Model
{
    use HasFactory;
    protected $table = "master_slider_types";
    protected $primarykey = "slider_type_id";
    protected $fillable = ["slider_type_id","slider_type_name","slider_type_description","status","created_at","updated_at"];

    public static function getAll()
    {
        return SliderTypesModel::where('status', 1)->get();
    } 

    public static function getsliderNameByTypeId($slider_type_id)
    {
        return SliderTypesModel::select('slider_type_name')->where(['status' => 1, 'slider_type_id' => $slider_type_id])->first();
    } 


}

