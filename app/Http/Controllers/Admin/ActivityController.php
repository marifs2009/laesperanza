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

class ActivityController extends Controller
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
        
      $response = ['status' => 0, 'msg'=>''];
       // Validate the Activity field
      $request->validate([
        'activity_name' => 'required|string|max:255',
        'activity_description' => 'required|string|max:255',
      ]);

      // Save the new activity to the database
      $r = ActivityModel::create([
        'activity_name' => $request->activity_name, 
        'activity_description' => $request->activity_description, 
        'status' => 1, 
      ]);
      if($r){
       return back()->with('activity_add_success','activity addedd successfully');
      } else {
        return back()->with('activity_add_error','unable to activity addedd');
            
      }
      // echo json_encode($response); exit;
    }  
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function update(Request $request){
      try{
        $activity_id=$request->activity_id;
        $request->validate([
          'activity_name'=>'required|string|max:255',
          'activity_description'=>'required',
        ]);
        $dataAry=[
          'activity_name'=>$request->activity_name,
          'activity_description'=>$request->activity_description,
          'status'=>1,
          'updated_at'=>now(),
        ];
        $activity=ActivityModel::where('activity_id',$activity_id)->update($dataAry);
        if($activity){
          return back()->with('activity_update_success','activity update successfully');
        }
        else{
          return back()->with('activity_update_error','unable to update activity');
        } 
      }
      catch(\Exception $e){
        return back()->with('activity_update_error',$e->getMessage());
      }
    }



    public function delete(Request $request)
    {
      try{
        $activity_id=$request->activity_id;
        $dataAry=[
          'status'=>2,
          'updated_at'=>date("Y-m-d")
        ];
        $soft_delete=ActivityModel::where('activity_id',$activity_id)->update($dataAry);
        if($soft_delete)
        {
          return back()->with('activity_delete_success','activity deleted successfully');
        }
        else{
          return back()->with('activity_delete_error','unable to delete successfully');
        }
      }
      catch(\Exception $e){
        return back()->with('activity_delete_error',$e->getMessage());
      }
    }
}
