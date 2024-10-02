<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::where('user_id', Auth::id())->paginate(10);
        return view('products.products', compact('products'));
    }

    public function lookforproduct()
    {
        return view('products.search');
    }

    public function filter(Request $request)
    {
        $query = Product::with('user'); 

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('min_price') && $request->filled('max_price')) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        $products = $query->get();

        return view('products.list', compact('products'))->render();
    }

    public function create()
    {
        return view('dashboard');
    }

   
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.view', compact('product'));
    }


    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

  
}
