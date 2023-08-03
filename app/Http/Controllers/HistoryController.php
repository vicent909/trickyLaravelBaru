<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index(Request $request){
        $items = Transaction::with(['details', 'product', 'user'])
                ->where('users_id', Auth::user()->id)
                ->latest()
                ->paginate(15);

        return view('pages.history', [
            'items' => $items
        ]);
    }

    public function done($id){

        Transaction::findOrFail($id)->update([
            'handle_status' => 'SUCCESS'
        ]);

        return redirect()->route('history');
    }
}
