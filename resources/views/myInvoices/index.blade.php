<?php
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

?>


<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($myInvoices as $invoice)
                <div class="flex-1">
                    <div>
                        @if ($invoice->order->client->is(auth()->user()))
                        <div class="ml-2 text-sm text-gray-600">
                            Product Name:
                            <span class="text-lg text-gray-800">
                                {{ $invoice->order->product->name }}
                            </span>


                            {{-- Product Amount:
                            <span class="text-lg text-gray-800">
                                {{ $invoice->order->product->procurementPrice_cents }}
                            </span> --}}

                        </div>
                        <div class="ml-2 text-sm text-gray-600">
                            Product Price:
                            <span class="text-lg text-gray-800">
                                {{ $invoice->order->product->procurementPrice_cents * $invoice->order->amount }}
                            </span>
                        </div>
                        <div class="ml-2 text-sm text-gray-600">
                            Product Amount:
                            <span class="text-lg text-gray-800">
                                {{ $invoice->order->amount }}
                            </span>
                        </div>
                        <div class="ml-2 text-sm text-gray-600">
                            Product description:
                            <span class="text-lg text-gray-800">
                                {{ $invoice->order->product->description }}
                            </span>
                        </div>
                        <div class="ml-2 text-sm text-gray-600">
                            Product invoice:
                            <span class="text-lg text-gray-800">
                                <a href="{{ route('invoices.download', ['filename' => $invoice->invoiceName . '.pdf']) }}">Download Invoice</a>

                            </span>
                        </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
