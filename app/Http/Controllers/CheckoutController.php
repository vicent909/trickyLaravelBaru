<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\TransactionSuccess;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use Midtrans\Config;
use Midtrans\Snap;

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

        $carts = Cart::with(['product', 'size', 'color', 'user', 'galleries'])
            ->where('user_id', $id)
            ->where('checkout_at', null)
            ->get();

        $total = 0;

        foreach ($carts as $item) {
            $quantity = $item->quantity;
            $price = $item->product->price;

            $total_price = $quantity * $price;

            $total += $total_price;
        }


        $transaction = Transaction::with('user')->create([
            'users_id' => $id,
            'transaction_total' => $total + 20000,
            'transaction_status' => 'PENDING',
            'handle_status' => 'PENDING',
        ]);

        foreach ($carts as $item) {
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

        // Config::$serverKey = config('midtrans.serverKey');
        // Config::$isProduction = config('midtrans.isProduction');
        // Config::$isSanitized = config('midtrans.isSanitized');
        // Config::$is3ds = config('midtrans.is3ds');

        // //buat array untuk dikirim ke midtrans
        // $midtrans_params = [
        //     'transaction_details' => [
        //         'order_id' => 'MIDTRANS-' . $transaction->id,
        //         'gross_amount' => (int) $transaction->transaction_total,
        //     ],
        //     'customer_details' => [
        //         'first_name' => $transaction->user->name,
        //         'email' => $transaction->user->email,
        //     ],
        //     'enabled_payments' => ['gopay'],
        //     'vtweb' => [],
        // ];

        // try {
        //     //ambil halaman midtrans 
        //     $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;

        //     //redirect ke halaman midtrans
        //     header('Location: ' . $paymentUrl);
            
        // } catch (Exception $e) {
        //     echo $e->getMessage();
        // }

        // Mail::to($transaction->user)->send(
        //     new TransactionSuccess($carts)
        // );  

        return redirect()->route('checkout-success');
    }
}
