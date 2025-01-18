<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourTypesModel extends Model
{
    use HasFactory;
    protected $table = "master_tour_types";
    protected $primarykey = "tour_type_id";
    protected $fillable = ["tour_type_id","tour_type_name","tour_type_description","status","created_at","updated_at"];

    public static function getAll()
    {
        return TourTypesModel::where('status', 1)->get();
    } 
}

