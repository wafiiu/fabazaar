<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'itemID',
        'custID',
        'purchase_date',
        'quantity'
    ];

    // use this function to retrieve item's details
    // ex: {{ $purchase->item }}
    public function item() {
        return $this->belongsTo(Item::class, 'itemID');
    }

    // use this function to retrieve customer's details
    // ex: {{ $purchase->customer }}
    public function customer() {
        return $this->belongsTo(User::class, 'custID');
    }
}
