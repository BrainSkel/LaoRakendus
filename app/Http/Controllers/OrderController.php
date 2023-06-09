<?php

namespace App\Http\Controllers;


use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

use App\Models\MyInvoice;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return View("orders.index" , [
            'orders' => Order::all(),
            'products' => Product::all(),
        ]);
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
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            // 'productId' => 'required|string|max:128',
            'product_id' => 'required|gt:0',
            'amount' => 'integer|gte:0',
            // 'invoice' => 'nullable|string',
            // 'name' => 'nullable|string',
            'date' => 'nullable|date',
            // 'ordererName' => 'nullable|string',

        ]);
        $order = new Order;
        // $order->productId = $validated['productId'];
        // $order->product_id = $validated['product_id'];
        $order->product()->associate(Product::find($validated['product_id']));
        $order->client()->associate($request->user());
        // $order->product()->associate($request->product());
        $order->amount = $validated['amount'];
        // $order->ordererName = $validated['ordererName']
        // $order->invoice = $validated['invoice'];
        // $order->name = $validated['name'];
        $order->date = $validated['date'];
        $order->save();


        // genereerib invoice orderi pohjal
        $invoice = new MyInvoice();
        $invoice->generateInvoice($order);


        // teeb invoices tabelisse uue invoice rea
        $myInvoice = new MyInvoice;
        $myInvoice->client()->associate($request->user());
        $myInvoice->invoiceName = $order->id;
        // $myInvoice->order_id = $order->id;
        $myInvoice->invoiceProductName = $order->product->name;

        $myInvoice->save();



        return redirect(route('orders.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order): View
    {
        //
        $this->authorize('update',$order);
        return view('orders.edit',[
            'order'=>$order,
            'products'=>Product::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order): RedirectResponse
    {
        //
        $this->authorize('update',$order);
        $validated = $request->validate([
            'product_id' => 'required|gt:0',
            'amount' => 'integer|gte:0',
            // 'invoice' => 'nullable|string',
            // 'name' => 'nullable|string',
            'date' => 'nullable|date',

        ]);
        $order->update($validated);

        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order) : RedirectResponse
    {
        //
        $this->authorize('delete', $order);

        $order->delete();

        return redirect(route('orders.index'));
    }




}
