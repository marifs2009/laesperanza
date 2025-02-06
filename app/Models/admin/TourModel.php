<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourModel extends Model
{
    use HasFactory;
    protected $table = "tours";
    protected $primarykey = "tour_id";
    protected $fillable = ["tour_id", "tour_code", "tour_slug", "tour_title", "tour_subtitle", "tour_duration_day", "tour_duration_night", "tour_type", "tour_location", "tour_location_lat", "tour_location_long", "tour_description", "tour_what_to_expect", "tour_inclusion", "tour_exclusion", "tour_group_size_adult", "tour_group_size_child", "tour_available_offer", "tour_meals", "tour_transfer", "tour_tax", "tour_add_to_hot_deals", "tour_featured_image", "is_draft", "is_publish", "status", "created_at", "updated_at"];

    public static function getAll()
    {
        return TourModel::where('status', 1)->get();
    } 


    // public static function getAllParentTour()
    // {
    //     return TourModel::where('status', 1)->where(['status', -1])->get();
    // } 

}

