<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $perPage = 15;

    protected $fillable = [
        'name','slug', 'quantity', 'description', 'article', 'price', 'promotion', 'img_name','img_path' , 'status', 'id_category', 'hot'
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category','id_category', 'id');
    }
    public  function images(){
        return $this->hasMany('App\Models\Image_product','id_product','id');
    }
}
