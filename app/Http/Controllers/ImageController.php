<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("images.images-list", [
            "images"=> Image::all()->sortBy("name")
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("images.create-images");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);
        $images = Image::create($request->all());
        $images -> uploadImage($request->file('images'));
        return redirect()->route("images.index");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($imagesId)
    {
        $images = Image::find($imagesId);
        return view('images.edit-images',[
            'images' => $images
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $imagesId)
    {
        $images = Image::find($imagesId);
        $images -> update([
            'name'=> $request->input('name')
        ]);
        $images ->uploadImage($request->file('image'));
        return redirect()->route("images.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($imagesId)
    {
        Image::find($imagesId)->removeImg();
        return back();
    }
}
