<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use Request;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $r)
    {

        Category::create([
            'name' => $r->name,
            'slug' => str::slug($r->name)
        ]);
        $categories = Category::all();
        // return response()->json(['categories'=> $categories ]);

        $tableComponents = view('admin.categories.components.table-components', compact('categories'))->render();
        return response()->json([
            'message' => 'Thêm danh mục thành công',
            'tableComponents' => $tableComponents,
            'code' => 200],
            200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);
        return response()->json($categories, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $r, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => $r->name,
            'slug' => str::slug($r->name)
        ]);
        $categories = Category::all();
        $tableComponents = view('admin.categories.components.table-components', compact('categories'))->render();
        return response()->json([
            'message' => 'Sửa danh mục thành công',
            'tableComponents' => $tableComponents,
            'code' => 200],
            200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if(($category->products)->count() > 0){
            return response()->json(['message'=>'Danh mục hiện còn sản phẩm', 'code' => 202], 202);
        } 
        $category->delete();
        $categories = Category::all();
        $tableComponents = view('admin.categories.components.table-components', compact('categories'))->render();
        return response()->json(['message'=>'Xóa danh mục thành công', 'tableComponents'=> $tableComponents, 'code'=> 200 ], 200);

    }
}
