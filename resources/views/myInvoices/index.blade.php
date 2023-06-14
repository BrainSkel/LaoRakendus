<?php
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

?>


<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y my-5">
            @foreach ($myInvoices as $invoice)
                <div class="flex-1 gap-y-10 my-5">
                    <div>
                        @if ($invoice->client->is(auth()->user()))
                        <div class="ml-2 text-sm text-gray-600 my-5" >
                            Product Name:
                            <span class="text-lg text-gray-800">
                                {{ $invoice->invoiceProductName }}
                            </span>


                            {{-- Product Amount:
                            <span class="text-lg text-gray-800">
                                {{ $invoice->order->product->procurementPrice_cents }}
                            </span> --}}

                        </div>
                        {{-- <div class="ml-2 text-sm text-gray-600">
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
                            </span> --}}
                        {{-- </div> --}}
                        <div class="ml-2 text-sm text-gray-600">
                            Product invoice:
                            <span class="text-lg text-gray-800 underline border">
                                <a href="{{ route('invoices.download', ['filename' => "Hannes&Karl Co InvoiceNR ". $invoice->invoiceName . '.pdf']) }}">Download Invoice</a>

                            </span>
                        </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
