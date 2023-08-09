<?php

namespace App\Http\Controllers;

use App\Models\Promocode;
use Illuminate\Http\Request;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("promocod.promocode-list", [
            'promocodes' => Promocode::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("promocod.create-promocode", [
            "promocodes"=> Promocode::all()->sortBy("name"),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required'],
            'count' => ['required'],
            'discount' => ['required']
        ]);
        Promocode::create($request->all());
        return redirect()->route("promocodes.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($promocodeId)
    {
        $promocode = Promocode::find($promocodeId);
        return view('promocod.edit-promocode',[
            'promocodes' => $promocode,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $promocodeId)
    {
        $promocode = Promocode::find($promocodeId);

        $promocode -> update([
            'code'=> $request->input('code'),
            'count'=> $request->input('count'),
            'discount'=> $request->input('discount'),
        ]);
        return redirect()->route("promocodes.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($promocodeId)
    {
        Promocode::find($promocodeId)->delete();
        return back();
    }
}
