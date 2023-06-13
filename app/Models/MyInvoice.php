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
        'date',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    // public function client(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }


    public static function generateInvoice(Order $order)
    {
       $customer = new Buyer([
           'name'          => $order->client->name,
           'custom_fields' => [
               'email' => $order->client->email,
           ],
       ]);

       $item = (new InvoiceItem())->title($order->product->name)->quantity($order->amount)->pricePerUnit($order->product->procurementPrice_cents);

       $invoice = Invoice::make()
           ->buyer($customer)
           ->taxRate(20)
           ->addItem($item);

           $invoice->filename($order->id); // Set a custom filename for the invoice
           $invoice->save('invoices'); // Save the invoice to a specific directory

           // Generate the invoice as HTML
           $html = $invoice->toHtml();

           // Return the HTML or you can also return the file path where the invoice is saved
           return $html;
   }
}
