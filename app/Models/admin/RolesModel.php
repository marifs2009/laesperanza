<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesModel extends Model
{
    use HasFactory;
    protected $table = "roles";
    protected $primarykey = "id";
    protected $fillable = ["id","name","status","created_at","updated_at"];

    public static function getAll()
    {
        return RolesModel::where('status', 1)->get();
    }  

}
