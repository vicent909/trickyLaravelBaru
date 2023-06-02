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
        $user = Auth::user()->id;

        $item = Product::with(['galleries'])
            ->where('slug', $slug)
            ->firstOrFail();

        $variants = Variant::with(['product', 'size', 'color'])
            ->where('products_id', $item->id)
            ->get();

        $sizes = Size::all();

        $colors = Color::all();

        return view('pages.details', [
            'user' => $user,
            'item' => $item,
            'variants' => $variants,
            'sizes' => $sizes,
            'colors' => $colors
        ]);
    }

    public function store(CartRequest $request)
    {
        $data = $request->all();

        $id = $data['user_id'];

        Cart::create($data);

        return redirect()->route('checkout');
    }
}
