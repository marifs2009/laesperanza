<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelsModel extends Model
{
    use HasFactory;
    protected $table = "hotels";
    protected $primarykey = "hotel_id";
    protected $fillable = [ "hotel_id", "hotel_name", "hotel_picture", "hotel_location", "hotel_type", 
        "hotel_description", "updated_at", "status", "created_at"];


    public static function getAll()
    {
        return HotelsModel::where(['status' => 1])->get();
    } 



}



