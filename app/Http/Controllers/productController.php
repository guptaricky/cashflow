<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
    public function create()
    {
        $products = Product::orderBy('created_at','DESC')->get();
        return view('masters/product',[
            'products' => $products
        ]);
    }

    public function store(Request $request){

        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'uom' => 'required|min:2',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('product.create')->withInput()->withErrors($validator);
        }
        
        $product = new Product();
        $product->name = $request->name; 
        $product->description = $request->description; 
        $product->uom = $request->uom; 
        $product->isActive = 1;
        $product->save();
        return redirect()->route('product.create')->with('success', 'Entry created successfully');
    }

    public function updateActive($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $product->isActive = $request->input('isActive');
        $product->save();

        return response()->json(['message' => 'Active status updated successfully', 'success' => true]);
    }
}
