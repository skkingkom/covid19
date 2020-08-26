<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    /**
     * The attributes that are use for table name.
     *
     * @var string
     */
    protected $table = "user_address";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'address', 'pincode', 'cityname',
    ];
    /**
     * this function use for relationship
     *
     * @return array
     */
    public function users(){
        return $this->belongsTo('App\Models\UserCovidInfo','id', 'user_id');
    }
}
