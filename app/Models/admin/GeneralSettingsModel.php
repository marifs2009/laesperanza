<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettingsModel extends Model
{
    use HasFactory;
    protected $table = "general_settings";
    protected $primarykey = "id";
    protected $fillable = ["id", "name", "value", "status","created_at","updated_at"];

    public static function getLogo()
    {
        $r = GeneralSettingsModel::select('value')->where(['status' => 1, 'name' => 'business_logo'])->first();
        return $r->value;
    } 

    public static function getBusinessName()
    {
        $r = GeneralSettingsModel::select('value')->where(['status' => 1, 'name' => 'business_name'])->first();
        return $r->value;
    } 

    public static function getBusinessLocation()
    {
        $r = GeneralSettingsModel::select('value')->where(['status' => 1, 'name' => 'business_location'])->first();
        return $r->value;
    } 

    public static function getEmail()
    {
        $r = GeneralSettingsModel::select('value')->where(['status' => 1, 'name' => 'email'])->first();
        return $r->value;
    } 

    public static function getContact()
    {
        $r = GeneralSettingsModel::select('value')->where(['status' => 1, 'name' => 'contact'])->first();
        return $r->value;
    } 

    public static function getAdminEmail()
    {
        $r = GeneralSettingsModel::where(['status' => 1, 'name' => 'admin_email'])->first();
        return $r->value;
    } 
    public static function getCopyrightText()
    {
        $r = GeneralSettingsModel::where(['status' => 1, 'name' => 'copyright_text'])->first();
        return $r->value;
    } 
    public static function getWhatsAppNumber()
    {
        $r = GeneralSettingsModel::where(['status' => 1, 'name' => 'whatsapp_number'])->first();
        return $r->value;
    } 

    public static function getCurrencySymbol()
    {
        $r = GeneralSettingsModel::where(['status' => 1, 'name' => 'currency_symbol'])->first();
        return $r->value;
    } 




}






