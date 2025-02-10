<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourHotelMapModel extends Model
{
    use HasFactory;
    protected $table = "tour_hotels_map";
    protected $primarykey = "id";
    protected $fillable = ["id", "tour_id","hotel_id","description","status", "updated_at"];

    public static function getAll()
    {
        return TourHotelMapModel::where('status', 1)->get();
    } 
   
    public static function getMappedHotelById($tour_id)
    {
        return TourHotelMapModel::where(['status' => 1, 'tour_id' => $tour_id])->get();
    }  
}