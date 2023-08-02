<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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

    public function getProductsBySubCategories(Subcategory $subcategory){
        $product = $subcategory->products;
        return view("product.catalog-product", [
            'subcategory' => $subcategory,
            'products' => $product
        ]);
    }

    public function showProduct(Product $product)
    {
        return view("product.product-show", [
            "products" => $product
        ]);
    }
}
