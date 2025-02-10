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
use App\Models\Admin\TourCategoryModel;
use App\Models\Admin\TourModel;
use App\Models\Admin\TagsModel;
use App\Models\Admin\ActivityModel;
use App\Models\Admin\OffersModel;
use App\Models\Admin\GeneralSettingsModel;
use App\Models\Admin\TourTypesModel;
use App\Models\Admin\PageCategoryModel;
use App\Models\Admin\TourCategoryMapModel;
use App\Models\Admin\HotelsModel;
use App\Models\Admin\TourHotelMapModel;
use App\Models\Admin\TourItineraryModel;
use App\Models\Admin\TourGalleryModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;


class TourController extends Controller
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
    public function show_tour(Request $request)
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
    public function add($tour_id = null)
    {   
      $data['menu_types'] = MenuTypesModel::getAll();
      $data['slider_types'] = SliderTypesModel::getAll();
      $data['tour_category_title'] = "Add New Tour";
      $data['logo'] = GeneralSettingsModel::getLogo();
      $data['selected_tour'] = [];
      if($tour_id > 0){
        $data['selected_tour'] = TourModel::getTourById($tour_id);
      }
      
      $data['tour_types'] = TourTypesModel::getAll();
      $data['tags'] = TagsModel::getAll();
      $data['hotels'] = HotelsModel::getAll();
      $str = "";
      $first_level = TourCategoryModel::getAllParentTourCategory();
      if(!empty($first_level)){
        $str .= "<ul style='list-style-type: none;'>";
        foreach($first_level as $fl){
          $str .= '<li><input type="checkbox" name="selected_tour_categories[]"> '.$fl->tour_category_title.'</li>';//die;
          $second_level = TourCategoryModel::getChildTourCategory($fl->tour_category_id);
          if(!empty($second_level)){
            $str .= "<ul style='list-style-type: none;'>";
            foreach($second_level as $sl){
              $str .= '<li><input type="checkbox" name="selected_tour_categories[]"> '.$sl->tour_category_title.'</li>';//die;
              $third_level = TourCategoryModel::getChildTourCategory($sl->tour_category_id);
              if(!empty($third_level)){
                $str .= "<ul style='list-style-type: none;'>";
                foreach($third_level as $tl){
                  $str .= '<li><input type="checkbox" name="selected_tour_categories[]"> '.$tl->tour_category_title.'</li>';//die;
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
      $data['categories'] = TourCategoryModel::getAll();

      //print_r($data['tour_parent_categories']);
      return view('admin/tour_add', $data);
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
      $data['page_title'] = "Manage Tours";
      $data['logo'] = GeneralSettingsModel::getLogo();
      $data['categories'] = TourCategoryModel::getAll();
      $data['tour_types'] = TourTypesModel::getAll();
      
      $data['tours'] = TourModel::getAll();
      $data['mapped_categories'] = TourCategoryMapModel::getAll();
      $data['hotels'] = HotelsModel::getAll();
      $data['mapped_hotels'] = TourHotelMapModel::getAll();
      $data['mapped_itineraries'] = TourItineraryModel::getAll();
      $data['tags'] = TagsModel::getAll();
      $data['gallery'] = TourGalleryModel::getAll();

      return view('admin/tour_list', $data);
    }
///////////////////////////////////////////////////////////////////////////////////////////////////

    ////////////////////////////////////////////////////
    public function getParentLevel($tour_parent_category_id) {
      $r=  TourModel::select('category_level')->where(['status'=>1, 'tour_category_id'=>$tour_parent_category_id])->first();
      return !empty($r->category_level)?$r->category_level:0;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////

    public function requiredfields_store(Request $request)
    {
      //echo "<pre>";print_r($_POST);echo "</pre>"; die;
      //dd($request->all());
      try{
        $data =[];
        $input = $request->all();
        $validator = Validator::make(
        $request->all(),
          [
            'tour_title' => 'required',
            'tour_slug' => 'required',
            'tour_code' => 'required',
            'tour_price_per_adult' => 'required',
            'tour_price_per_child' => 'required',
            'tour_duration_days' => 'required',
            'tour_duration_night' => 'required',
            'tour_type' => 'required',
            'tour_start' => 'required',
            'tour_group_size_adult' => 'required',
            'tour_group_size_child' => 'required',
            'status' => 'required',
            'tour_banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
          ],
          [
            'tour_title.required' => 'Please enter tour title.',
            'tour_slug.required' => 'Please enter tour slug.',
            'tour_code.required' => 'Please enter tour code.',
            'tour_price_per_adult.required' => 'Please enter price for adult.',
            'tour_price_per_child.required' => 'Please enter price for child.',
            'tour_duration_days.required' => 'Please enter number of days.',
            'tour_duration_night.required' => 'Please enter number of nights.',
            'tour_type.required' => 'Please enter tour type.',
            'tour_start.required' => 'Please enter tour starting location.',
            'tour_group_size_adult.required' => 'Please enter max. number of adults in group.',
            'tour_group_size_child.required' => 'Please enter max. number of children in group.',
            'status.required' => 'Please select tour status.',
            'tour_banner.required' => 'Please select a banner image.'
          ]
        );
        if ($validator->fails()) {return back()->withInput($input)->withErrors($validator);}

        $tour_banner = '';
        if ($request->hasFile('tour_banner')) {
            $file = $request->file('tour_banner');
            $originalFileName = $file->getClientOriginalName();
            $cleanFileName = preg_replace('/[^A-Za-z0-9\-]/', '-', pathinfo($originalFileName, PATHINFO_FILENAME));
            $cleanFileNameWithExtension = $cleanFileName . '.' . $file->getClientOriginalExtension();
            $tour_banner = $file->storeAs('img', $cleanFileNameWithExtension, 'public');
        }

        $dataAry = [
            "tour_code" => $request->tour_code,
            "tour_title" => $request->tour_title,
            "tour_slug" => $request->tour_slug,
            "tour_duration_day" => $request->tour_duration_days,
            "tour_duration_night" => $request->tour_duration_night,
            "tour_type" => implode(',', $request->tour_type),
            "tour_start_location" => $request->tour_start,
            "tour_group_size_adult" => $request->tour_group_size_adult,
            "tour_group_size_child" => $request->tour_group_size_child,
            "tour_banner" => $tour_banner,
            "is_draft" => 1,
            "is_publish" => 0,
            'status' => 1,
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        ];

        //echo "<pre>";print_r($dataAry);echo "</pre>"; 
        $tour_id  = TourModel::insertGetId($dataAry);

        // $lastQuery = DB::getQueryLog();
        // echo '<pre>'; print_r($lastQuery); echo '</pre>';   die;
        
        if($tour_id > 0){
          return redirect()->route('tour.edit', ['tour_id' => $tour_id])->with('tour_requiredfields_success', 'Required fields of Tour added successfully!');
        } else {
          return back()->withInput()->with('tour_requiredfields_error', 'Unable to add Required fields of new tour');
        }
      } catch (\Exception $e) {
        return back()->withInput()->with('tour_category_store_error', $e->getMessage());
      }
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    public function requiredfields_update(Request $request)
    {
      //echo "<pre>";print_r($_POST);echo "</pre>"; die;
      //dd($request->all());
      try{
        $data =[];
        $input = $request->all();
        if($request->hasFile('tour_banner')) {
          $validator = Validator::make(
            $request->all(),
            [
              'tour_title' => 'required',
              'tour_slug' => 'required',
              'tour_code' => 'required',
              'tour_price_per_adult' => 'required',
              'tour_price_per_child' => 'required',
              'tour_duration_days' => 'required',
              'tour_duration_night' => 'required',
              'tour_type' => 'required',
              'tour_start' => 'required',
              'tour_group_size_adult' => 'required',
              'tour_group_size_child' => 'required',
              'status' => 'required',
              'tour_banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            [
              'tour_title.required' => 'Please enter tour title.',
              'tour_slug.required' => 'Please enter tour slug.',
              'tour_code.required' => 'Please enter tour code.',
              'tour_price_per_adult.required' => 'Please enter price for adult.',
              'tour_price_per_child.required' => 'Please enter price for child.',
              'tour_duration_days.required' => 'Please enter number of days.',
              'tour_duration_night.required' => 'Please enter number of nights.',
              'tour_type.required' => 'Please enter tour type.',
              'tour_start.required' => 'Please enter tour starting location.',
              'tour_group_size_adult.required' => 'Please enter max. number of adults in group.',
              'tour_group_size_child.required' => 'Please enter max. number of children in group.',
              'status.required' => 'Please select tour status.',
              'tour_banner.required' => 'Please select a banner image.'
            ]
          );
        } else {
          $validator = Validator::make(
            $request->all(),
            [
              'tour_title' => 'required',
              'tour_slug' => 'required',
              'tour_code' => 'required',
              'tour_price_per_adult' => 'required',
              'tour_price_per_child' => 'required',
              'tour_duration_days' => 'required',
              'tour_duration_night' => 'required',
              'tour_type' => 'required',
              'tour_start' => 'required',
              'tour_group_size_adult' => 'required',
              'tour_group_size_child' => 'required',
              'status' => 'required',
            ],
            [
              'tour_title.required' => 'Please enter tour title.',
              'tour_slug.required' => 'Please enter tour slug.',
              'tour_code.required' => 'Please enter tour code.',
              'tour_price_per_adult.required' => 'Please enter price for adult.',
              'tour_price_per_child.required' => 'Please enter price for child.',
              'tour_duration_days.required' => 'Please enter number of days.',
              'tour_duration_night.required' => 'Please enter number of nights.',
              'tour_type.required' => 'Please enter tour type.',
              'tour_start.required' => 'Please enter tour starting location.',
              'tour_group_size_adult.required' => 'Please enter max. number of adults in group.',
              'tour_group_size_child.required' => 'Please enter max. number of children in group.',
              'status.required' => 'Please select tour status.',
            ]
          );
        }
        if ($validator->fails()) {return back()->withInput($input)->withErrors($validator);}

        $tour_banner = $request->old_tour_banner;
        if ($request->hasFile('tour_banner')) {
            $file = $request->file('tour_banner');
            $originalFileName = $file->getClientOriginalName();
            $cleanFileName = preg_replace('/[^A-Za-z0-9\-]/', '-', pathinfo($originalFileName, PATHINFO_FILENAME));
            $cleanFileNameWithExtension = $cleanFileName . '.' . $file->getClientOriginalExtension();
            $tour_banner = $file->storeAs('img', $cleanFileNameWithExtension, 'public');
        }
        $dataAry = [
            "tour_code" => $request->tour_code,
            "tour_title" => $request->tour_title,
            "tour_slug" => $request->tour_slug,
            "tour_duration_day" => $request->tour_duration_days,
            "tour_duration_night" => $request->tour_duration_night,
            "tour_type" => implode(',', $request->tour_type),
            "tour_start_location" => $request->tour_start,
            "tour_group_size_adult" => $request->tour_group_size_adult,
            "tour_group_size_child" => $request->tour_group_size_child,
            "tour_price_per_adult" => $request->tour_price_per_adult,
            "tour_price_per_child" => $request->tour_price_per_child,
            "tour_banner" => $tour_banner,
            "is_draft" => 1,
            "is_publish" => 0,
            'status' => 1,
            'updated_at' => date("Y-m-d"),
        ];
        $updateCount = TourModel::where('tour_id', $request->tour_id)->update($dataAry);
        
        if ($updateCount > 0) {
          return redirect()->route('tour.edit', ['tour_id' => $tour_id])->with('tour_requiredfields_success', 'Required fields of Tour added successfully!');
        } else {
          return back()->withInput()->with('tour_requiredfields_error', 'Unable to add Required fields of new tour');
        }
      } catch (\Exception $e) {
        return back()->withInput()->with('tour_category_store_error', $e->getMessage());
      }
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    public function optionalfields_update(Request $request)
    {
      //echo "<pre>";print_r($_POST);echo "</pre>"; die;
      try{
        $data = [];
        $tour_id = $request->tour_id;
        $dataAry = [
            "tour_subtitle" => $request->tour_subtitle,
            "tour_tags" => implode(',', $request->tour_tags),
            "tour_excerpt" => $request->tour_excerpt,
            "tour_description" => $request->tour_description,
            "tour_inclusion" => $request->tour_inclusion,
            "tour_exclusion" => $request->tour_exclusion,
            "tour_available_offer" => $request->tour_available_offer,
            "tour_meals" => $request->tour_meals,
            "tour_transfer" => $request->tour_transfer,
            "tour_tax" => $request->tour_tax,
            "tour_add_to_hot_deals" => $request->tour_add_to_hot_deals,
            "updated_at" => date("Y-m-d")
          ];    
        
        if (TourModel::where('tour_id', $tour_id)->update($dataAry)) {
          return redirect()->route('tour.edit', ['tour_id' => $tour_id])->with('tour_optionalfields_success', 'Optional fields updated successfully!');
        } else {
          return back()->withInput()->with('tour_optionalfields_error', 'Unable to update Optional fields of tour.');
        }
      } catch (\Exception $e) {
        return back()->withInput()->with('tour_optionalfields_error', $e->getMessage());
      }
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    public function metafields_update(Request $request)
    {
      //echo "<pre>";print_r($_POST);echo "</pre>"; die;
      try{
        $data = [];
        $tour_id = $request->tour_id;
        $dataAry = [
            "meta_title" => $request->meta_title,
            "meta_keyword" => $request->meta_keyword,
            "meta_description" => $request->meta_description,
            "other_header_html" => $request->other_header_html,
            "updated_at" => date("Y-m-d")
          ];    
        
        if (TourModel::where('tour_id', $tour_id)->update($dataAry)) {
          return redirect()->route('tour.edit', ['tour_id' => $tour_id])->with('tour_metafields_success', 'Meta fields updated successfully!');
        } else {
          return back()->withInput()->with('tour_metafields_error', 'Unable to update Meta fields of tour.');
        }
      } catch (\Exception $e) {
        return back()->withInput()->with('tour_metafields_error', $e->getMessage());
      }
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    public function categoryfields_update(Request $request)
    {
      //echo "<pre>";print_r($_POST);echo "</pre>"; die;
      try{
        $data = [];
        $tour_id = $request->tour_id;
        $categories = $request->selected_tour_categories;

        TourCategoryMapModel::where('tour_id', $tour_id)->delete();
        foreach( $categories as  $category) {
          $dataAry[] = [
            "tour_id" => $tour_id,
            "tour_category_id" => $category,
            "status" =>1
          ]; 
        }   
        if (TourCategoryMapModel::insert($dataAry)) {
          return redirect()->route('tour.edit', ['tour_id' => $tour_id])->with('tour_categoryfields_success', 'Categories updated successfully!');
        } else {
          return back()->withInput()->with('tour_categoryfields_error', 'Unable to update category of tour.');
        }
      } catch (\Exception $e) {
        return back()->withInput()->with('tour_categoryfields_error', $e->getMessage());
      }
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    public function itineraryfields_update(Request $request)
    {
      //echo "<pre>";print_r($_POST);echo "</pre>"; die;
      try{
        $data = [];
        $tour_id = $request->tour_id;
        $itinerary_titles = $request->itinerary_title;
        $itinerary_descriptions = $request->itinerary_description;
        $count = count($itinerary_titles);
        TourCategoryMapModel::where('tour_id', $tour_id)->delete();
        for( $i=0; $i<$count; $i++) {
          $dataAry[] = [
            "tour_id" => $tour_id,
            "itinerary_title" => $itinerary_titles[$i],
            "itinerary_description" => $itinerary_descriptions[$i],
            "status" =>1
          ]; 
        }   
        if (TourItineraryModel::insert($dataAry)) {
          return redirect()->route('tour.edit', ['tour_id' => $tour_id])->with('tour_itineraryfields_success', 'Itinerary updated successfully!');
        } else {
          return back()->withInput()->with('tour_itineraryfields_error', 'Unable to update Itinerary of tour.');
        }
      } catch (\Exception $e) {
        return back()->withInput()->with('tour_itineraryfields_error', $e->getMessage());
      }
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    public function hotelfields_update(Request $request)
    {
      //echo "<pre>";print_r($_POST);echo "</pre>"; die;
      try{
        $data = [];
        $tour_id = $request->tour_id;
        $hotel_ids = $request->hotel_id;
        $hotel_descriptions = $request->hotel_description;
        $count = count($hotel_ids);
        TourCategoryMapModel::where('tour_id', $tour_id)->delete();
        for( $i=0; $i<$count; $i++) {
          $dataAry[] = [
            "tour_id" => $tour_id,
            "hotel_id" => $hotel_ids[$i],
            "description" => $hotel_descriptions[$i],
            "status" =>1
          ]; 
        }   
        if (TourHotelMapModel::insert($dataAry)) {
          return redirect()->route('tour.edit', ['tour_id' => $tour_id])->with('tour_hotelfields_success', 'Hotel mapping updated successfully!');
        } else {
          return back()->withInput()->with('tour_hotelfields_error', 'Unable to map hotel of tour.');
        }
      } catch (\Exception $e) {
        return back()->withInput()->with('tour_hotelfields_error', $e->getMessage());
      }
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    public function imagefields_update(Request $request)
    {
      try{
        $request->validate([
          'tour_gal_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
          'tour_id' => 'required' 
        ]);
        $tour_id = $request->tour_id;
        $img = $request->tour_gal_img;
        $alt = $request->tour_gal_img_alt;
        
        if ($request->hasFile('tour_gal_img')) {
            $imageName = "tour_".$tour_id."_".time().'.'.$request->tour_gal_img->extension();
            $path = public_path('images');
            $request->tour_gal_img->move($path, $imageName);
        }
        $dataAry = [
          'tour_id' => $tour_id, 
          'tour_image_url' => 'images/'.$imageName, 
          'tour_image_alt' => $alt,
        ];
        $id =TourGalleryModel::insertGetId($dataAry);
        if($id > 0){
          return response()->json(['status' => 1, 'url' => 'images/'.$imageName, 'alt'=>$alt, 'id'=>$id, 'tour_id'=>$tour_id]);
        } else {
          return response()->json(['status' => 0, 'msg' => 'Error']);
        }
      } catch (\Exception $e) {
        // Failure message
        return response()->json(['status' => 0, 'msg' => 'Error '.$e->getMessage()]);
      }
    }
      
/////////////////////////////////////////////////////////////////////////////////////////////////
    public function imagefields_delete(Request $request)
    {
      try{
        $request->validate(['id' => 'required']);
        $id = $request->id;
        $imagePath = public_path($request->tour_image_url);
        $imagePath = str_replace('/', '\\', $imagePath);
        if(TourGalleryModel::where('id', $id)->delete()){         
          if (File::exists($imagePath)) {
            unlink($imagePath);
          }
          return response()->json(['success' => true, 'message' => 'Image deleted successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Image not found.']);
        }
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
      }
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function edit($tour_id = null)
    {   
      $data['tour_id'] = $tour_id;
      $data['page_title'] = "Edit Tour";
      $data['menu_types'] = MenuTypesModel::getAll();
      $data['slider_types'] = SliderTypesModel::getAll();
      $data['logo'] = GeneralSettingsModel::getLogo();
      $data['selected_tour'] = $selected_tour = TourModel::getTourById($tour_id);
      $data['selected_tour_categorie'] = TourCategoryMapModel::getTourCategoriesById($tour_id);
      $data['tour_types'] = TourTypesModel::getAll();
      $data['selected_tour_types'] = explode(",", $selected_tour->tour_type);
      $data['mapped_hotels'] = TourHotelMapModel::getMappedHotelById($tour_id);
      $data['itineraries'] = TourItineraryModel::getTourMappedItinerary($tour_id);
      $data['tags'] = TagsModel::getAll();
      $data['selected_tour_tags'] = explode(",", $selected_tour->tour_tags);
      $data['hotels'] = HotelsModel::getAll();
      $data['tour_gallery'] = TourGalleryModel::getTourGalleryById($tour_id);

      $str = "";
      $first_level = TourCategoryModel::getAllParentTourCategory();
      if(!empty($first_level)){
        $str .= "<ul style='list-style-type: none;'>";
        foreach($first_level as $fl){
          $str .= '<li><input type="checkbox" name="selected_tour_categories[]" value="'.$fl->tour_category_id.'"> '.$fl->tour_category_title.'</li>';//die;
          $second_level = TourCategoryModel::getChildTourCategory($fl->tour_category_id);
          if(!empty($second_level)){
            $str .= "<ul style='list-style-type: none;'>";
            foreach($second_level as $sl){
              $str .= '<li><input type="checkbox" name="selected_tour_categories[]" value="'.$sl->tour_category_id.'"> '.$sl->tour_category_title.'</li>';//die;
              $third_level = TourCategoryModel::getChildTourCategory($sl->tour_category_id);
              if(!empty($third_level)){
                $str .= "<ul style='list-style-type: none;'>";
                foreach($third_level as $tl){
                  $str .= '<li><input type="checkbox" name="selected_tour_categories[]" value="'.$tl->tour_category_id.'"> '.$tl->tour_category_title.'</li>';//die;
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
      $data['categories'] = TourCategoryModel::getAll();

      $data['tours'] = TourModel::getAll();

      //echo "<pre>";print_r($data['tour_categories']);echo "</pre>";die;
      return view('admin/tour_edit', $data);
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    public function update(Request $request)
    {
      
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
        //echo $request->tour_category_id; die;
        if(TourModel::where('tour_category_id', $request->tour_category_id)->delete()){
          return response()->json(['msg' => 'page deleted successfully.', 'status' => 1]);
        } else {
          return response()->json(['msg' => 'Unable to delete page.', 'status' => 0]);
        }
      } catch (\Exception $e) {
        return response()->json(['msg' => $e->getMessage(), 'status' => 0]);
      }
    }

}
