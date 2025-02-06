<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Pages;
use App\Models\Admin\TourTypesModel;
use App\Models\Admin\TagsModel;

use App\Models\Admin\MenusModel;
use App\Models\Admin\MenuTypesModel;
use App\Models\Admin\SliderTypesModel;
use App\Models\Admin\GeneralSettingsModel;

class Page extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // getting home page only
    {
        $data = $services = [];
        $data['slug'] = 'home';
        
        $data['primary_menu'] = MenusModel::getMenuByTypeId(1); //Primary Manu type id is 1
        $data['quick_link_menu'] = MenusModel::getMenuByTypeId(2); //Quick links menu type id is 2
        //echo "<pre>"; print_r($result);echo "</pre>"; die;
        $data['template'] = "template_home";
                
        
        $data['allSliderTypes'] = SliderTypesModel::getAll();
        //$data['allTourTypes'] = TourTypesModel::getAll();
        //$data['allTags'] = TagsModel::getAll();
        $data['logo'] = GeneralSettingsModel::getLogo();
        $data['businessName'] = GeneralSettingsModel::getBusinessName();
        $data['businessLocation'] = GeneralSettingsModel::getBusinessLocation();
        $data['businessAddress'] = GeneralSettingsModel::getBusinessAddress();
        $data['businessEmail'] = GeneralSettingsModel::getEmail();
        $data['businessContact'] = GeneralSettingsModel::getContact();
        $data['adminEmail'] = GeneralSettingsModel::getAdminEmail();
        $data['copyright'] = GeneralSettingsModel::getCopyrightText();
        $data['whatsApp'] = GeneralSettingsModel::getWhatsAppNumber();
        $data['currency_symbol'] = GeneralSettingsModel::getCurrencySymbol();
        $data['primary_menu'] = $this->create_primary_menu();

        //echo "<pre>";print_r($data['primary_menu']);echo "</pre>";die;
        //getting service pages
        $services = Pages::getPagesByCategoryId(2); // Fetch all slugs from PagesModel
        //echo "<pre>";print_r($pageSlugs);echo "</pre>";
        $data['services'] = $services; 

        return view('home', $data);
    }


    

    public function show(Request $request) // getting all other pages then hompage
    {
        $data = $services = [];

        $path = $request->path();
        $segments = explode('/', $path);
        
        $slug = end($segments);

        if(!empty($slug)) { $data['slug'] = $slug; } 
        else { $data['slug'] = 'home'; } 
        //  echo $data['slug'];die;
        $data['page_id'] = $page_id = Pages::getPageId($slug);
        $result = Pages::getPage($slug);
        $data['primary_menu'] = $this->create_primary_menu();
        $data['quick_link_menu'] = MenusModel::getMenuByTypeId(2); //Quick links menu type id is 2

        //echo "<pre>"; print_r($result);echo "</pre>"; die;
        $data['template'] = "template_".$result->page_template;
        $data['page'] = Pages::getPage($slug);
        
        $data['allMenuTypes'] = MenuTypesModel::getAll();
        $data['allSliderTypes'] = SliderTypesModel::getAll();
        $data['allTourTypes'] = TourTypesModel::getAll();
        $data['allTags'] = TagsModel::getAll();
        $data['logo'] = GeneralSettingsModel::getLogo();
        $data['businessName'] = GeneralSettingsModel::getBusinessName();
        $data['businessLocation'] = GeneralSettingsModel::getBusinessLocation();
        $data['businessAddress'] = GeneralSettingsModel::getBusinessAddress();
        $data['businessEmail'] = GeneralSettingsModel::getEmail();
        $data['businessContact'] = GeneralSettingsModel::getContact();
        $data['adminEmail'] = GeneralSettingsModel::getAdminEmail();
        $data['copyright'] = GeneralSettingsModel::getCopyrightText();
        $data['whatsApp'] = GeneralSettingsModel::getWhatsAppNumber();
        $data['currency_symbol'] = GeneralSettingsModel::getCurrencySymbol();

        //getting service pages
        $services = Pages::getPagesByCategoryId(2); // Fetch all slugs from PagesModel
        //echo "<pre>";print_r($pageSlugs);echo "</pre>";
        $data['services'] = $services; 

        return view('page', $data);
    }   


    public function create_primary_menu() // getting home page only
    {
        $str = '<ul class="navbar-nav">';
        $pageSlugs = Pages::getAllSlugs(); // Fetch all slugs from PagesModel
        $page_ary = [];
        
        // Creating page slug
        foreach ($pageSlugs as $page) { 
            if(!empty($page->category_name) && $page->page_category != 1){
                $url = strtolower($page->category_name)."/".$page->page_slug; 
            } else {
                $url = $page->page_slug; 
            }
            //echo "<br>".$url;//die;
            $page_ary[$page->page_id] = $url; //here we have all pages
        }

        $child_primary_menu = [];
        $parents_primary_menu = $parents_primary_menu = MenusModel::getAllParentMenus(1);
        foreach($parents_primary_menu as $p_menu){
            $r = MenusModel::getAllChildMenus(1, $p_menu->menu_id);
            if(!empty($r)){
                $child_primary_menu[$p_menu->menu_id] = $r;
            } else {
                $child_primary_menu[$p_menu->menu_id] = "";
            }
        }
        //echo "<pre>";print_r($child_primary_menu);echo "</pre>";die;
        foreach ($parents_primary_menu as $p_menu) {
            $has_children = count($child_primary_menu[$p_menu->menu_id]) > 0 ? 1 : 0;
            if(array_key_exists($p_menu->menu_link, $page_ary)){
                $pslug = $page_ary[$p_menu->menu_link];
            } else { $pslug = "#"; }
            
            $str .= '<li class="nav-item">';
            $str .= '<a href="'.url($pslug).'" class="nav-link">
                        '.$p_menu->menu_label;
            if($has_children == 1) { $str .= '<i class="fas fa-angle-down"></i>';}
            $str .= '</a>';
            
            if($has_children == 1){
                $str .= '<ul class="dropdown-menu">';
                foreach ($child_primary_menu[$p_menu->menu_id] as $c_menu){
                    //echo "<pre>";print_r($c_menu->menu_link);echo "</pre>"; die;
                    $str .= '<li class="nav-item">';
                    if(array_key_exists($c_menu->menu_link, $page_ary)) {
                        $cslug = $page_ary[$c_menu->menu_link];
                        $target = "";
                    } else {
                        $cslug = $c_menu->menu_link;
                        $target = "target='_new'";
                    }
                    $str .= '<a href="'.url($cslug).'" '.$target.' class="nav-link">'.$c_menu->menu_label.'</a>
                        </li>';
                }
                $str .= '</ul>';
            }
        }
       return $str .= '</ul>';
    }



}
