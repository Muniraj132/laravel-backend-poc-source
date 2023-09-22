<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $product = Product::orderBy('created_at', 'DESC')->get();

        return view('products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $files = $request->file('images');
        dd($request->all());
        if (!empty($files)) {
            foreach ($files as $file) {
                $originalName = $file->getClientOriginalName(); 
                $extension = $file->getClientOriginalExtension(); 
                $destinationPath = 'new_images'; 
             
                $data= ([
                    'title' => $request->input('title'),
                    'price' => $request->input('price'),
                    'product_code' => $request->input('product_code'),
                    'description' => $request->input('description'),
                    'images' => $originalName,
                ]);
           }
           Product::create($data);
           $file->move($destinationPath, $originalName);
        } else {
            Product::create([
                'title' => $request->input('title'),
                'price' => $request->input('price'),
                'product_code' => $request->input('product_code'),
                'description' => $request->input('description'),
                'images' => $newFileName,
            ]);
        }
        
        return redirect()->route('products')->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'title' => 'required',
        'price' => 'required',
        'product_code' => 'required',
        'description' => 'required',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each image
    ]);

    $images = json_decode($product->images, true);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $newImage) {
            $path = $newImage->store('public/images'); // Store new image in storage
            $images[] = str_replace('public/', '', $path); // Store the relative path in the array
        }
    }

    $product->update([
        'title' => $request->input('title'),
        'price' => $request->input('price'),
        'product_code' => $request->input('product_code'),
        'description' => $request->input('description'),
        'images' => json_encode($images), // Update image paths as a JSON string
    ]);

    return redirect()->route('products')->with('success', 'Product updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products')->with('success', 'product deleted successfully');
    }

}