<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Promocode;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function mainPage()
    {
        return view("main", [
            "categories" => Category::all()->sortBy("name"),
            "subCategories" => Subcategory::all()->sortBy("name"),
            "promocodes" => Promocode::all()->sortBy("name"),
            "images" => Image::all()->sortBy("name")
        ]);
    }

    public function getCategoriesBySubCategories(Category $category)
    {
        $subCategory = $category->subcategories;
        return view("SubCategory.catalog-subcategory", [
            'subCategory' => $subCategory,
            'category' => $category,
            "promocodes" => Promocode::all()->sortBy("name"),
            "images" => Image::all()->sortBy("name")
        ]);
    }

    public function getProductsBySubCategories(Subcategory $subcategory)
    {
        $product = $subcategory->products;
        return view("product.catalog-product", [
            'subcategory' => $subcategory,
            'products' => $product,
            "promocodes" => Promocode::all()->sortBy("name"),
            "images" => Image::all()->sortBy("name")
        ]);
    }

    public function showProduct(Product $product)
    {
        return view("product.product-show", [
            "products" => $product
        ]);
    }

    public function searchProduct(Subcategory $subcategory, Request $request)
    {
        $searchCatalog = $request->searchCatalog;
        return view("product.catalog-product", [
            'subcategory' => $subcategory,
            "products" => Product::where('title', 'LIKE', "%$searchCatalog%")->get()
        ]);
    }

    public function isBan()
    {
        return view("banPage");
    }

    public function contacts()
    {
        return view("contacts");
    }
}
