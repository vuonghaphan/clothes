<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name','slug', 'quantity', 'description', 'article', 'price', 'promotion', 'img_name','img_path' , 'status', 'id_category', 'hot'
    ];

    public function Category(){
        return $this->belongsTo(Category::class,'id_category', 'id');
    }
}
