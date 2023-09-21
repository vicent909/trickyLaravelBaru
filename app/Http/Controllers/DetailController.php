<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CartRequest;
use App\Models\Cart;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        $user = Auth::user() ? Auth::user()->id : '';

        $item = Product::with(['galleries'])
            ->where('slug', $slug)
            ->firstOrFail();

        $variants = Variant::where('products_id', $item->id)
                            ->when($request->color_id != null && $request->size_id != null, function($q) use ($request){
                                return $q->where('colors_id', $request->color_id); 
                            })
                            ->when($request->size_id != null, function($q) use ($request){
                                return $q->where('sizes_id', $request->size_id); 
                            })
                            ->get();

        $sizes = Size::all();

        $colors = Color::all();

        return view('pages.details', [
            'user' => $user,
            'item' => $item,
            'sizes' => $sizes,
            'colors' => $colors,
            'variants' => $variants
        ]);
    }

    public function store(CartRequest $request)
    {
        $data = $request->all();

        $ukuran = $request->color_id;

        $id = $data['user_id'];

        Cart::create($data);

        return redirect()->route('checkout');
    }

    public function api($slug){
        $user = Auth::user() ? Auth::user()->id : '';

        $item = Product::with(['galleries'])
            ->where('slug', $slug)
            ->firstOrFail();

        $sizes = Size::all();

        $colors = Color::all();

        return response()->json(['data' => ['user' => $user,'product' => $item, 'sizes' => $sizes, 'colors' => $colors]]);
    }
}
