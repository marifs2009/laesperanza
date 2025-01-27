<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Admin\RolesModel;
use App\Models\Admin\MealsModel;
use App\Models\Admin\MenuTypesModel;
use App\Models\Admin\MenusModel;
use App\Models\Admin\SliderTypesModel;
use App\Models\Admin\SlidersModel;
use App\Models\Admin\PagesModel;
use App\Models\Admin\PageSectionModel;
use App\Models\Admin\TagsModel;
use App\Models\Admin\ActivityModel;
use App\Models\Admin\OffersModel;
use App\Models\Admin\GeneralSettingsModel;
use App\Models\Admin\TourTypesModel;
use App\Models\Admin\PageCategoryModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;


class PagesController extends Controller
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
      $data['page_title'] = "Manage pages";
      $data['logo'] = GeneralSettingsModel::getLogo();
      $data['pages'] = PagesModel::getAll();
      return view('admin/pages', $data);
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
      $data['page_title'] = "Add New Page";
      $data['files'] = $this->getTemplateFiles();
      $data['logo'] = GeneralSettingsModel::getLogo();
      $data['page_categories'] = PageCategoryModel::getAll();
      return view('admin/page_add', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {   
      $data['menu_types'] = MenuTypesModel::getAll();
      $data['slider_types'] = SliderTypesModel::getAll();
      $data['page_title'] = "Manage pages";
      
      $data['logo'] = GeneralSettingsModel::getLogo();
      $data['pages'] = PagesModel::getAll();
      //echo "<pre>";print_r($data['pages']);echo "</pre>";die;
      return view('admin/page_list', $data);
    }
///////////////////////////////////////////////////////////////////////////////////////////////////

    public function store(Request $request)
    {
      //echo "<pre>";print_r($_POST);echo "</pre>"; die;
      try{
        $request->validate([
          'page_title' => 'required',
          'page_category' => 'required',
          'page_slug' => 'required',
          'page_template' => 'required',
          'status' => 'required',          
          'page_banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
          'page_title' => 'Please enter page title.',
          'page_category' => 'Please select a category.',
          'page_slug' => 'Please enter page slug.',
          'page_template' => 'Please select page template.',
          'status' => 'Please select page status.',
          'page_banner.required' => 'Please select a banner image.'
        ]);
        $page_banner = '';
        if ($request->hasFile('page_banner')) {
          $file = $request->file('page_banner');
          $originalFileName = $file->getClientOriginalName();
          $cleanFileName = preg_replace('/[^A-Za-z0-9\-]/', '-', pathinfo($originalFileName, PATHINFO_FILENAME));
          $cleanFileNameWithExtension = $cleanFileName . '.' . $file->getClientOriginalExtension();
          $page_banner = $file->storeAs('img', $cleanFileNameWithExtension, 'public');
        }
        $dataAry = [
          'page_title' => $request->page_title,
          'page_slug' => $request->page_slug,
          'page_subtitle' => $request->page_subtitle ?? '',
          'page_template' => strtolower($request->page_template),
          'page_excerpt' =>  $request->page_excerpt ?? '',
          'meta_title' =>  $request->meta_title ?? '',
          'meta_keywords' =>  $request->meta_keyword ?? "",
          'meta_description' =>  $request->meta_description ?? '',
          'other_header_scripts'=> $request->other_header_html ?? '',
          'page_content' =>  $request->content ?? '',
          'page_category' => $request->page_category,
          'page_banner' => $page_banner,
          'status' => 1, 
          'created_at' => date("Y-m-d"), 
          'updated_at' => date("Y-m-d"),
        ];
        //echo "<pre>";print_r($dataAry);echo "</pre>"; //die;
        if(PagesModel::insert($dataAry)){
          return back()->withInput()->with('page_store_success', 'Page added successfully!');
        } else {
          return back()->withInput()->with('page_store_error', 'Unable to add new page');
        }
      } catch (\Exception $e) {
        return back()->withInput()->with('page_store_error', $e->getMessage());
      }
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
        $page_id = $request->segment(3);
        //if(!empty($slug)) { $data['slug'] = $slug; } 
        // else { $data['slug'] = 'home'; } 
        $data['files'] = $this->getTemplateFiles(); //templates
        $data['page'] = PagesModel::getPage($page_id);
        $data['page_title'] = "Edit Page";
        $data['page_sections'] = PageSectionModel::getAllSections($page_id);
        $data['menu_types'] = MenuTypesModel::getAll();
        $data['slider_types'] = SliderTypesModel::getAll();
        $data['logo'] = GeneralSettingsModel::getLogo();
        return view('admin/page_edit', $data);
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    public function update(Request $request)
    {
      //echo "<pre>";print_r($_POST);echo "</pre>"; echo "|".$request->page_id; die;
      try{
        if (!empty($request->hasFile('page_banner'))) {
          $request->validate([
            'page_title' => 'required',
            'page_category' => 'required',
            'page_slug' => 'required',
            'page_template' => 'required',
            'status' => 'required',          
            'page_banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ], [ 
            'page_title' => 'Please enter page title.',
            'page_category' => 'Please select a category.',
            'page_slug' => 'Please enter page slug.',
            'page_template' => 'Please select page template.',
            'status' => 'Please select page status.',
            'page_banner.required' => 'Please select a banner image.'
          ]);
        } 
        else {
          $request->validate([
            'page_title' => 'required',
            'page_category' => 'required',
            'page_slug' => 'required',
            'page_template' => 'required',
            'page_content' => 'required',
            'status' => 'required',
          ], [
            'page_title' => 'Please enter page title.',
            'page_category' => 'Please select a category.',
            'page_slug' => 'Please enter page slug.',
            'page_template' => 'Please select page template.',
            'page_content' => 'Please put some content on the page.',
            'status' => 'Please select page status.',
            'page_banner.required' => 'Please select a banner image.'
          ]);
        }
        $page_banner = $request->old_page_banner;
        if ($request->hasFile('page_banner')) {
          $file = $request->file('page_banner');
          $originalFileName = $file->getClientOriginalName();
          $cleanFileName = preg_replace('/[^A-Za-z0-9\-]/', '-', pathinfo($originalFileName, PATHINFO_FILENAME));
          $cleanFileNameWithExtension = $cleanFileName . '.' . $file->getClientOriginalExtension();
          $page_banner = $file->storeAs('img', $cleanFileNameWithExtension, 'public');
        }
        $dataAry = [
          'page_title' => $request->page_title,
          'page_slug' => $request->page_slug,
          'page_subtitle' => $request->page_subtitle ?? '',
          'page_template' => strtolower($request->page_template),
          'page_excerpt' =>  $request->page_excerpt ?? '',
          'meta_title' =>  $request->meta_title ?? '',
          'meta_keywords' =>  $request->meta_keyword ?? "",
          'meta_description' =>  $request->meta_description ?? '',
          'other_header_scripts'=> $request->other_header_html ?? '',
          'page_content' =>  $request->content ?? '',
          'page_banner' => $page_banner,
          'page_category' => $request->page_category,
          'status' => $request->status, 
          'updated_at' => date("Y-m-d"),
        ];
        //echo "<pre>";print_r($dataAry);echo "</pre>"; //die;
        if(PagesModel::where(['page_id' => $request->page_id])->update($dataAry)){
          return back()->withInput()->with('page_update_success', 'Page updated successfully!');
        } else {
          return back()->withInput()->with('page_update_error', 'No data updated');
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
      try {
        //echo $request->page_id; die;
        if(PagesModel::where('page_id', $request->page_id)->delete()){
          return response()->json(['msg' => 'page deleted successfully.', 'status' => 1]);
        } else {
          return response()->json(['msg' => 'Unable to delete page.', 'status' => 0]);
        }
      } catch (\Exception $e) {
        return response()->json(['msg' => $e->getMessage(), 'status' => 0]);
      }
    }

    public function getTemplateFiles()
    {
      $templatesDirectory = resource_path('views/templates');
      if (File::exists($templatesDirectory)) {
        $files = File::files($templatesDirectory);
        $fileNames = [];
        foreach ($files as $file) {
          if (str_starts_with($file->getFilename(), 'template')) {
            $fileName = $file->getFilename();
            $fileName = str_replace('.blade.php', '', $fileName);
            $fileName = str_replace('template_', '', $fileName);
            $fileNames[] = strtoupper($fileName);
          }
        }
        return $fileNames;
      }
      return [];
    }
}
