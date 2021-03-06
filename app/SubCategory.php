<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];
	
    protected $fillable = [
    	'name','category_id',
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }

}
