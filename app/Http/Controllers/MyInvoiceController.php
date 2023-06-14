<?php

namespace App\Http\Controllers;

use App\Models\MyInvoice;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\Seller;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class MyInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return View("myInvoices.index" , [
            'myInvoices' => MyInvoice::all(),
        ]);
    }

    public function download($filename)
    {
        $pathToFile = storage_path('app/invoices/' . $filename);

        return response()->download($pathToFile);
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
        $validated = $request->validate([
            'invoiceName' => 'required|string|max:255',
            'date' => 'nullable|date',
        ]);

        $order->client()->associate($request->user());


    }

    /**
     * Display the specified resource.
     */
    public function show(MyInvoice $myInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MyInvoice $myInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MyInvoice $myInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MyInvoice $myInvoice)
    {
        //
    }
}
