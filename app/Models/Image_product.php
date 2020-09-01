<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image_product extends Model
{
    protected $table = 'images_product';

    protected $fillable = ['image_path','id_product'];
    public function product(){
        return $this->belongsTo('App\Models\Product','id_product','id');
    }
}
