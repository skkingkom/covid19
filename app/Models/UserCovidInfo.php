<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCovidInfo extends Model
{
    /**
     * The attributes that are use for table name.
     *
     * @var string
     */
    protected $table = "user_covid_info";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'firstname', 'lastname', 'email', 'mobile', 'symption_type', 'covid_test', 'positive',
    ];
    /**
     * this function use for relationship
     *
     * @return array
     */
    public function userAddress(){
        return $this->hasOne('\App\Models\UserAddress','user_id')->select('user_id','address', 'pincode', 'cityname');
    }
    /**
     * this function use for stats
     *
     * @return json
     */
    public static function userStats(){
        $data['total_user'] = UserCovidInfo::count();
        $data['symetric_user'] = UserCovidInfo::where('symption_type', '=', 1)->count();
        $data['covid_test'] = UserCovidInfo::where('symption_type', '=', 1)->count();
        $data['covid_positive'] = UserCovidInfo::where('positive', '=', 1)->count();
        return response()->json($data);
    }
    /**
     * this function use for sent user detail
     *
     * @return json
     */
    public static function userinfo($userId){
        $data = UserCovidInfo::where('id', '=', $userId)->with(['userAddress'])->get();
        return response()->json($data);
    }
    /**
     * this function use for sent all user detail
     *
     * @return json
     */
    public static function allUser(){
        $data = UserCovidInfo::with(['userAddress'])->get();
        return response()->json($data);
    }

}
