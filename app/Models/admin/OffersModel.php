<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffersModel extends Model
{
    use HasFactory;
    protected $table = "offers";
    protected $primarykey = "offer_id";
    protected $fillable = ["offer_id", "offer_name", "offer_description", "status","created_at","updated_at"];

    public static function getAll()
    {
        return OffersModel::where('status', 1)->get();
    } 
}
