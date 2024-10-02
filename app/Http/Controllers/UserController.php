<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|gt:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $path = '';
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/products');
        }

        $product = new Product();
        $product->user_id = Auth::id();
        $product->title = $validated['title'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        $product->imagepath = str_replace('public/', '', $path);
        $product->save();


        return redirect()->route('dashboard')->with('success', 'Product added successfully.');
    }
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|gt:0',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/products');
            $product->image = str_replace('public/', '', $path);
        }


        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

   
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
