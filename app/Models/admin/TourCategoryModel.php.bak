<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TourCategoryModel extends Model
{
    use HasFactory;
    protected $table = "tour_category";
    protected $primarykey = "tour_type_id";
    protected $fillable = ["tour_category_id", "tour_category_title", "tour_category_subtitle", 
    "tour_parent_category_id", "tour_category_slug", "tour_category_excerpt", "tour_category_content", 
    "tour_category_banner", "tour_category_meta_title", 'category_level', "tour_category_meta_description", 
    "tour_category_meta_keywords", "tour_category_other_header_scripts", "status", "created_at", 
    "updated_at"];

    public static function getAllParentTourCategory()
    {
        return TourCategoryModel::where(['status'=> 1, 'tour_parent_category_id' => -1])->get();
    }
    public static function getAllOtherThanParent()
    {
        return TourCategoryModel::where('status', 1)->where('tour_parent_category_id', '!=', -1)->get();
    }
    public static function getAll()
    {
              return DB::table('tour_category as t1')
            ->leftJoin('tour_category as t2', 't1.tour_parent_category_id', '=', 't2.tour_category_id')
            ->select('t1.*', 't2.tour_category_title as tour_parent_category_title')
            ->orderBy('t1.tour_parent_category_id')
            ->get()->toArray();

    }
    
    public static function getTourCategoryById($tour_category_id)
    {
        return TourCategoryModel::where(['status'=> 1, 'tour_category_id' => $tour_category_id])->get();
    }

    public static function getChildrenByTourCategoryId($tour_category_id)
    {
        return TourCategoryModel::where(['status'=> 1, 'tour_parent_category_id' => $tour_parent_category_id])->get();
    }

    public static function getChildTourCategory($tour_parent_category_id)
    {
        return $result = TourCategoryModel::where(['status'=> 1, 'tour_parent_category_id' => $tour_parent_category_id])->get();
    }




    
    
    


}

