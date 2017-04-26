<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model {

    public $table = 'food';
    protected $fillable = ['category_id','user_id','content','device_token','name', 'image', 'created_at', 'updated_at'];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

}
