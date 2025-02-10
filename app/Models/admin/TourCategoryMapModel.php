<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourCategoryMapModel extends Model
{
    use HasFactory;
    protected $table = "tour_category_map";
    protected $primarykey = "id";
    protected $fillable = ["id", "tour_id","tour_category_id","status", "updated_at"];

    public static function getAll()
    {
        return TourCategoryMapModel::where('status', 1)->get();
    } 

    
    public static function getTourCategoriesById($tour_id)
    {
        return TourCategoryMapModel::select('tour_category_map.*', 'tour_category.tour_category_title as tour_category_name')
        ->leftJoin('tour_category', 'tour_category_map.tour_category_id', '=', 'tour_category.tour_category_id')
        ->where(['tour_category_map.status' => 1, 'tour_category_map.tour_id' => $tour_id])->orderBy('tour_category_map.id', 'asc')
        ->get();
    }


}