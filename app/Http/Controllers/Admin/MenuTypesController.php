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

class MenuTypesController extends Controller
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
        'menu_type_name' => 'required|string|max:255', 
        'menu_type_description' => 'required|string|max:5000', 
      ]);

      // Save the new country to the database
      $r = MenuTypesModel::create([
        'menu_type_name' => $request->menu_type_name, 
        'menu_type_description' => $request->menu_type_description, 
        'status' => 1, 
      ]);
      if($r){
        $response['msg']="Menu type saved successfully.";
        $response['status'] = 1;
      } else {
          $response['msg']="Unable to save menu type";
          $response['status'] = 0;                
      }
      echo json_encode($response); exit;
    }  


    public function update(Request $request){
      try{
        $menu_type_id=$request->menu_type_id;
        $request->validate([
          'menu_type_name'=>'required|string|max:255',
          'menu_type_description'=>'required',
        ]);
        $dataAry=[
          'menu_type_name'=>$request->menu_type_name,
          'menu_type_description'=>$request->menu_type_description,
          'status'=>1,
          'updated_at'=>now(),
        ];
        $menu=MenuTypesModel::where('menu_type_id',$menu_type_id)->update($dataAry);
        if($menu){
          return back()->with('menu_type_update_success','menu update successfully');
        }
        else{
          return back()->with('menu_type_update_error','menu type updated error');
        } 
      }
      catch(\Exception $e){
        return back()->with('menu_type_update_error',$e->getMessage());
      }
    }



    
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */

     public function delete(Request $request)
     {
       try {
         $menu_type_id=$request->menu_type_id;
         $dataAry=[
           'status'=>2,
           'updated_at'=>date("Y-m-d")
         ];
         $soft_delete=MenuTypesModel::where('menu_type_id',$menu_type_id)->update($dataAry);
         if($soft_delete)
         {
           return back()->with('menu_delete_success','menu deleted successfully');
         }
         else{
           return back()->with('menu_delete_error','unable to delete menu');
         }
       }
       catch(\Exception $e){
         return back()->with('menu_delete_error',$e->getMessage());
       }
   
     }
}
