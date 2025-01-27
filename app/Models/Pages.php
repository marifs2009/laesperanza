<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pages extends Model
{
    use HasFactory;
    protected $table = "pages";
    protected $primarykey = "page_id";
    protected $fillable = [ "page_id", "page_title", "page_subtitle", "page_slug", "page_excerpt", "page_content", "page_banner", "meta_title", "meta_description", "page_template", "meta_keywords", "other_header_scripts", "page_category", "status", "created_at", "updated_at"];

    public static function getAllSlugs()
    {
        return Pages::select('pages.page_id','pages.page_slug', 'pages.page_title', 'pages.page_category', 'page_category.name as category_name')
        ->join('page_category', 'pages.page_category', '=', 'page_category.id')->where(['pages.status' => 1, 'page_category.status' => 1])->get();
    } 
    public static function getSlugByPageId($page_id)
    {
        return Pages::select('pages.page_id','pages.page_slug', 'pages.page_title', 'pages.page_category', 'page_category.name as category_name')
        ->join('page_category', 'pages.page_category', '=', 'page_category.id')->where(['pages.status' => 1, 'page_category.status' => 1])->get();
    } 

    public static function getPageId($page_slug)
    {
        $r = Pages::select('page_id')->where(['page_slug' => $page_slug, 'status' => 1])->first();
        return !empty($r->page_id)?$r->page_id:'';
    }

    public static function getPage($page_slug)
    {
        return Pages::where(['page_slug' => $page_slug, 'status' => 1])->first();
    } 

    public static function getPagesByCategoryId($category_id)
    {
        return Pages::select('pages.page_slug', 'pages.page_title', 'page_category.name as category_name')
        ->join('page_category', 'pages.page_category', '=', 'page_category.id')->where(['pages.status' => 1, 'page_category.status' => 1, 'pages.page_category' => $category_id])->get();
    } 


}



