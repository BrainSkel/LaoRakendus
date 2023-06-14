<?php


namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {

        return View("products.index" , [
            'products' => Product::all(),
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        // https://laravel.com/docs/10.x/validation#available-validation-rules
        $validated = $request->validate([
            'name' => 'required|string|max:128',
            'procurementPrice_cents' => 'numeric|gte:0',
            'description' => 'nullable|string',
        ]);
        $product = Product::create($validated);
        $product->save();

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        //
        // $this->authorize('update', $product);

        return view('products.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product) : RedirectResponse
    {
        //
        // $this->authorize('update', $product);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'procurementPrice_cents' => 'required|string|max:255',
            'description' => 'required|string|max:255',

        ]);

        $product->update($validated);

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        // $this->authorize('delete', $product);

        $product->delete();

        return redirect(route('products.index'));
    }
}
