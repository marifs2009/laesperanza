<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Models\Admin\RolesModel;
use App\Models\Admin\MealsModel;
use App\Models\Admin\MenuTypesModel;
use App\Models\Admin\ActivityModel;
use App\Models\Admin\OffersModel;
use App\Models\Admin\GeneralSettingsModel;

class OffersController extends Controller
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
        'offer_name' => 'required|string|max:255', 
        'offer_description' => 'required|string|max:255', 
      ]);

      // Save the new payment_modes to the database
      $r = OffersModel::create([
        'offer_name' => $request->offer_name,
        'offer_description' => $request->offer_description,
        'status' => 1, // Store the role field
      ]);
      if($r){
        $response['msg']="Offer saved successfully.";
        $response['status'] = 1;
      } else {
          $response['msg']="Unable to save offer";
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
