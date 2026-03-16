<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }
        
        return response()->json($user->carts()->with('product')->get());
    }

    public function store(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }
        
        $user->carts()->create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity ?? 1,
        ]);
        
        return response()->json(['message' => 'success']);
    }
}
