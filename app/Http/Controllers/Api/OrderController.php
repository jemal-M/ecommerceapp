<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the user's orders.
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        $orders = $user->orders()->with('items.product')->get();

        return response()->json(['message' => 'ok', 'orders' => $orders]);
    }

    /**
     * Display the specified order.
     */
    public function show($id)
    {
        /** @var User $user */
        $user = Auth::user();
        $order = $user->orders()->with('items.product')->findOrFail($id);

        return response()->json(['message' => 'ok', 'order' => $order]);
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy($id)
    {
        /** @var User $user */
        $user = Auth::user();
        $order = $user->orders()->findOrFail($id);
        $order->delete();

        return response()->json(['message' => 'ok']);
    }

    /**
     * Update the specified order in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'total_price' => 'required|numeric|min:0',
            'shipping_address' => 'required|string',
            'status' => 'required|string',
            'payment_method' => 'required|string',
            'phone' => 'required|string',
        ]);
        /** @var User $user */
        $user = Auth::user();
        $order = $user->orders()->findOrFail($id);
        $order->update($request->all());

        return response()->json(['message' => 'ok', 'order' => $order]);
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'shipping_address' => 'required|string',
            'payment_method' => 'required|string',
            'phone' => 'required|string',
        ]);

        /** @var User $user */
        $user = Auth::user();

        // Calculate total price
        $totalPrice = 0;
        foreach ($request->items as $item) {
            $product = Product::findOrFail($item['product_id']);
            $totalPrice += $product->price * $item['quantity'];
        }

        // Create the order
        $order = $user->orders()->create([
            'total_price' => $totalPrice,
            'shipping_address' => $request->shipping_address,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
            'phone' => $request->phone,
        ]);

        // Create order items
        foreach ($request->items as $item) {
            $product = Product::findOrFail($item['product_id']);
            $order->items()->create([
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $product->price,
                'subtotal' => $product->price * $item['quantity'],
            ]);
        }

        return response()->json(['message' => 'ok', 'order' => $order->load('items.product')], 201);
    }
}
