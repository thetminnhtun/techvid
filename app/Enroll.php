<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    protected $fillable = ['user_id','sub_category_id','image_name','subject'];

    public function subCategory()
    {
    	return $this->belongsTo('App\SubCategory');
    }
}
