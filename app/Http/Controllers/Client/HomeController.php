<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Botble\Assets\Assets;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        \Assets::addScriptsDirectly('assets/client/vendor/isotope/isotope.pkgd.min.js');
        $categories = Category::all();
        $products = Product::all();
        $data = [
            'categories' => $categories,
            'products' => $products
        ];
        return view('client.home.index', $data);
    }
    public function about()
    {
        return view('client.home.about');
    }
    public function contact()
    {
        return view('client.home.contact');
    }

}
