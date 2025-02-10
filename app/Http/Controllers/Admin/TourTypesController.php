<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Models\Admin\RolesModel;
use App\Models\Admin\MealsModel;
use App\Models\Admin\MenuTypesModel;
use App\Models\Admin\SliderTypesModel;
use App\Models\Admin\TourTypesModel;
use App\Models\Admin\CurrenciesModel;
use App\Models\Admin\ActivityModel;
use App\Models\Admin\OffersModel;
use App\Models\Admin\GeneralSettingsModel;

class TourTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      ///print_r($_POST);
      $response = ['status' => 0, 'msg'=>''];
      
      $request->validate([
        'tour_type_name' => 'required|string|max:255', 
        'tour_type_description' => 'required|string|max:5000', 
      ]);

      // Save the new country to the database
      $r = TourTypesModel::create([
        'tour_type_name' => $request->tour_type_name, 
        'tour_type_description' => $request->tour_type_description, 
        'status' => 1, 
      ]);
      if($r){
        $response['msg']="Tour type saved successfully.";
        $response['status'] = 1;
      } else {
          $response['msg']="Unable to save tour type";
          $response['status'] = 0;                
      }
      echo json_encode($response); exit;
    }  
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request){
      try{
        $tour_type_id=$request->tour_type_id;
        $request->validate([
          'tour_type_name'=>'required|string|max:255',
          'tour_type_description'=>'required',
        ]);
        $dataAry=[
          'tour_type_name'=>$request->tour_type_name,
          'tour_type_description'=>$request->tour_type_description,
          'status'=>1,
          'updated_at'=>now(),
        ];
        $tour=TourTypesModel::where('tour_type_id',$tour_type_id)->update($dataAry);
        if($tour){
          return back()->with('tourType_update_success','tour update successfully');
        }
        else{
          return back()->with('tourType_update_error','tour type updated error');
        } 
      }
      catch(\Exception $e){
        return back()->with('tour_type_update_error',$e->getMessage());
      }
    }



     public function delete(Request $request)
     {
      try{
        $tour_type_id=$request->tour_type_id;
        $dataAry=[
          'status'=>2,
          'updated_at'=>date("Y-m-d")
        ];
        $soft_delete=TourTypesModel::where('tour_type_id',$tour_type_id)->update($dataAry);
        if($soft_delete)
        {
          return back()->with('tourTypes_delete_success','tour type deleted successfully');
        }
        else{
          return back()->with('tourTypes_delete_error','unable to delete successfully');
        }
      }
      catch(\Exception $e){
        return back()->with('tourTypes_delete_error',$e->getMessage());
      }
     }
}
