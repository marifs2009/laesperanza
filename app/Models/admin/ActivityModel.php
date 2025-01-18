<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityModel extends Model
{
    use HasFactory;
    protected $table = "activity";
    protected $primarykey = "id";
    protected $fillable = ["activity_id", "activity_name", "activity_description", "status","created_at","updated_at"];

    public static function getAll()
    {
        return ActivityModel::where('status', 1)->get();
    } 
}
