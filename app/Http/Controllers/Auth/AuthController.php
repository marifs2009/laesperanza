<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Admin\GeneralSettingsModel;
use App\Models\Admin\MenuTypesModel;
use App\Models\Admin\SliderTypesModel;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $data['logo'] = GeneralSettingsModel::getLogo();
        // Check if the user is already logged in
        if (Auth::check()) {
            return redirect()->route('dashboard'); 
        }

        return view('auth.login', $data);
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration(): View
    {
        // Check if the user is already logged in
        return view('auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user_data = User::where('email', $request->email)->first();
            session([
                "islogined" => "yes", 
                "user_id" => $user_data->id, 
                "user_name" => $user_data->name, 
                "user_email" => $user_data->email, 
                "user_pic" => $user_data->pic, 
                "user_role" => USER_ROLES[$user_data->role], 
                "user_password" => $user_data->password, 
                "user_status" => $user_data->status
            ]);
            return redirect()->intended('admin/dashboard')->withSuccess('You have Successfully loggedin');
        }  
        return redirect("login")->withError('You have entered invalid credentials');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request): RedirectResponse
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $user = $this->create($data);
            
        Auth::login($user); 

        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            $data['logo'] = GeneralSettingsModel::getLogo();
            $data['menu_types'] = MenuTypesModel::getAll();
            $data['slider_types'] = SliderTypesModel::getAll();
            return view('admin/dashboard', $data);
        }
        
        return redirect("admin.login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }

    
}