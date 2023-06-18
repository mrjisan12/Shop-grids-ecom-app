<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product , $products;
    public function index()
    {
        return view('admin.product.index', [
            'categories' => Category::all(),
            'sub_categories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all(),

        ]);
    }

    public function create(Request $request)
    {
        $this->product = Product::newProduct($request);
        OtherImage::newOtherImage($this->product->id , $request->other_image);
        return back()->with('message', 'Product Info Save Successfully');

    }
    public function manage()
    {
        $this->products = Product::all();
        return view('admin.product.manage', ['products' => $this->products]);
    }
    public function detail($id)
    {
        $this->product = Product::find($id);
        return view('admin.product.detail', ['product' => $this->product]);
    }
}
