<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    public function category(){
        return $this->belongsTo('App\category');
    }
    protected $fillable=[
        'title','content','category_id','featured','slug'
    ];
    protected $dates=['deleted_at'];
    public function getFeaturedAttribute($featured){
        return asset($featured);
    }
    public function tags(){
        return $this->belongsToMany('App\tag');
    }
}
