<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()) {
            $id = Auth::user()->id;
        } else {
            return redirect()->route('login');
        }

        $items = Cart::with(['product', 'galleries', 'size', 'color'])
                            ->where('user_id', $id)
                            ->where('checkout_at', null)
                            ->get();

        $price = $items->sum('product.price');

        return view('pages.checkout', [
            'items' => $items,
            'price' => $price,
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

    public function process()
    {
        if (Auth::user()) {
            $id = Auth::user()->id;
        } else {
            return redirect()->route('login');
        }

        $carts = Cart::with(['product', 'size', 'color', 'user'])
                        ->where('user_id', $id )
                        ->where('checkout_at', null)
                        ->get();

        $total = 0;

        foreach($carts as $item){
            $quantity = $item->quantity;
            $price = $item->product->price;

            $total_price = $quantity*$price;
            
            $total += $total_price;
        }


        $transaction = Transaction::create([
            'users_id' => $id,
            'transaction_total' => $total + 20000,
            'transaction_status' => 'PENDING',
        ]);

        foreach($carts as $item){
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_title' => $item->product->title,
                'size' => $item->size_id,
                'color' => $item->color_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
                'price_end' => $item->quantity * $item->product->price
            ]);

            Cart::findOrFail($item->id)->update([
                'checkout_at' => Carbon::now()
            ]);
        }

        return redirect()->route('checkout-success');
    }
}
