<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 

use App\Models\Admin\RolesModel;
use App\Models\Admin\MealsModel;
use App\Models\Admin\MenuTypesModel;
use App\Models\Admin\SliderTypesModel;
use App\Models\Admin\TourTypesModel;
use App\Models\Admin\TagsModel;
use App\Models\Admin\ActivityModel;
use App\Models\Admin\OffersModel;
use App\Models\Admin\GeneralSettingsModel;
use Illuminate\Http\Request;


class AppSettings extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
      $data['allRoles'] = RolesModel::getAll();
      $data['allmeals'] = MealsModel::getAll();
      $data['allMenuTypes'] = MenuTypesModel::getAll();
      $data['allSliderTypes'] = SliderTypesModel::getAll();
      $data['allTourTypes'] = TourTypesModel::getAll();
      $data['allTags'] = TagsModel::getAll();
      $data['allActivity'] = ActivityModel::getAll();
      $data['allOffers'] = OffersModel::getAll();

      $data['logo'] = GeneralSettingsModel::getLogo();
      $data['businessName'] = GeneralSettingsModel::getBusinessName();
      $data['businessLocation'] = GeneralSettingsModel::getBusinessLocation();
      $data['businessEmail'] = GeneralSettingsModel::getEmail();
      $data['businessContact'] = GeneralSettingsModel::getContact();
      $data['adminEmail'] = GeneralSettingsModel::getAdminEmail();
      $data['copyright'] = GeneralSettingsModel::getCopyrightText();
      $data['whatsApp'] = GeneralSettingsModel::getWhatsAppNumber();
      $data['currency_symbol'] = GeneralSettingsModel::getCurrencySymbol();
      
      return view('admin.settings',$data);
    } 




    
}
