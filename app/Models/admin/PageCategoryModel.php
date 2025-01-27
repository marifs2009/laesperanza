<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageCategoryModel extends Model
{
    use HasFactory;
    protected $table = "page_category";
    protected $primarykey = "id";
    protected $fillable = [ "id", "name", "status", "created_at", "updated_at"];

    public static function getAll()
    {
        return PageCategoryModel::where(['status' => 1])->get();
    } 

}

