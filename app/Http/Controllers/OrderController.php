<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Purchase;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $items = Auth::user()->items;
        $purchases = Purchase::all();
        return view('supplier.order-list', compact('items', 'purchases'));
    }
}
