<?php

namespace App\Models;

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MyInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'invoiceName',
        'invoiceProductName',
        'date',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    // public function client(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }


    public function generateInvoice(Order $order)
    {
       $customer = new Buyer([
           'name'          => $order->client->name,
           'custom_fields' => [
               'email' => $order->client->email,
           ],
       ]);

    //   $this->order()->associate($order);
       $item = (new InvoiceItem())->title($order->product->name)->quantity($order->amount)->pricePerUnit($order->product->procurementPrice_cents);

       $invoice = Invoice::make()
           ->buyer($customer)
           ->taxRate(20)
           ->addItem($item);

           $invoice->filename("Hannes&Karl Co InvoiceNR ".$order->id); // Set a custom filename for the invoice
           $invoice->save('invoices'); // Save the invoice to a specific directory

   }
}
