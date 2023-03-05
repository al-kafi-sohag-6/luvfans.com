<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model {
    public $timestamps = false;

	public function users() {
		return $this->hasMany('App\Models\User')->where('status','active');
	}

	public function subcategories(){
		return $this->hasMany('App\Models\SubCategories', 'category_id')->where('mode','on');
	}
}
