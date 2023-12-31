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
            "products" => $product,
            "images" => Image::all()->sortBy("name")
        ]);
    }

    public function searchProduct(Subcategory $subcategory, Request $request)
    {
        $searchCatalog = $request->searchCatalog;
        return view("product.catalog-product", [
            "promocodes" => Promocode::all()->sortBy("name"),
            "images" => Image::all()->sortBy("name"),
            'subcategory' => $subcategory,
            "products" => Product::where('title', 'LIKE', "%$searchCatalog%")->get()
        ]);
    }

    public function subcategoryPupop(Category $category){
        $subcategory = [];
        foreach($category->subcategories as $subcat){
            $subcategory[] = $subcat->name;
        }
        return response()->json($subcategory);
    }

    public function isBan()
    {
        return view("banPage");
    }

    public function contacts()
    {
        return view("contacts");
    }

    public function user_agreement()
    {
        return view("user_agreement");
    }

    public function sertificat()
    {
        return view("sertificats");
    }

    public function payment()
    {
        return view("payment");
    }

    public function warranty()
    {
        return view("warranty");
    }
}
