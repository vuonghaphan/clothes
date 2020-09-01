<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Image_product;
use App\Models\Product;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
//use File;
use Illuminate\Support\Facades\Storage;
//use Storage;


class ProductController extends Controller
{
    use StorageImageTrait;

    public function index()
    {
        // $product = Product::with('Category')->get();
        $product = Product::get();
        return view('admin.products.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Category::count() > 0) {
            $categories = Category::get();
            return view('admin.products.create', compact('categories'));
        } else {
           return redirect()->route('category.index')->with('warning','Bạn phải tạo danh mục trước');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $dataUploadImg = $this->StorageTraitUpload($request, 'img', 'product');
        if (!empty($dataUploadImg)) {
            $data = $request->all();
            $data['slug'] = Str::slug($request->name);
            $data['img_name'] = $dataUploadImg['file_name'];
            $data['img_path'] = $dataUploadImg['file_path'];
            $product = Product::create($data);
            $upload = $this->multipleUploadProduct($request, 'image','product',$product);
            return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công');
        } else {
            return back()->with('error', 'Thêm sản phẩm thất bại');
        }
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
        $product = Product::find($id);
        $categories = Category::get();
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->hot == null) {
            $data['hot'] = 0;
        }

        $dataUploadImg = $this->StorageTraitUpload($request, 'img', 'product');
        if (!empty($dataUploadImg)) {
            $data['img_name'] = $dataUploadImg['file_name'];
            $data['img_path'] = $dataUploadImg['file_path'];
            $url_file = substr($product->img_path, 1); // xoa dau / trong url
            if (File::exists($url_file)) {
                unlink($url_file);
            }
        } else {
                $data['img_name'] = $product->img_name;
                $data['img_path'] = $product->img_path;
            }
        $product->update($data);
        return redirect()->route('product.index')->with('success','Sửa sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $url_file = substr($product->img_path,1);
        if (File::exists($url_file)){
            unlink($url_file);
        }
        $product->delete();
        $image_product = Image_product::where('id_product',$id);
        $image_product->delete();
        return response()->json([
            'message' => 'Xóa sản phẩm thành công',
        ], 200);
    }
    public  function imageProduct($id){
        $product = Product::find($id);
        $countImage = Image_product::where('id_product',$id)->count();
        return view('admin.products.image-product', compact('product', 'countImage'));
    }
    public function createImageProduct(){
        $product = Product::get();
        return view('admin.products.components.add-image-product', compact('product'));
    }
    public function uploadImageProduct(Request $request)
    {
        $product = $request->id_product;

        if ($request->hasFile('image')) {
            foreach ($request->image as $file) {
                $fileNameHash = str::random(10) . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('public/product/' . auth()->id(), $fileNameHash);
                Image_product::create([
                    'image_path' => \Illuminate\Support\Facades\Storage::url($filePath),
                    'id_product' => $product
                ]);
            }
            return redirect()->route('product.image', $product)->with('success','Thêm ảnh sản phẩm thành công');
        }
    }
}
