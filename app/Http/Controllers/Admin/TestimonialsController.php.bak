<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Admin\RolesModel;
use App\Models\Admin\MealsModel;
use App\Models\Admin\MenuTypesModel;
use App\Models\Admin\MenusModel;
use App\Models\Admin\SliderTypesModel;
use App\Models\Admin\SlidersModel;
use App\Models\Admin\TestimonialsModel;
use App\Models\Admin\TagsModel;
use App\Models\Admin\ActivityModel;
use App\Models\Admin\OffersModel;
use App\Models\Admin\GeneralSettingsModel;
use App\Models\Admin\TourTypesModel;


use Illuminate\Support\Facades\Crypt;


class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
///////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {   
      $data['menu_types'] = MenuTypesModel::getAll();
      $data['slider_types'] = SliderTypesModel::getAll();
      $data['page_title'] = "Manage Testimonials";
      $data['logo'] = GeneralSettingsModel::getLogo();
      $data['testimonials'] = TestimonialsModel::getAll();
      return view('admin/testimonials', $data);
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
      //echo "<pre>";print_r($_FILES);echo "</pre>"; die;
      try{
        $request->validate([
          'testimonial_name' => 'required',
          'testimonial_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'testimonial_designation' => 'required',
          'testimonial_stars' => 'required',
          'testimonial_text' => 'required',
        ], [
            'name.required' => 'Please enter name.',
            'testimonial_picture.required' => 'Select a picture.',
            'testimonial_designation.required' => 'Please enter designation',
            'testimonial_stars.required' => 'Please enter stars.',
            'testimonial_text.required' => 'Please enter testimonial text.',
        ]);

        $testimonial_pic_path = '';
        if ($request->hasFile('testimonial_picture')) {
          $file = $request->file('testimonial_picture');
          $originalFileName = $file->getClientOriginalName();
          $cleanFileName = preg_replace('/[^A-Za-z0-9\-]/', '-', pathinfo($originalFileName, PATHINFO_FILENAME));
          $cleanFileNameWithExtension = $cleanFileName . '.' . $file->getClientOriginalExtension();
          $testimonial_pic_path = $file->storeAs('img', $cleanFileNameWithExtension, 'public');
        }

        $dataAry = [
          'testimonial_name' => $request->testimonial_name, 
          'testimonial_picture' => $testimonial_pic_path, 
          'testimonial_designation' => $request->testimonial_designation, 
          'testimonial_stars' => $request->testimonial_stars, 
          'testimonial_text' => $request->testimonial_text, 
          'status' => $request->status, 
          'created_at' => date("d-m-Y"), 
          'updated_at' => date("d-m-Y"), 
        ];
        //echo "<pre>";print_r($dataAry);echo "</pre>"; die;
        if(TestimonialsModel::create($dataAry)){
            return response()->json(['msg' => 'Testimonial added successfully.', 'status' => 1]);
        } else {
          return response()->json(['msg' => 'Unable to add new testimonial', 'status' => 0]);
        }
      } catch (\Exception $e) {
        return response()->json(['msg' => $e->getMessage(), 'status' => 0]);
      }
    }

///////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function edit(Request $request)
    {
      //echo "<pre>";print_r($_POST);echo "</pre>"; echo "|".$request->testimonial_id; die;
      try{
        if (!empty($request->hasFile('testimonial_picture'))) {
          $request->validate([
            'testimonial_name' => 'required',
            'testimonial_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'testimonial_designation' => 'required',
            'testimonial_stars' => 'required',
            'testimonial_text' => 'required',
          ],
          [
            'testimonial_name.required' => 'Please enter name.',
            'testimonial_picture.required' => 'Select a picture.',
            'testimonial_designation.required' => 'Please enter designation',
            'testimonial_stars.required' => 'Please enter stars.',
            'testimonial_text.required' => 'Please enter testimonial text.',
          ]);
        } else {
          $request->validate([
            'testimonial_name' => 'required',
            'testimonial_designation' => 'required',
            'testimonial_stars' => 'required',
            'testimonial_text' => 'required',
          ],
          [
            'testimonial_name.required' => 'Please enter name.',
            'testimonial_designation.required' => 'Please enter designation',
            'testimonial_stars.required' => 'Please enter stars.',
            'testimonial_text.required' => 'Please enter testimonial text.',
          ]);   

        }

        $testimonial_pic_path = $request->old_testimonial_picture;
        if ($request->hasFile('testimonial_picture')) {
          $file = $request->file('testimonial_picture');
          $originalFileName = $file->getClientOriginalName();
          $cleanFileName = preg_replace('/[^A-Za-z0-9\-]/', '-', pathinfo($originalFileName, PATHINFO_FILENAME));
          $cleanFileNameWithExtension = $cleanFileName . '.' . $file->getClientOriginalExtension();
          $testimonial_pic_path = $file->storeAs('img', $cleanFileNameWithExtension, 'public');
        }

        $dataAry = [
          'testimonial_name' => $request->testimonial_name, 
          'testimonial_picture' => $testimonial_pic_path, 
          'testimonial_designation' => $request->testimonial_designation, 
          'testimonial_stars' => $request->testimonial_stars, 
          'testimonial_text' => $request->testimonial_text, 
          'status' => $request->status, 
          'created_at' => date("Y-m-d"), 
          'updated_at' => date("Y-m-d"), 
        ];
        
        if(TestimonialsModel::where(['testimonial_id' => $request->testimonial_id])->update($dataAry)){
            return response()->json(['msg' => 'Testimonial uploaded successfully.', 'status' => 1]);
        } else {
          return response()->json(['msg' => 'No data updated.', 'status' => 0]);
        }
      } catch (\Exception $e) {
        return response()->json(['msg' => $e->getMessage(), 'status' => 0]);
      }
    }

///////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function delete(Request $request)
    {
      try {
        //echo $request->testimonial_id; die;
        if(TestimonialsModel::where('testimonial_id', $request->testimonial_id)->delete()){
          return response()->json(['msg' => 'testimonial deleted successfully.', 'status' => 1]);
        } else {
          return response()->json(['msg' => 'Unable to delete testimonial.', 'status' => 0]);
        }
      } catch (\Exception $e) {
        return response()->json(['msg' => $e->getMessage(), 'status' => 0]);
      }
    }

           
}
