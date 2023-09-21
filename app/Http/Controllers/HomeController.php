<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $items = Product::with(['galleries'])->get();
        return view('pages.home', [
            'items' => $items
        ]);
    }

    public function api(Request $request){
        $items = Product::all();

        // return response()->json(['data' => $items]);

        return ProductResource::collection($items);
    }

    public function apiDetailProduct($id){
        $item = Product::findOrFail($id);

        // return response()->json(['data' => $item]);

        return new ProductResource($item);
    }
}
