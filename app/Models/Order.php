<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        // 'productId',
        'amount',
        // 'invoice',
        // 'ordererName',
        'date',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted () {
        static::deleting(function(Order $order) { // before delete() method call this
             $order->photos()->delete();
             // do the rest of the cleanup...
        });
    }
}
