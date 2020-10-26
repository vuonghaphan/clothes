<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        $data = Product::where('name', 'like', '%'. $request->search .'%')->paginate(4);
        return view('client.search.search', compact(['data']));
    }
}
