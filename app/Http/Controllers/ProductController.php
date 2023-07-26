<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList()
    {
        return view('product.product-list', [
            "subCategories"=> Subcategory::all()->sortBy("name"),
            "category"=> Category::all()->sortBy("name"),
            "products"=> Product::all()->sortBy("name")
        ]);
    }

    public function createProduct()
    {
        return view("product.create-product", [
            "subCategories"=> Subcategory::all()->sortBy("name"),
            "categories"=> Category::all()->sortBy("name"),
        ]);
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'subcategory_id' => ['required']
        ]);
        $SubCategory = Product::create($request->all());
        $SubCategory -> uploadImage($request->file('image'));
        return redirect()->route("indexProduct");
    }

    public function editProduct($productId)
    {
        $product = Product::find($productId);
        return view('product.edit-product',[
            'products' => $product,
            "subCategories"=> Subcategory::all()->sortBy("name"),
            "categories"=> Category::all()->sortBy("name")
        ]);
    }

    public function updateProduct(Request $request, $productId)
    {
        $product = Product::find($productId);
        $publish = 1;
        if(!$request->has(key:'is_published')){
        $publish = 0;
        }
        $product -> update([
            'title'=> $request->input('title'),
            'description'=> $request->input('description'),
            'price'=> $request->input('price'),
            'quantity'=> $request->input('quantity'),
            'is_published'=> $publish,
            'subcategory_id'=> $request->input('subcategory_id')
        ]);
        $product ->uploadImage($request->file('image'));
        return redirect()->route("indexProduct");
    }

    public function destroyProduct($productId)
    {
        Product::find($productId)->removeImg();
        return back();
    }

    public function removeImage($productId)
    {
        Product::find($productId)->removeImage();
        return back();

    }
}
