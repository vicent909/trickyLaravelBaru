<?php

namespace App\Http\Controllers;

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
}
