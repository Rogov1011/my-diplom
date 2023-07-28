<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function mainPage()
    {
        return view("main",[
            "categories"=> Category::all()->sortBy("name"),
            "subCategories"=> Subcategory::all()->sortBy("name")
        ]);
    }

    public function getCategoriesBySubCategories(Category $category){
        $subCategory = $category->subcategories;
        return view("SubCategory.catalog-subcategory", [
            'subCategory' => $subCategory,
            'category' => $category
        ]);
    }
}
