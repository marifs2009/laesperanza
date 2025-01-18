<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagsModel extends Model
{
    use HasFactory;
    protected $table = "tags";
    protected $primarykey = "tag_id";
    protected $fillable = ["tag_id","tag_name","status","created_at","updated_at"];

    public static function getAll()
    {
        return TagsModel::where('status', 1)->get();
    } 
}
