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
use App\Models\Admin\TagsModel;
use App\Models\Admin\ActivityModel;
use App\Models\Admin\OffersModel;
use App\Models\Admin\GeneralSettingsModel;
use Illuminate\Support\Facades\Crypt;
 
class SlidersController extends Controller
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
      $slider_type_id = Crypt::decrypt($request->encry_slider_type_id);
      $r = SlidersModel::getsliderByTypeId($slider_type_id);
      $data['selected_slider'] = !empty($r)?$r:"";
      $m = SliderTypesModel::getsliderNameByTypeId($slider_type_id); 
      $data['slider_type_id'] = $slider_type_id;
      $data['page_title'] = "Manage : ".$m['slider_type_name'];
      $data['slider_types'] = SliderTypesModel::getAll();
      $data['logo'] = GeneralSettingsModel::getLogo();
      $data['slider_types'] = SliderTypesModel::getAll();
      $data['menu_types'] = MenuTypesModel::getAll();
      return view('admin/sliders', $data);
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
      //echo "<pre>";print_r($_POST);echo "</pre>";die;
      try{
        $request->validate([
          'slider_type_id' => 'required',
          'slider_title' => 'required',
          // 'slider_subtitle' => 'required',
          // 'slider_button_caption' => 'required',
          // 'slider_button_link' => 'required',
          'slider_order' => 'required',
          'slider_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
        ]);

        $slider_pic_path = '';
        if ($request->hasFile('slider_picture')) {
          $file = $request->file('slider_picture');
          $originalFileName = $file->getClientOriginalName();
          $cleanFileName = preg_replace('/[^A-Za-z0-9\-]/', '-', pathinfo($originalFileName, PATHINFO_FILENAME));
          $cleanFileNameWithExtension = $cleanFileName . '.' . $file->getClientOriginalExtension();
          //$fileName = 'slider_' . time() . '.' . $file->getClientOriginalExtension();
          $slider_pic_path = $file->storeAs('img', $cleanFileNameWithExtension, 'public');
        }

        $dataAry = [
          'slider_type_id' => $request->slider_type_id, 
          'slider_title' => $request->slider_title, 
          'slider_subtitle' => $request->slider_subtitle, 
          'slider_button_caption' => $request->slider_button_caption, 
          'slider_button_link' => $request->slider_button_link, 
          'slider_picture' => $slider_pic_path, 
          'slider_order' => $request->slider_order, 
          'status' => $request->status, 
          'created_at' => date("d-m-Y"), 
          'updated_at' => date("d-m-Y"), 
        ];

//echo "<pre>";print_r($dataAry);echo "</pre>"; die;
        if(SlidersModel::create($dataAry)){
          return back()->with('slider_add_success', 'Slider added successfully!');
        } else {
          return back()->with('slider_add_error', 'Unable to add new slider');
        }
      } catch (\Exception $e) {
        // Failure message
        return back()->with('slider_add_error', $e->getMessage());
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
     // echo "<pre>";print_r($_POST);echo "</pre>"; echo "|".$request->slider_id; die;
      try{
        if (!empty($request->hasFile('slider_picture'))) {
          $request->validate([
            'slider_type_id' => 'required',
            'slider_title' => 'required',
            'slider_order' => 'required',
            'slider_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
          ]);
        } else {
          $request->validate([
            'slider_type_id' => 'required',
            'slider_title' => 'required',
            'slider_order' => 'required'
          ]);          
        }
        
        $slider_pic_path = $request->old_slider_picture;
        if ($request->hasFile('slider_picture')) {
          $file = $request->file('slider_picture');
          $originalFileName = $file->getClientOriginalName();
          $cleanFileName = preg_replace('/[^A-Za-z0-9\-]/', '-', pathinfo($originalFileName, PATHINFO_FILENAME));
          $cleanFileNameWithExtension = $cleanFileName . '.' . $file->getClientOriginalExtension();
          $slider_pic_path = $file->storeAs('img', $cleanFileNameWithExtension, 'public');
        }

        $dataAry = [
          'slider_type_id' => $request->slider_type_id, 
          'slider_title' => $request->slider_title, 
          'slider_subtitle' => $request->slider_subtitle, 
          'slider_button_caption' => $request->slider_button_caption, 
          'slider_button_link' => $request->slider_button_link, 
          'slider_picture' => $slider_pic_path, 
          'slider_order' => $request->slider_order, 
          'status' => $request->status, 
          'created_at' => date("Y-m-d"), 
          'updated_at' => date("Y-m-d")  
        ];

        //echo "<pre>";print_r($dataAry);echo "</pre>"; die;

        //         DB::enableQueryLog();
        // SlidersModel::where('slider_id', $request->slider_id)->update($dataAry);
        // dd(DB::getQueryLog());

        // die;
        if(SlidersModel::where(['slider_id' => $request->slider_id])->update($dataAry)){
          return response()->json(['msg' => 'Slide updated successfully.', 'status' => 1]);
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
        //echo $request->slider_id; die;
        if(SlidersModel::where('slider_id', $request->slider_id)->delete()){
          return response()->json(['msg' => 'Slide deleted successfully.', 'status' => 1]);
        } else {
          return response()->json(['msg' => 'Unable to delete slide.', 'status' => 0]);
        }
      } catch (\Exception $e) {
        return response()->json(['msg' => $e->getMessage(), 'status' => 0]);
      }
    }

           
}
