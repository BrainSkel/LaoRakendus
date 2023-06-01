<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = [
        'id',
        'productName',
        'amount',
        'invoice',
        'user_id',
        'date',
    ];
}
