<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialsModel extends Model
{
    use HasFactory;
    protected $table = "testimonials";
    protected $primarykey = "testimonial_id";
    protected $fillable = [ "testimonial_id", "testimonial_name", "testimonial_picture", "testimonial_designation", "testimonial_stars", 
        "testimonial_text", "updated_at", "status", "created_at"];

    public static function getAll()
    {
        return TestimonialsModel::where(['status' => 1])->get();
    } 

}



