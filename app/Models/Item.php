<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_name',
        'item_price',
        'item_available_unit',
        'catID', // foreign_key
        'suppID' // foreign_key
    ];

    // use this to relate items to category
    // for example, when declaring $item = Item::find(1)
    // in your view, put this anywhere: {{ $item->category->cat_name }}
    // or use $item->category->id also can :)
    public function category() {
        return $this->belongsTo(Category::class, 'catID');
    }

    // same story for supplier function
    // use something like this who owns the item:
    // {{ $item->supplier->name }}
    public function supplier() {
        return $this->belongsTo(User::class, 'suppID');
    }

    // to retrieve all purchase details that was ordered by customers
    // use: {{ $item->purchases }}
    public function purchases() {
        return $this->hasMany(Purchase::class, 'itemID');
    }
}
