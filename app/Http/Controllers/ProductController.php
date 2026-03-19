<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric'
        ]);

        Product::create($data);

        return redirect()->route('products.index')->with('success','Producto creado con éxito.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric'
        ]);

        $product->update($data);

        return redirect()->route('products.index')->with('success','Producto actualizado correctamente.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Producto eliminado correctamente.');
    }
}
