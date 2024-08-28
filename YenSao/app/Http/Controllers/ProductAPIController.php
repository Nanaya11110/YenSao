<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return product::all();
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->category = $request->category;
        
        if ($product->save()) 
        {
            return (['StatusCode' => 200,
                     'Product' => $product]);
        };
        return ([
            'StatusCode' => 500,
            'Message' => 'Error while saving the product.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = product::find($id);
        return $product;
    }


    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->category = $request->category;
        
        if ($product->save()) 
        {
            return (['StatusCode' => 200,
                     'Product' => $product]);
        };
        return ([
            'StatusCode' => 500,
            'Message' => 'Error while updating the product.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = product::findOrFail($id);
        if ($product->delete()) 
        {
            return (['StatusCode' => 200,
                     'Message' => 'Product deleted successfully.']);
        };
        return ([
            'StatusCode' => 500,
            'Message' => 'Error while deleting the product.'
        ]);
    }
}
