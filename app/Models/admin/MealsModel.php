<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealsModel extends Model
{
    use HasFactory;
    protected $table = "master_meal_types";
    protected $primarykey = "meal_type_id";
    protected $fillable = ["meal_type_id","meal_type_name","meal_type_description","status","created_at","updated_at"];

    public static function getAll()
    {
        return MealsModel::where('status', 1)->get();
    } 
}
