<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\UsersModel;
use App\Models\Admin\RolesModel;
use App\Models\Admin\UserAddress;
use App\Models\Admin\UserOtherDetails;
use App\Models\Admin\GeneralSettingsModel;
use App\Models\Admin\MenuTypesModel;
use App\Models\Admin\MenusModel;
use App\Models\Admin\SliderTypesModel;
use App\Models\Admin\SlidersModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{

    public function add_view(Request $request)
    { 
      $data['menu_types'] = MenuTypesModel::getAll();
      $data['slider_types'] = SliderTypesModel::getAll();
      $data['logo'] = GeneralSettingsModel::getLogo(); 
      $data['role'] = RolesModel::getAll(); 
    //   echo "<pre>";
    //   print_r($data['role']); die;
      $data['page_title'] = "Add New User";
      return view('admin/users/add', $data);
    }
    public function edit_view($encodedId)
    {   

      $id = base64_decode($encodedId); // Decode ID
      $data['user'] = UsersModel::getDataByID($id);
      $data['user_add'] = UserAddress::getDataByID($id);
      $data['user_other_detail'] = UserOtherDetails::getDataByID($id);
    //   echo "<pre>";
    //   print_r($data); die;
      $data['menu_types'] = MenuTypesModel::getAll();
      $data['slider_types'] = SliderTypesModel::getAll();
      $data['logo'] = GeneralSettingsModel::getLogo();
      $data['role'] = RolesModel::getAll(); 
      $data['page_title'] = "Update User";
      return view('admin/users/edit', $data);
    }
    public function list_view(Request $request)
    {   
      $data['menu_types'] = MenuTypesModel::getAll();
      $data['slider_types'] = SliderTypesModel::getAll();
      $data['logo'] = GeneralSettingsModel::getLogo();
      $data['users'] = UsersModel::getDataByRole(3);
      $data['page_title'] = "Manage User";
    //   echo "<pre>";
    //   print_r($data['users']);die;
      return view('admin/users/list', $data);
    }

  

    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($_POST);
        // print_r($_FILES);die;
        // Validate input fields
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'dob' => 'required|date',
            'role' => 'required|integer',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address_type' => 'required|string',
            'house_no' => 'required|string',
            'address_line_1' => 'required|string',
            'address_line_2' => 'nullable|string',
            'landmark' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|integer',
            'pincode' => 'required|string',
            'address_proof' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_proof' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'passport_number' => 'required|string',
            'passport_expiry_date' => 'required|date',
        ]);
    
        // If validation fails, return errors to the form
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Handle File Uploads
        // $picture = $request->file('picture')->store('uploads/pictures', 'public');
        // $address_proof = $request->file('address_proof')->store('uploads/address_proofs', 'public');
        // $id_proof = $request->file('id_proof')->store('uploads/id_proofs', 'public');

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/pictures'), $filename);
            $picture = 'uploads/pictures/' . $filename;
        }
    
        if ($request->hasFile('address_proof')) {
            $file = $request->file('address_proof');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/address_proofs'), $filename);
            $address_proof = 'uploads/address_proofs/' . $filename;
        }
    
        if ($request->hasFile('id_proof')) {
            $file = $request->file('id_proof');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/id_proofs'), $filename);
            $id_proof = 'uploads/id_proofs/' . $filename;
        }
    
        
        // Create User
        $user = UsersModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'dob' => $request->dob,
            'pic' => $picture,
            // 'password' => '',
        ]);
    
        if (!$user) {
            return redirect()->back()->with('error', 'User creation failed!')->withInput();
        }
    
        // Create User Address
        UserAddress::create([
            'user_id' => $user->id,
            'adrs_type' => $request->address_type,
            'hno' => $request->house_no,
            'line1' => $request->address_line_1,
            'line2' => $request->address_line_2,
            'landmark' => $request->landmark,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'pin' => $request->pincode,
        ]);
    
        // Create User Other Details
        UserOtherDetails::create([
            'user_id' => $user->id,
            'address_proof' => $address_proof,
            'id_proof' => $id_proof,
            'passport_number' => $request->passport_number,
            'passport_exp_on' => $request->passport_expiry_date,
        ]);
    
        return redirect()->route('user.list')->with('success', 'User created successfully.');
    }
    
    public function update(Request $request) 
    {
        // echo "<pre>";
    
        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'dob' => 'nullable|date',
            'role' => 'required|integer',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address_type' => 'nullable|string',
            'house_no' => 'nullable|string',
            'address_line_1' => 'nullable|string',
            'address_line_2' => 'nullable|string',
            'landmark' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'country' => 'nullable|integer',
            'pincode' => 'nullable|string',
            'address_proof' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_proof' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'passport_number' => 'nullable|string',
            'passport_expiry_date' => 'nullable|date',
        ]);
    
        // If validation fails, return errors to the form
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Initialize variables with existing values (if file upload fails)
        $picture = $request->hidden_picture;
        $address_proof = $request->hidden_address_proof;
        $id_proof = $request->hidden_id_proof;
    
        // Handle File Uploads (only if a new file is uploaded)
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/pictures'), $filename);
            $picture = 'uploads/pictures/' . $filename;
        }
    
        if ($request->hasFile('address_proof')) {
            $file = $request->file('address_proof');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/address_proofs'), $filename);
            $address_proof = 'uploads/address_proofs/' . $filename;
        }
    
        if ($request->hasFile('id_proof')) {
            $file = $request->file('id_proof');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/id_proofs'), $filename);
            $id_proof = 'uploads/id_proofs/' . $filename;
        }
    
        // Update User Data
        $userUpdate = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'dob' => $request->dob,
            'pic' => $picture,
            'status' => $request->status,
        ];
    
        // Update User Address
        $update_UserAddress = [
            'adrs_type' => $request->address_type,
            'hno' => $request->house_no,
            'line1' => $request->address_line_1,
            'line2' => $request->address_line_2,
            'landmark' => $request->landmark,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'pin' => $request->pincode,
            'status' => $request->status
        ];
    
        // Update Other User Details
        $update_UserOtherDetails = [
            'address_proof' => $address_proof,
            'id_proof' => $id_proof,
            'passport_number' => $request->passport_number,
            'passport_exp_on' => $request->passport_expiry_date,
            'status' => $request->status
        ];
    
        // Hidden IDs
        $hidden_user_id = $request->hidden_user_id;
        $hidden_adrs_id = $request->hidden_adrs_id;
        $hidden_uod_id = $request->hidden_uod_id;
    
        // Update the Database
        UsersModel::updateUser(['id' => $hidden_user_id], $userUpdate);
        UserAddress::updateAddress(['adrs_id' => $hidden_adrs_id, 'user_id' => $hidden_user_id], $update_UserAddress);
        UserOtherDetails::updateOtherDetails(['uod_id' => $hidden_uod_id, 'user_id' => $hidden_user_id], $update_UserOtherDetails);
    
        return redirect()->route('user.list')->with('success', 'User updated successfully.');
    }
    

    public function delete(Request $request)
    {
        $request->validate(['id' => 'required|exists:users,id']);
        UsersModel::deleteUser($request->id);
        return response()->json(['msg' => 'User deleted successfully.']);
    }
}
