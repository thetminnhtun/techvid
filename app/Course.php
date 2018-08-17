<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name','sub_category_id','video_name'];

    public function subCategory()
    {
    	return $this->belongsTo('App\SubCategory');
    }
}
