<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    proteected $fillable = [ 'cat_name'];

    //list item in that category.
    public function item(){
      return $this -> hasMan(Item::class, 'catID');
    }
}
