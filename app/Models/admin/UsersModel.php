<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $primaryKey = "id";
   // Exclude 'password' from $fillable so it's not required in insert/update
    protected $fillable = ['name', 'email', 'pic', 'dob', 'role', 'status'];
    // If needed, you can allow mass assignment but not require it during insertion
    protected $hidden = ['password'];

    public static function getAll()
    {
        return self::where('status', 1)->get();
    }

    public static function getDataByRole($role_id)
    {
        return self::where('status', 1)->where('role',$role_id)->get();
    }

    public static function getDataByID($id)
    {
        return self::select('id', 'name', 'email', 'pic', 'status','role','dob') // Explicitly include password
                   ->where('status', 1)
                   ->where('id', $id)
                   ->first();
    }
    

    public static function createUser($data)
    {
        return self::create($data);
    }

    public static function updateUser($where, $data)
    {
        return self::where($where)->update($data);
    }

    public static function deleteUser($id)
    {
        return self::where('id', $id)->delete();
    }
}

class UserAddress extends Model
{
    use HasFactory;
    protected $table = "user_address";
    protected $primaryKey = "adrs_id";
    protected $fillable = ['user_id', 'adrs_type', 'hno', 'line1', 'line2', 'landmark', 'country', 'state', 'city', 'pin', 'status'];

    public static function createAddress($data)
    {
        return self::create($data);
    }

    public static function getDataByID($id)
    {
        return self::where('status', 1)
                   ->where('user_id', $id)
                   ->first();
    }

    public static function updateAddress($where, $data)
    {
        return self::where($where)->update($data);
    }

    public static function deleteAddress($id)
    {
        return self::where('adrs_id', $id)->delete();
    }
}

class UserOtherDetails extends Model
{
    use HasFactory;
    protected $table = "user_other_details";
    protected $primaryKey = "uod_id";
    protected $fillable = ['user_id', 'address_proof', 'id_proof', 'passport_number', 'passport_exp_on', 'status'];

    public static function getDataByID($id)
    {
        return self::where('status', 1)
                   ->where('user_id', $id)
                   ->first();
    }
    public static function createOtherDetails($data)
    {
        return self::create($data);
    }

    public static function updateOtherDetails($where, $data)
    {
        return self::where($where)->update($data);
    }

    public static function deleteOtherDetails($id)
    {
        return self::where('uod_id', $id)->delete();
    }
}
