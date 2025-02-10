<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Models\Admin\RolesModel;
use App\Models\Admin\MealsModel;
use App\Models\Admin\MenuTypesModel;
use App\Models\Admin\SliderTypesModel;
use App\Models\Admin\CurrenciesModel;
use App\Models\Admin\ActivityModel;
use App\Models\Admin\OffersModel;
use App\Models\Admin\GeneralSettingsModel;

class SliderTypesController extends Controller 
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
        'slider_type_name' => 'required|string|max:255', 
        'slider_type_description' => 'required|string|max:5000', 
      ]);

      // Save the new country to the database
      $r = SliderTypesModel::create([
        'slider_type_name' => $request->slider_type_name, 
        'slider_type_description' => $request->slider_type_description, 
        'status' => 1, 
      ]);
      if($r){
        $response['msg']="Slider type saved successfully.";
        $response['status'] = 1;
      } else { 
          $response['msg']="Unable to save slider type";
          $response['status'] = 0;                
      }
      echo json_encode($response); exit;
    }  
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      try{
        $slider_type_id=$request->slider_type_id;

        $request->validate([
          'slider_type_name'=>'required|string|max:255',
          'slider_type_description'=>'required',
        ]);

        $dataAry=[
          'slider_type_name'=>$request->slider_type_name,
          'slider_type_description'=>$request->slider_type_description,
          'status'=>1,
          'updated_at'=>now(),
        ];
        $slider=SliderTypesModel::where('slider_type_id',$slider_type_id)->update($dataAry);
        if($slider)
        {
          return back()->with('sliderType_update_success','slider updated successfully');
        }
        else{
          return back()->with('sliderType_update_error','unable to updated slider');
        }
      }
      catch(\Exception $e)
      {
        return back()->with('sliderType_update_error',$e->getMessage());
      }
    }



     public function delete(Request $request)
   {
    try{
      $slider_type_id=$request->slider_type_id;

      $dataAry=[
        'status'=>2,
        'updated_at'=> date("Y-m-d")
      ];
      $soft_delete=SliderTypesModel::where('slider_type_id',$slider_type_id)->update($dataAry);

      if($soft_delete)
      {
        return back()->with('sliderType_delete_success','slider types deleted successfully');
      }
      else{
        return back()->with('sliderType_delete_error','unable to delete slider type');
      }
     }
     catch(\Exception $e)
     {
       return back()->with('sliderType_delete_error',$e->getMessage());
     }
   }
}
