<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



use App\Models\Admin\RolesModel;
use App\Models\Admin\MealsModel;
use App\Models\Admin\MenuTypesModel;
use App\Models\Admin\MenusModel;
use App\Models\Admin\SliderTypesModel;
use App\Models\Admin\SlidersModel;
use App\Models\Admin\TourCategoryModel;
use App\Models\Admin\tour_categoriesectionModel;
use App\Models\Admin\TagsModel;
use App\Models\Admin\ActivityModel;
use App\Models\Admin\OffersModel;
use App\Models\Admin\GeneralSettingsModel;
use App\Models\Admin\TourTypesModel;
use App\Models\Admin\PageCategoryModel;
use App\Models\Admin\PagesModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;


class TourCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }


///////////////////////////////////////////////////////////////////////////////////////////

  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_page(Request $request)
    {   
      $data['menu_types'] = MenuTypesModel::getAll();
      $data['slider_types'] = SliderTypesModel::getAll();
      $data['tour_category_title'] = "Manage tour_categories";
      $data['logo'] = GeneralSettingsModel::getLogo();
      $data['tour_categories'] = PagesModel::getAll();
      return view('admin/tour_categories', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {   
      $data['menu_types'] = MenuTypesModel::getAll();
      $data['slider_types'] = SliderTypesModel::getAll();
      $data['tour_category_title'] = "Add Tour Category";
      $data['logo'] = GeneralSettingsModel::getLogo();
      $data['tour_categories'] = TourCategoryModel::getAll();
      //echo "<pre>";print_r($data['tour_categories']);echo "</pre>";die;
      return view('admin/tour_category_add', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {   
      $str="";
      $data['menu_types'] = MenuTypesModel::getAll();
      $data['slider_types'] = SliderTypesModel::getAll();
      $data['tour_category_title'] = "Manage Tour Category";
      
      $data['logo'] = GeneralSettingsModel::getLogo();
      $first_level = TourCategoryModel::getAllParentTourCategory();
      if(!empty($first_level)){
        $str .= "<ul>";
        foreach($first_level as $fl){
          $str .= '<li>'.$fl->tour_category_title.'</li>';//die;
          $second_level = TourCategoryModel::getChildTourCategory($fl->tour_category_id);
          if(!empty($second_level)){
            $str .= "<ul>";
            foreach($second_level as $sl){
              $str .= '<li>'.$sl->tour_category_title.'</li>';//die;
              $third_level = TourCategoryModel::getChildTourCategory($sl->tour_category_id);
              if(!empty($third_level)){
                $str .= "<ul>";
                foreach($third_level as $tl){
                  $str .= '<li>'.$tl->tour_category_title.'</li>';//die;
                  
                }
                $str .= "</ul>";
              }
            }
            $str .= "</ul>";
          }
        }
        $str .= "</ul>";
      }
      $data['tree'] = $str;
      $data['tour_categories'] = TourCategoryModel::getAll();
      //echo "<pre>";print_r($data['tour_categories']);echo "</pre>";die;
      return view('admin/tour_category_list', $data);
    }
///////////////////////////////////////////////////////////////////////////////////////////////////

    public function store(Request $request)
    {
      //echo "<pre>";print_r($_POST);echo "</pre>"; die;
      try{
        $request->validate([
          'tour_category_title' => 'required',
          'tour_parent_category_id' => 'required',
          'tour_category_slug' => 'required',
          'status' => 'required',          
          'tour_category_banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
          'tour_category_title' => 'Please enter page title.',
          'tour_parent_category_id' => 'Please select a category.',
          'tour_category_slug' => 'Please enter page slug.',
          'status' => 'Please select page status.',
          'tour_category_banner.required' => 'Please select a banner image.'
        ]);
        $tour_category_banner = '';
        if ($request->hasFile('tour_category_banner')) {
          $file = $request->file('tour_category_banner');
          $originalFileName = $file->getClientOriginalName();
          $cleanFileName = preg_replace('/[^A-Za-z0-9\-]/', '-', pathinfo($originalFileName, PATHINFO_FILENAME));
          $cleanFileNameWithExtension = $cleanFileName . '.' . $file->getClientOriginalExtension();
          $tour_category_banner = $file->storeAs('img', $cleanFileNameWithExtension, 'public');
        }
        if($request->tour_parent_category_id == -1){
          $category_level = 1;
        } else {
          $l = $this->getParentLevel($request->tour_parent_category_id);
          $category_level = $l + 1;
        }
//echo $category_level;die;
        $dataAry = [
          'tour_category_title' => $request->tour_category_title,
          'tour_category_slug' => $request->tour_category_slug,
          'tour_category_subtitle' => $request->tour_category_subtitle ?? '',
          'tour_category_excerpt' =>  $request->tour_category_excerpt ?? '',
          'tour_category_meta_title' =>  $request->meta_title ?? '',
          'tour_category_meta_keywords' =>  $request->meta_keyword ?? "",
          'tour_category_meta_description' =>  $request->meta_description ?? '',
          'tour_category_other_header_scripts'=> $request->other_header_html ?? '',
          'tour_category_content' =>  $request->content ?? '',
          'tour_parent_category_id' => $request->tour_parent_category_id, 
          'tour_category_banner' => $tour_category_banner,
          'category_level' => $category_level,
          'status' => 1, 
          'created_at' => date("Y-m-d"), 
          'updated_at' => date("Y-m-d"),
        ];
        //echo "<pre>";print_r($dataAry);echo "</pre>"; //die;
        if(TourCategoryModel::insert($dataAry)){
          return back()->withInput()->with('tour_category_store_success', 'Tour Category added successfully!');
        } else {
          return back()->withInput()->with('tour_category_store_error', 'Unable to add new Tour Category');
        }
      } catch (\Exception $e) {
        return back()->withInput()->with('tour_category_store_error', $e->getMessage());
      }
    }
    ////////////////////////////////////////////////////
    public function getParentLevel($tour_parent_category_id) {
      $r=  TourCategoryModel::select('category_level')->where(['status'=>1, 'tour_category_id'=>$tour_parent_category_id])->first();
      return !empty($r->category_level)?$r->category_level:0;
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function edit(Request $request)
    {
        $data = [];
        $tour_category_id = $request->segment(3);
        //if(!empty($slug)) { $data['slug'] = $slug; } 
        // else { $data['slug'] = 'home'; } 
        $data['page'] = TourCategoryModel::getPage($tour_category_id);
        $data['tour_category_title'] = "Edit Page";
        $data['tour_category_sections'] = tour_categoriesectionModel::getAllSections($tour_category_id);
        $data['menu_types'] = MenuTypesModel::getAll();
        $data['slider_types'] = SliderTypesModel::getAll();
        $data['logo'] = GeneralSettingsModel::getLogo();
        return view('admin/tour_category_edit', $data);
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    public function update(Request $request)
    {
      //echo "<pre>";print_r($_POST);echo "</pre>"; echo "|".$request->tour_category_id; die;
      try{
        if (!empty($request->hasFile('tour_category_banner'))) {
          $request->validate([
            'tour_category_title' => 'required',
            'tour_category' => 'required',
            'tour_category_slug' => 'required',
            'status' => 'required',          
            'tour_category_banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ], [ 
            'tour_category_title' => 'Please enter page title.',
            'tour_category' => 'Please select a category.',
            'tour_category_slug' => 'Please enter page slug.',
            'status' => 'Please select page status.',
            'tour_category_banner.required' => 'Please select a banner image.'
          ]);
        } 
        else {
          $request->validate([
            'tour_category_title' => 'required',
            'tour_category' => 'required',
            'tour_category_slug' => 'required',
            'tour_category_content' => 'required',
            'status' => 'required',
          ], [
            'tour_category_title' => 'Please enter page title.',
            'tour_category' => 'Please select a category.',
            'tour_category_slug' => 'Please enter page slug.',
            'tour_category_content' => 'Please put some content on the page.',
            'status' => 'Please select page status.',
            'tour_category_banner.required' => 'Please select a banner image.'
          ]);
        }
        $tour_category_banner = $request->old_tour_category_banner;
        if ($request->hasFile('tour_category_banner')) {
          $file = $request->file('tour_category_banner');
          $originalFileName = $file->getClientOriginalName();
          $cleanFileName = preg_replace('/[^A-Za-z0-9\-]/', '-', pathinfo($originalFileName, PATHINFO_FILENAME));
          $cleanFileNameWithExtension = $cleanFileName . '.' . $file->getClientOriginalExtension();
          $tour_category_banner = $file->storeAs('img', $cleanFileNameWithExtension, 'public');
        }
        $dataAry = [
          'tour_category_title' => $request->tour_category_title,
          'tour_category_slug' => $request->tour_category_slug,
          'tour_category_subtitle' => $request->tour_category_subtitle ?? '',
          'tour_category_excerpt' =>  $request->tour_category_excerpt ?? '',
          'meta_title' =>  $request->meta_title ?? '',
          'meta_keywords' =>  $request->meta_keyword ?? "",
          'meta_description' =>  $request->meta_description ?? '',
          'other_header_scripts'=> $request->other_header_html ?? '',
          'tour_category_content' =>  $request->content ?? '',
          'tour_category_banner' => $tour_category_banner,
          'tour_category' => $request->tour_category,
          'status' => $request->status, 
          'updated_at' => date("Y-m-d"),
        ];
        //echo "<pre>";print_r($dataAry);echo "</pre>"; //die;
        if(TourCategoryModel::where(['tour_category_id' => $request->tour_category_id])->update($dataAry)){
          return back()->withInput()->with('tour_category_update_success', 'Page updated successfully!');
        } else {
          return back()->withInput()->with('tour_category_update_error', 'No data updated');
        }
      } catch (\Exception $e) {
        return response()->json(['msg' => $e->getMessage(), 'status' => 0]);
      }
    }

///////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function delete(Request $request)
{
    // \Log::info('Delete Request:', $request->all());

    try {
        $tour_category_id = $request->tour_category_id;

        if (!$tour_category_id) {
            return back()->with('error', 'Invalid tour category ID');
        }

        $dataAry = [
            'status' => 2,
            'updated_at' => now("y-m-d"), 
        ];

        $soft_delete = TourCategoryModel::where('tour_category_id', $tour_category_id)->update($dataAry);
        if ($soft_delete) {
            return back()->with('tour_delete_success', 'Tour category deleted successfully!');
        } else {
            return back()->with('tour_delete_error', 'Unable to delete tour category');
        }
    } catch (\Exception $e) {
        // \log::error('Delete Error:', ['message' => $e->getMessage()]);
        return back()->with('tour_delete_error', $e->getMessage());
    }
}

    




    // public function delete(Request $request)
    // {
    //     Log::info('Delete request received:', $request->all());
    
    //     $tour_category_id = $request->tour_category_id;
    
    //     if (!$tour_category_id) {
    //         return back()->with('error', 'Invalid tour ID');
    //     }
    
    //     try {
    //         $deleted = TourCategoryModel::where('tour_category_id', $tour_category_id)->delete();
    
    //         if ($deleted) {
    //             return back()->with('success', 'Tour deleted successfully');
    //         } else {
    //             return back()->with('error', 'Unable to delete tour');
    //         }
    //     } catch (\Exception $e) {
    //         Log::error('Delete error:', ['message' => $e->getMessage()]);
    //         return back()->with('error', $e->getMessage());
    //     }
    // }
    
}
