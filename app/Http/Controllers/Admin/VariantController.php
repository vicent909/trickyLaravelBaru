<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VariantRequest;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Cast\String_;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $pro = Product::with(['variants'])->findOrFail($id);
        $items = Variant::with(['product', 'size', 'color'])->where('products_id', $id)->get();

        return view('pages.admin.variant.index', [
            'items' => $items,
            'pro' => $pro,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(String $id)
    {
        $item = Product::with(['variants'])->findOrFail($id);
        $sizes = Size::all();
        $colors = Color::all();

        return view('pages.admin.variant.create', [
            'item' => $item,
            'sizes' => $sizes,
            'colors' => $colors,
        ]);

        // return $item;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VariantRequest $request)
    {
        $data = $request->all();
        $id = $data['products_id'];

        Variant::create($data);

        return redirect()->route('variant2', $id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Variant::with(['product', 'size', 'color'])->findOrFail($id);
        $products = Product::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view('pages.admin.variant.edit', [
            'item' => $item,
            'products' => $products,
            'sizes' => $sizes,
            'colors' => $colors,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VariantRequest $request, string $id)
    {
        $data = $request->all();
        $id_pro = $data['products_id'];

        $item = Variant::findOrFail($id);

        $item->update($data);

        return redirect()->route('variant2', $id_pro);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Variant::findOrFail($id);
        $id_pro = $item['products_id'];
        $item->delete();

        return redirect()->route('variant2', $id_pro);
    }
}
