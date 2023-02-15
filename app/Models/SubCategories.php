<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    use HasFactory;
    
	protected $guarded = array();
	public $timestamps = false;

	public function users() {
		return $this->hasMany('App\Models\User')->where('status','active');
	}

	public function category() {
        return $this->belongsTo(Categories::class,'category_id');
	}


}
