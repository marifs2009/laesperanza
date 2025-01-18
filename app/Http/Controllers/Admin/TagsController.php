<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Models\Admin\RolesModel;
use App\Models\Admin\MealsModel;
use App\Models\Admin\MenuTypesModel;
use App\Models\Admin\TagsModel;
use App\Models\Admin\ActivityModel;
use App\Models\Admin\OffersModel;
use App\Models\Admin\GeneralSettingsModel;

class TagsController extends Controller
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
       // Validate the tag field
      $request->validate([
        'tag' => 'required|string|max:255', // Ensure the tag name is required and within the max length
      ]);

      // Save the new Tags to the database
      $r = TagsModel::create([
        'tag_name' => $request->tag, // Store the tag field
        'status' => 1, // Store the tag field
      ]);
      if($r){
        $response['msg']="Tag saved successfully.";
        $response['status'] = 1;
      } else {
          $response['msg']="Unable to save tag";
          $response['status'] = 0;                
      }
      echo json_encode($response); exit;
    }  
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
}
