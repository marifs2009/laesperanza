<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourGalleryModel extends Model
{
    use HasFactory;
    protected $table = "tour_gallery";
    protected $primarykey = "id";
    protected $fillable = ["tour_id","tour_image_url","tour_image_alt","status","created_at","updated_at"];

    public static function getAll()
    {
        return TourGalleryModel::where('status', 1)->get();
    }   

    public static function getTourGalleryById($tour_id)
    {
        return TourGalleryModel::where(['status' => 1, 'tour_id' => $tour_id])->get();
    } 
}

