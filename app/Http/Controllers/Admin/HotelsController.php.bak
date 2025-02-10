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
use App\Models\Admin\HotelsModel;
use App\Models\Admin\TagsModel;
use App\Models\Admin\ActivityModel;
use App\Models\Admin\OffersModel;
use App\Models\Admin\GeneralSettingsModel;
use App\Models\Admin\TourTypesModel;


use Illuminate\Support\Facades\Crypt;


class HotelsController extends Controller
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
      $data['page_title'] = "Manage Hotels";
      $data['logo'] = GeneralSettingsModel::getLogo();
      $data['hotels'] = HotelsModel::getAll();
      return view('admin/hotels', $data);
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
          'hotel_name' => 'required',
          'hotel_location' => 'required',
          'hotel_type' => 'required',
          'hotel_description' => 'required',
          'hotel_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
        ]);

        $hotel_pic_path = '';
        if ($request->hasFile('hotel_picture')) {
          $file = $request->file('hotel_picture');
          $originalFileName = $file->getClientOriginalName();
          $cleanFileName = preg_replace('/[^A-Za-z0-9\-]/', '-', pathinfo($originalFileName, PATHINFO_FILENAME));
          $cleanFileNameWithExtension = $cleanFileName . '.' . $file->getClientOriginalExtension();
          $hotel_pic_path = $file->storeAs('img', $cleanFileNameWithExtension, 'public');
        }

        $dataAry = [
          'hotel_name' => $request->hotel_name, 
          'hotel_picture' => $hotel_pic_path, 
          'hotel_location' => $request->hotel_location, 
          'hotel_type' => $request->hotel_type, 
          'hotel_description' => $request->hotel_description, 
          'status' => $request->status, 
          'created_at' => date("d-m-Y"), 
          'updated_at' => date("d-m-Y"), 
        ];
        //echo "<pre>";print_r($dataAry);echo "</pre>"; die;
        if(HotelsModel::create($dataAry)){
          return back()->with('hotel_add_success', 'Hotel added successfully!');
        } else {
          return back()->with('hotel_add_error', 'Unable to add new hotel');
        }
      } catch (\Exception $e) {
        // Failure message
        return back()->with('hotel_add_error', $e->getMessage());
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
      //echo "<pre>";print_r($_POST);echo "</pre>"; echo "|".$request->hotel_id; die;
      try{
        if (!empty($request->hasFile('hotel_picture'))) {
          $request->validate([
            'hotel_name' => 'required',
            'hotel_location' => 'required',
            'hotel_type' => 'required',
            'hotel_description' => 'required',
            'hotel_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
          ]);
        } else {
          $request->validate([
            'hotel_name' => 'required',
            'hotel_location' => 'required',
            'hotel_type' => 'required',
            'hotel_description' => 'required',
          ]);         
        }
        
        $hotel_pic_path = $request->old_hotel_picture;
        if ($request->hasFile('hotel_picture')) {
          $file = $request->file('hotel_picture');
          $originalFileName = $file->getClientOriginalName();
          $cleanFileName = preg_replace('/[^A-Za-z0-9\-]/', '-', pathinfo($originalFileName, PATHINFO_FILENAME));
          $cleanFileNameWithExtension = $cleanFileName . '.' . $file->getClientOriginalExtension();
          $hotel_pic_path = $file->storeAs('img', $cleanFileNameWithExtension, 'public');
        }

        $dataAry = [
          'hotel_name' => $request->hotel_name, 
          'hotel_picture' => $hotel_pic_path, 
          'hotel_location' => $request->hotel_location, 
          'hotel_type' => $request->hotel_type, 
          'hotel_description' => $request->hotel_description, 
          'status' => $request->status, 
          'created_at' => date("Y-m-d"), 
          'updated_at' => date("Y-m-d"), 
        ];
        
        if(HotelsModel::where(['hotel_id' => $request->hotel_id])->update($dataAry)){
          return response()->json(['msg' => 'Hotel updated successfully.', 'status' => 1]);
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
        //echo $request->hotel_id; die;
        if(HotelsModel::where('hotel_id', $request->hotel_id)->delete()){
          return response()->json(['msg' => 'Hotel deleted successfully.', 'status' => 1]);
        } else {
          return response()->json(['msg' => 'Unable to delete hotel.', 'status' => 0]);
        }
      } catch (\Exception $e) {
        return response()->json(['msg' => $e->getMessage(), 'status' => 0]);
      }
    }

           
}
