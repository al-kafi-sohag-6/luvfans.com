<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
    use HasFactory;
    
	protected $table = 'user_categories';
	public $timestamps = false;

	public function sub_category() {
		return $this->belongsTo(SubCategories::class,'sub_category_id');
	}
	public function category() {
        return $this->belongsTo(Categories::class,'category_id');
	}
	public function user() {
        return $this->belongsTo(User::class,'user_id');
	}

	public function scopeByCategory($query, $id)
	{
		return $query->where('category_id', $id);
	}
	public function scopeBySubCategory($query, $id)
	{
		return $query->where('sub_category_id', $id);
	}


}
