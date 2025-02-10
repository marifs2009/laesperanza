<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourItineraryModel extends Model
{
    use HasFactory;
    protected $table = "tour_itinerary";
    protected $primarykey = "id";
    protected $fillable = ["tour_id","itinerary_title","itinerary_description","status","updated_at"];

    public static function getAll()
    {
        return TourItineraryModel::where('status', 1)->get();
    } 

    public static function getTourMappedItinerary($tour_id)
    {
        return TourHotelMapModel::where(['status' => 1, 'tour_id' => $tour_id])->get();
    } 

}

