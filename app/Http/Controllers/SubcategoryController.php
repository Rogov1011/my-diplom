<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function SubCategoryList(){
        return view("SubCategory.SubCategory-list", [
            "subCategories"=> Subcategory::all()->sortByDesc("category_id"),
            "category"=> Category::all()
        ]);
    }

    public function searchSubcategory(Request $request){
        $search = $request->search;
        return view('SubCategory.SubCategory-list', [
            "category"=> Category::all()->sortBy("name"),
            "products"=> Product::all()->sortBy("name"),
            "subCategories"=> Subcategory::where('name', 'LIKE', "%$search%")->get(),
        ]);
    }

    public function createSubCategory()
    {
        return view("SubCategory.create-Subcategory", [
            "categories"=> Category::all()->sortBy("name")
        ]);
    }

    public function storeSubCategory(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'category_id' => ['required']
        ]);
        $SubCategory = Subcategory::create($request->all());
        $SubCategory -> uploadImage($request->file('image'));
        return redirect()->route("indexSubCategory");
    }
    
    public function editSubcategory($subcategoryId)
    {
        $SubCategory = Subcategory::find($subcategoryId);
        return view('SubCategory.edit-SubCategory',[
            'subCategory' => $SubCategory,
            "categories"=> Category::all()->sortBy("name")
        ]);
    }

    public function updateSubcategory(Request $request, $subcategoryId)
    {
        $SubCategory = Subcategory::find($subcategoryId);
        $SubCategory -> update([
            'name'=> $request->input('name'),
            'category_id'=> $request->input('category_id')
        ]);
        $SubCategory ->uploadImage($request->file('image'));
        return redirect()->route("indexSubCategory");
    }

    public function destroySubcategory($subcategoryId)
    {
        Subcategory::find($subcategoryId)->removeImg();
        return back();
    }

    public function removeImage($subcategoryId)
    {
        Subcategory::find($subcategoryId)->removeImage();
        return back();

    }
}
