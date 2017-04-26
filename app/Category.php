<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        public $table = 'category';
        protected $fillable = ['name', 'image', 'created_at', 'updated_at'];

        public function food()
    {
        return $this->hasMany('App\Food');
    }

}
