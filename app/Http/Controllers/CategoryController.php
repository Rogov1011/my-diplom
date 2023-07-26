<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryList(){
        return view("category.category-list", [
            "categories"=> Category::all()->sortBy("name")
        ]);
    }
    
    public function createCategory()
    {
        return view("category.create-category");
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);
        $category = Category::create($request->all());
        $category -> uploadImage($request->file('image'));
        return redirect()->route("indexCategory");
    }
    
    public function editCategory($categoryId)
    {
        $category = Category::find($categoryId);
        return view('category.edit-category',[
            'category' => $category
        ]);
    }

    public function updateCategory(Request $request, $categoryId)
    {
        $category = Category::find($categoryId);
        $category -> update([
            'name'=> $request->input('name')
        ]);
        $category ->uploadImage($request->file('image'));
        return redirect()->route("indexCategory");
    }

    public function destroyCategory($categoryId)
    {
        Category::find($categoryId)->removeImg();
        return back();
    }

    public function removeImage($categoryId)
    {
        Category::find($categoryId)->removeImage();
        return back();

    }
}
