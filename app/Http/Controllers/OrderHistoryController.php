<?php

namespace App\Http\Controllers;

use App\Models\OrderHistory;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrderHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return View("orderHistories.index" , [
            'orders' => Order::all(),
            'orderHistories' => OrderHistory::all(),
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
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderHistory $orderHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderHistory $orderHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderHistory $orderHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderHistory $orderHistory)
    {
        //
    }
}
