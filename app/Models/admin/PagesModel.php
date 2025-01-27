<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagesModel extends Model
{
    use HasFactory;
    protected $table = "pages";
    protected $primarykey = "page_id";
    protected $fillable = [ "page_id", "page_title", "page_subtitle", "page_slug", "page_excerpt", "page_content", "page_banner", "meta_title", "meta_description", "page_category", "page_template", "meta_keywords", "other_header_scripts", "status", "created_at", "updated_at"];

    public static function getAll()
    {
        return PagesModel::select('pages.*', 'page_category.name as category_name')
        ->join('page_category', 'pages.page_category', '=', 'page_category.id')->where(['pages.status' => 1, 'page_category.status' => 1])->get();
    } 

    public static function getPage($page_id)
    {
        //return PagesModel::where(['page_id' => $page_id, 'status' => 1])->first();

        return PagesModel::select('pages.*', 'page_category.name as category_name')
        ->join('page_category', 'pages.page_category', '=', 'page_category.id')->where(['pages.status' => 1, 'page_category.status' => 1, 'pages.page_id' => $page_id])->get();
    }


}



