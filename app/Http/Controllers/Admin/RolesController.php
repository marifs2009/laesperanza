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

class RolesController extends Controller
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
       // Validate the role field
      $request->validate([
        'role' => 'required|string|max:255', // Ensure the role name is required and within the max length
      ]);

      // Save the new role to the database
      $r = RolesModel::create([
        'name' => $request->role, // Store the role field
        'status' => 1, // Store the role field
      ]);
      if($r){
        $response['msg']="Role saved successfully.";
        $response['status'] = 1;
      } else {
          $response['msg']="Unable to save role";
          $response['status'] = 0;                
      }
      echo json_encode($response); exit;
    }  
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function update(Request $request)
    {
      try{
        $roles_id=$request->id;
        $request->validate([
          'role' => 'required|string|max:255', // Ensure the role name is required and within the max length
        ]);
        $dataAry=[
          'name'=> $request->role,
          'status'=>1,
          'updated_at'=>now(),
        ];
        $update=RolesModel::where('id',$roles_id)->update($dataAry);
        if($update){
          return back()->with('role_update_success','roles updated successfully');
        }
        else{
          return back()->with('role_update_error','unable to delete roles');
        }
      }
      catch(\Exception $e){
        return back()->with('role_update_error',$e->getMessage());
      }
      }
 
    public function delete(Request $request)
    {
      try{
        $roles_id=$request->id;

        $dataAry=[
          'status'=>2,
          'updated_at'=>date("Y-m-d")
        ];
        $soft_delete=RolesModel::where('id',$roles_id)->update($dataAry);
        if($soft_delete){
          return back()->with('roles_delete_success','roles deleted successfully');
        }
        else{
          return back()->with('roles_delete_error','unable to delete roles');
        }
      }
      catch(\Exception $e){
        return back()->with('roles_delete_error',$e->getMessage());
      }
    }
}
