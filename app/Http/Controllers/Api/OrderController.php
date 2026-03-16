<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
     public function index()
    {
        $order = auth()->user()->orders()->create([
            'product_id' => request('product_id'),
            'qty' => request('qty')
        ]);
        return response()->json(['message' => 'ok','order'=>$order]);
    }

    public function show($id)
    {
        $order = auth()->user()->orders()->findOrFail($id);
        return response()->json(['message' => 'ok', 'order'=>$order]);
    }

    public function destroy($id)
    {
        $order = auth()->user()->orders()->findOrFail($id);
        $order->delete();
        return response()->json(['message' => 'ok']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required',
            'qty' => 'required'
        ]);
        $order = auth()->user()->orders()->findOrFail($id);
        $order->update($request->all());
        return response()->json(['message' => 'ok', 'order'=>$order]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'qty' => 'required'
        ]);
        $order = auth()->user()->orders()->create($request->all());
        return response()->json(['message' => 'ok', 'order'=>$order]);
    }
     
}
