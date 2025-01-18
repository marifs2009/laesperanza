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

class GeneralSettingsController extends Controller
{
    public function updateLogo(Request $request)
    {
        // Validate the request
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
        ]);

        // Handle file upload
        if ($request->hasFile('logo')) {
            // Store the new logo
            $file = $request->file('logo');
            
            // Generate a unique name for the file
            $fileName = 'business_logo_' . time() . '.' . $file->getClientOriginalExtension();

            // Store the file in the 'img' folder under 'public' disk
            $logoPath = $file->storeAs('img', $fileName, 'public');

            // Update the 'business_logo' setting in the database
            $r = GeneralSettingsModel::where("name", 'business_logo')->update(['value' => $logoPath]);

            if($r){
                $response['msg']="Logo updated successfully.";
                $response['status'] = 1;
            } else {
                $response['msg']="Unable to update logo.";
                $response['status'] = 0;                
            }
            echo json_encode($response); exit;
        }     
        $response['msg']="Unable to update logo";
        $response['status'] = 0;                
        echo json_encode($response); exit;  
    }

    public function updateOtherDetails(Request $request)
    {
        $response = ['status' => 0, 'msg'=>''];

        $request->validate([
            'business_name' => 'required|string|max:255', 
            'business_location' => 'required|string|max:255', 
            'email' => 'required|string|max:255', 
            'contact_number' => 'required|string|max:255', 
            'copyright_text' => 'required|string|max:500', 
            'admin_email' => 'required|string|max:255'
        ]);
        $business_name = $request->business_name;
        $business_location = $request->business_location;
        $email = $request->email;
        $contact = $request->contact_number;
        $copyright_text = $request->copyright_text;
        $admin_email = $request->admin_email;
        $whatsapp_number = $request->whatsapp_number;
        $currency_symbol = $request->currency_symbol;

        $msg = '';
        $r = GeneralSettingsModel::where("name", 'business_name')->update(['value' => $business_name]);
        if($r){ $msg .= "Name updated successfully.<br>"; } 
        else {$msg .="Unable to update Name.<br>"; }
        $r = GeneralSettingsModel::where("name", 'business_location')->update(['value' => $business_location]);
        if($r){ $msg .= "Location updated successfully.<br>"; } 
        else {$msg .="Unable to update location.<br>"; }
        $r = GeneralSettingsModel::where("name", 'email')->update(['value' => $email]);
        if($r){ $msg .= "Email updated successfully.<br>"; } 
        else {$msg .="Unable to update email.<br>"; }
        $r = GeneralSettingsModel::where("name", 'contact')->update(['value' => $contact]);
        if($r){ $msg .= "Contact updated successfully.<br>"; } 
        else {$msg .="Unable to update contact.<br>"; }
        $r = GeneralSettingsModel::where("name", 'admin_email')->update(['value' => $admin_email]);
        if($r){ $msg .= "Admin email updated successfully.<br>"; } 
        else {$msg .="Unable to update admin email.<br>"; }
        $r = GeneralSettingsModel::where("name", 'copyright_text')->update(['value' => $copyright_text]);
        if($r){ $msg .= "Copyright text updated successfully.<br>"; } 
        else {$msg .="Unable to update copyright text.<br>"; }
        
        $r = GeneralSettingsModel::where("name", 'whatsapp_number')->update(['value' => $whatsapp_number]);
        if($r){ $msg .= "WhatsApp Number updated successfully.<br>"; } 
        else {$msg .="Unable to update WhatsApp Number.<br>"; }

        
        $r = GeneralSettingsModel::where("name", 'currency_symbol')->update(['value' => $currency_symbol]);
        if($r){ $msg .= "Currency symbol updated successfully."; } 
        else {$msg .="Unable to update currency symbol."; }

        $response['msg']=$msg;
        $response['status'] = 1;
        echo json_encode($response); exit;
    }

}
