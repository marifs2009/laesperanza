<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlidersModel extends Model
{
    use HasFactory;
    protected $table = "sliders";
    protected $primarykey = "slider_id";
    protected $fillable = [ "slider_id", "slider_type_id", "slider_title", "slider_subtitle", 
                            "slider_button_caption", "slider_button_link", "slider_picture", 
                            "slider_picture_alt", "slider_order", "status", "created_at"];
    
    public static function getsliderByTypeId($slider_type_id)
    {
        return SlidersModel::select('sliders.*', 'master_slider_types.slider_type_name as slider_type_name')
        ->leftJoin('master_slider_types', 'sliders.slider_type_id', '=', 'master_slider_types.slider_type_id')
        ->where(['sliders.slider_type_id' => $slider_type_id])->get();
    } 



}



