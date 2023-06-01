<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'procurementPrice_cents',
        'description',
    ];
    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }
}
