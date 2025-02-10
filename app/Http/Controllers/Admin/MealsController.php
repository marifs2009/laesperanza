<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Models\Admin\RolesModel;
use App\Models\Admin\MealsModel;
use App\Models\Admin\MenuTypesModel;
use App\Models\Admin\CurrenciesModel;
use App\Models\Admin\ActivityModel;
use App\Models\Admin\OffersModel;
use App\Models\Admin\GeneralSettingsModel;

class MealsController extends Controller
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
        'meal_type_name' => 'required|string|max:255', 
        'meal_type_description' => 'required|string|max:5000', 
      ]);

      // Save the new country to the database
      $r = MealsModel::create([
        'meal_type_name' => $request->meal_type_name, 
        'meal_type_description' => $request->meal_type_description, 
        'status' => 1, 
      ]);
      if($r){
        $response['msg']="Meal saved successfully.";
        $response['status'] = 1;
      } else {
          $response['msg']="Unable to save Meal";
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
        $meal_type_id=$request->meal_type_id;
        $request->validate([
          'meal_type_name'=>'required|string|max:255',
          'meal_type_description'=>'required',
        ]);
        $dataAry=[
          'meal_type_name'=>$request->meal_type_name,
          'meal_type_description'=>$request->meal_type_description,
          'status'=>1,
          'updated_at'=>now(),
        ];
        $update=MealsModel::where('meal_type_id',$meal_type_id)->update($dataAry);
        if($update)
        {
          return back()->with('mael_update_success','meal updated successfully');
        }
        else{
          return back()->with('meal_update_error','unable to meal update');
        }
      }
      catch(\Exception $e)
      {
        return back()->with('meal_update_error',$e->getMessage());
      }

    }



     public function delete(Request $request){
      try{
        $meal_type_id=$request->meal_type_id;
        $dataAry=[
          'status'=>2,
          'updated_at'=>date("Y-m-d")
        ];
        $soft_delete=MealsModel::where('meal_type_id',$meal_type_id)->update($dataAry);
        if($soft_delete){
          return back()->with('meal_delete_success','meal deleted successfully');
        }
        else{
          return back()->with('meal_delete_error','unable to delete meal');
        }
      }
      catch(\Exception $e){
        return back()->with('meal_delete_error',$e->getMessage());
      }
     }
}
