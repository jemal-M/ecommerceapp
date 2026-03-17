<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json(['data' =>$products ]);
    }

    public function show($id)
    {
        $product = Product::find($id);
        return response()->json(['data'=>$product]);
    }

    public function store(Request $request)
    {
          $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'price'=>'required|numeric',
            'description'=>'required',
            'slug'=>'required|unique:products',
            'stock'=>'required',
            'sku'=>'required',
            'status'=>'required',
            'image'=>'required'

        ]);
        
        $imageName = null;
        if($request->hasFile('image')){
              $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);
        }
        
        $productData = $request->all();
        $productData['image'] = $imageName;
        
        $product = Product::create($productData);
        return response()->json(['data'=>$product]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'price'=>'required|numeric',
            'description'=>'required',
            'slug'=>'required|unique:products,slug,' . $id,
            'stock'=>'required',
            'sku'=>'required',
            'status'=>'required',
            'image'=>'sometimes'

        ]);

         /** @var \App\Models\Product $product */
         $product = Product::find($id);
         
         if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
         }
         
         $productData = $request->all();
         
         if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);
            $productData['image'] = $imageName;
         }
         
         $product->update($productData);
         return response()->json(['data'=>$product]);

    }

    public function destroy($id)
    {
        /** @var \App\Models\Product $product */
        $product = Product::find($id);
        
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        
        $product->delete();
        return response()->json(['data'=>'Product deleted successfully']);
    }
     
}
