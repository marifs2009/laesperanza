<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Models\Admin\RolesModel;
use App\Models\Admin\MealsModel;
use App\Models\Admin\MenuTypesModel;
use App\Models\Admin\PagesModel;
use App\Models\Admin\MenusModel;
use App\Models\Admin\SliderTypesModel;
use App\Models\Admin\TagsModel;
use App\Models\Admin\ActivityModel;
use App\Models\Admin\OffersModel;
use App\Models\Admin\GeneralSettingsModel;
use Illuminate\Support\Facades\Crypt;

class MenusController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function menus_list(Request $request) 
    {
      $menu_type_id = Crypt::decrypt($request->encry_menu_type_id);
      $r = MenusModel::getMenuByTypeId($menu_type_id);
      $data['selected_menu'] = !empty($r)?$r:"";

      //echo "<pre>"; print_r($data['selected_menu']); echo "</pre>"; 
      $m = MenuTypesModel::getMenuNameByTypeId($menu_type_id); 
      $data['menu_type_id'] = $menu_type_id;
      $data['page_title'] = "Manage : ".$m['menu_type_name'];
      $data['menu_types'] = MenuTypesModel::getAll();
      $data['parent_menus'] = MenusModel::getAllParentMenus($menu_type_id);
      $data['pages'] = PagesModel::getAll();
      $data['logo'] = GeneralSettingsModel::getLogo();
      $data['slider_types'] = SliderTypesModel::getAll();
      return view('admin/menus', $data);
    }
////////////////////////////////////////////////////////////////////////////////////
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
      //echo "<pre>"; print_r($_POST); echo "</pre>"; 
      try{
        $menu_type_id = $request->menu_type_id;  
        $parent_menu_id = $request->parent_menu_id ?? 0;      
        $menu_label = $request->menu_label;
        $page_id = $request->page_id;
        if($page_id > 0){
          $menu_link = $page_id;
        } else {
          $menu_link = $request->custom_link ?? "#";  
        }
        $menu_order = $request->menu_order;
        $status = $request->status;

        $request->validate([
          'menu_type_id' => 'required',
          'parent_menu_id' => 'required',
          'menu_label' => 'required',
          'menu_order' => 'required',
          'status' => 'required',
        ]);
        if($page_id > 0){
          $request->validate([
            'page_id' => 'required',
          ]);
        } else {
          $request->validate([
            'custom_link' => 'required',
          ]);
        }

      $dataAry = [
        'menu_type_id' => $request->menu_type_id, 
        'parent_menu_id' => $request->parent_menu_id, 
        'menu_label' => $request->menu_label,
        'menu_link' => $menu_link, 
        'menu_order' => $request->menu_order, 
        'status' => 1, 
        'created_at' => date("Y-m-d h:i:s"), 
        'updated_at' => date("Y-m-d h:i:s"), 
      ];
      //echo "<pre>"; print_r($dataAry); echo "</pre>"; die;
      if(MenusModel::create($dataAry)){
        return back()->with('menu_add_success', 'Menu added successfully!');
      } else {
        return back()->with('menu_add_error', 'Unable to add new menu');
      }
    } catch (\Exception $e) {
      return back()->with('menu_add_error', $e->getMessage());
    }
  }
////////////////////////////////////////////////////////////////////////////////////
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */



    public function edit(Request $request)
    {
    $data['menu_id']=$menu_id = Crypt::decrypt($request->encrypt_menu_id);
    $data['menu_type_id']=$request->menu_type_id;

    $data['menu']=MenusModel::getMenuById($menu_id);
    // echo "<pre>";print_r($data['menu']);die;
      $r = MenusModel::getMenuByTypeId($menu_id);
      $data['selected_menu'] = !empty($r)?$r:"";
      $m = MenuTypesModel::getMenuNameByTypeId($menu_id); 
      $data['page_title'] = "Edit Menu";
      $data['menu_types'] = MenuTypesModel::getAll();
      // $data['parent_menus'] = MenusModel::getAllParentMenus();
      $data['pages'] = PagesModel::getAll();
      $data['logo'] = GeneralSettingsModel::getLogo();
      $data['slider_types'] = SliderTypesModel::getAll();
      return view('admin/menu_edit', $data);
    }

    
////////////////////////////////////////////////////////////////////////////////////
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */

     public function update(Request $request)
    {
      //echo "<pre>"; print_r($_POST); echo "</pre>"; 
      try{
        $menu_id=$request->menu_id;
        $menu_type_id = $request->menu_type_id;  
        $parent_menu_id = $request->parent_menu_id ?? 0;      
        $menu_label = $request->menu_label;
        $page_id = $request->page_id;
        if($page_id > 0){
          $menu_link = $page_id;
        } else {
          $menu_link = $request->custom_link ?? "#";  
        }
        $menu_order = $request->menu_order;
        $status = $request->status;

        $request->validate([
          'menu_type_id' => 'required',
          'parent_menu_id' => 'required',
          'menu_label' => 'required',
          'menu_order' => 'required',
          'status' => 'required',
        ]);
        if($page_id > 0){
          $request->validate([
            'page_id' => 'required',
          ]);
        } else {
          $request->validate([
            'custom_link' => 'required',
          ]);
        }

      $dataAry = [

        'menu_type_id' => $request->menu_type_id, 
        'parent_menu_id' => $request->parent_menu_id, 
        'menu_label' => $request->menu_label,
        'menu_link' => $menu_link, 
        'menu_order' => $request->menu_order, 
        'status' => 1, 
        'created_at' => date("Y-m-d h:i:s"), 
        'updated_at' => date("Y-m-d h:i:s"), 
      ];
      //echo "<pre>"; print_r($dataAry); echo "</pre>"; die;
      if(MenusModel::where('menu_id',$menu_id)->update($dataAry)){
        return back()->with('menu_add_success', 'Menu added successfully!');
      } else {
        return back()->with('menu_add_error', 'Unable to add new menu');
      }
    } catch (\Exception $e) {
      return back()->with('menu_add_error', $e->getMessage());
    }
  }


    
    
  public function delete(Request $request)
  {
    try {
      $menu_id=$request->menu_id;
      $dataAry=[
        'status'=>2,
        'updated_at'=>date("Y-m-d")
      ];
      $soft_delete=MenusModel::where('menu_type_id',$menu_id)->update($dataAry);
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

  


  // public function delete(Request $request)
  // {
  //   try {

  //     $page_id=$request->page_id;
  //     $dataAry=[
  //       'status'=>2,
  //       'updated_at'=>date("y-m-d")
  //     ];

  //     $soft_delete=PagesModel::where('page_id',$page_id)->update($dataAry);
      
  //     //echo $request->page_id; die;
  //     if($soft_delete){
  //       return back()->with('page_delete_success','page deleted successfully');
  //     } else {
  //       return back()->with('page_delete_error','Unable to delete page');
  //     }
  //   } catch (\Exception $e) {
  //     return back()->with('page_delete_error',$e->getMessage());
  //   }
  // }


}