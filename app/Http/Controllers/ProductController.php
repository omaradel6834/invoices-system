<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\sections;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Symfony\Contracts\Service\Attribute\Required;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   
        $sections = sections::all();
        $products = products::all();
        return view('products.products', compact('sections', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       


        $validate = $request->validate([
            'Product_name' => 'required|unique:products|max:255',
            'section_id' => 'required',
            'description' => 'required',
           ]);
        $products = new products();
        $products->Product_name = $request->Product_name;
        $products->section_id = $request->section_id;
        $products->description = $request->description;
        $products->save();
        return response('تم اضافه بنجاح');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    { 



        $id = sections::where('section_name', $request->section_name)->first()->id;
        $products = products::findOrFail($request->id);
 
        $products->update([
        'product_name' => $request->product_name,
        'description' => $request->description,
        'section_id' => $id,
        ]);
        session()->flash('Edit', 'تم تعديل المنتج بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $products = products::findOrFail($request->id);
        $products->delete();
        session()->flash('delete', 'تم حذف المنتج بنجاح');
        return back();;
    }
}
