<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()) {
            $id = Auth::user()->id;
        } else {
            return redirect()->route('login');
        }

        $items = Cart::with(['product', 'galleries', 'size', 'color'])->where('user_id', $id)->get();

        $quantity = $items;

        $price = $items->sum('product.price');

        return view('pages.checkout', [
            'items' => $items,
            'price' => $price,
            'quantity' => $quantity,
        ]);
    }

    
    public function remove(String $id)
    {
        $item = Cart::findOrFail($id);
        $item->delete();
        
        return redirect()->route('checkout');
    }
    
    public function success(Request $request)
    {
        return view('pages.success');
    }
}
