<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Botble\Assets\Assets;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        \Assets::addScriptsDirectly('assets/client/vendor/isotope/isotope.pkgd.min.js');
        return view('client.products.index');
    }
    public function detail($prd_slug)
    {
        $hotProduct = Product::where('hot', 1)->get();
        $product = Product::where('slug',$prd_slug)->firstOrFail();
        $imgThumb = ($product->images)->pluck('image_path');
        return view('client.products.detail',compact('product', 'imgThumb','hotProduct'));
    }

}
