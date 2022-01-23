<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class MarketController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        $searchwith = $request->get('searchBy');
        if ($searchwith == 'category')
        {
            $id = $request->get('catID');
            $items = Category::find($id)->items;
            $currentcategory = Category::find($id);
            $categories = Category::all();
            return view('customer.category', compact('items', 'categories', 'currentcategory', 'searchwith'));
        } else if ($request->get('searchBy') == 'shop')
        {
            $sellers = User::whereRoleIs('supplier')->get();
            return view ('customer.seller-list', compact('sellers','searchwith'));
        }
    }

    /**
     * Display the specified resource.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $id = $request->get('suppID');
        $searchwith = 'shop';
        $items = User::find($id)->items;
        return view('customer.category', compact('items', 'searchwith')); // reusing this template cus why not
    }
}
