<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        $product = Product::all()->count();

        $transaction_pending = Transaction::where('handle_status', 'PENDING')->get()->count();

        $transaction_onProcess = Transaction::where('handle_status', 'ON PROCESS')->get()->count();

        $transaction_sent = Transaction::where('handle_status', 'SENT')->get()->count();

        $transaction_success = Transaction::where('handle_status', 'SUCCESS')->get()->count();

        return view('pages.admin.dashboard', [
            'product' => $product,
            'transaction_pending' => $transaction_pending,
            'transaction_onProcess' => $transaction_onProcess,
            'transaction_sent' => $transaction_sent,
            'transaction_success' => $transaction_success,

        ]);
    }
}
