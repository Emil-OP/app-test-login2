<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Trae todas las órdenes con cliente y producto
        $orders = Order::withh(['client','product'])->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $clients = Clients::all();
        $products = Product::all();
        return view('orders.create', compact('clients','products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        Order::create($data);

        return redirect()->route('orders.index')->with('success','Pedido agregado con éxito.');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $clients = Client::all();
        $products = Product::all();
        return view('orders.edit', compact('order','clients','products'));
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $order->update($data);

        return redirect()->route('orders.index')->with('success','Pedido actualizado correctamente.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success','Pedido eliminado correctamente.');
    }
}
