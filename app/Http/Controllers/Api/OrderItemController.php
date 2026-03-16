<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        $orderItems = OrderItem::all();
        return response()->json(['data' => $orderItems]);
    }

    public function show(OrderItem $orderItem)
    {
        return response()->json(['data' => $orderItem]);
    }

    public function store(Request $request)
    {
            $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);
        $orderItem = OrderItem::create($request->all());
        return response()->json(['data' => $orderItem], 201);
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);
        $orderItem->update($request->all());
        return response()->json(['data' => $orderItem]);
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();
        return response()->json(null, 204);
    }
      

}
