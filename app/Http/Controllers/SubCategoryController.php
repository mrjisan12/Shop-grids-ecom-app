<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private $categories, $subcategory, $subcategoris;
    public function index()
    {
        $this->categories = Category::all();
        return view('admin.sub-category.index', ['categories' => $this->categories]);
    }
    public function create(Request $request )
    {
        SubCategory::newSubCategory($request);
        return back()->with('message', 'Sub Category info Create Successfully');
    }
    public function manage()
    {
        $this->subcategoris = SubCategory::all();
        return view('admin.sub-category.manage', ['sub_categories' => $this->subcategoris ]);
    }
    public function edit($id)
    {
        $this->subcategory = SubCategory::find($id);
        $this->categories  = Category::all();
        return view('admin.sub-category.edit', [
            'sub_category' => $this->subcategory,
            'categories' => $this->categories,
        ]);
    }
    public function update(Request $request , $id)
    {
        SubCategory::updateSubCategory($request, $id);
        return redirect('sub-category/manage')->with('message', 'Sub Category Update Successfully');
    }
    public function delete($id)
    {
        SubCategory::deleteSubCategory($id);
        return back()->with('message', 'Sub Category info Delete Successfully');
    }
}
