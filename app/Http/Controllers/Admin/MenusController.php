<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Models\Admin\RolesModel;
use App\Models\Admin\MealsModel;
use App\Models\Admin\MenuTypesModel;
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
      $m = MenuTypesModel::getMenuNameByTypeId($menu_type_id); 
      $data['menu_type_id'] = $menu_type_id;
      $data['page_title'] = "Manage : ".$m['menu_type_name'];
      $data['menu_types'] = MenuTypesModel::getAll();
      $data['logo'] = GeneralSettingsModel::getLogo();
      $data['slider_types'] = SliderTypesModel::getAll();
      return view('admin/menus', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
      try{
      $request->validate([
        'menu_type_id' => 'required',
        'menu_label' => 'required',
        // 'menu_link' => 'required',
        // 'menu_custom_link' => 'required',
        //'menu_parent_id' => 'required',
        'menu_order' => 'required',
      ]);

      $dataAry = [
        'menu_type_id' => $request->menu_type_id, 
        'menu_label' => $request->menu_label, 
        //'menu_link' => $request->menu_link, ///  for page id
        'menu_link' => $request->menu_custom_link, 
        'menu_order' => $request->menu_order, 
        'menu_parent_id' => 0,
        'status' => 1, 
        'created_at' => date("d-m-Y"), 
        'updated_at' => date("d-m-Y"), 
      ];
      if(MenusModel::create($dataAry)){
        return back()->with('menu_add_success', 'Menu added successfully!');
      } else {
        return back()->with('menu_add_error', 'Unable to add new menu');
      }
    } catch (\Exception $e) {
        // Failure message
        return back()->with('menu_add_error', $e->getMessage());
    }
    //return redirect()->route('users.index');
  }
}