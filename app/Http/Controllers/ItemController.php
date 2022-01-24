<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Item::all(); //this retrieves all "items" data in the database, don't use this
        $items = Auth::user()->items; // to retrieve data available for that particular supplier
        return view('supplier.inventory', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // to show view of create-item, and pass all "categories" data available in the database
        $categories = Category::all();
        return view('supplier.create-item', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation process, incase if user put some weird data inside this
        $request->validate([
            'item_name'=>'required|string|max:100',
            'item_price'=>'required|gt:0',
            'item_available_unit'=>'required|numeric|gt:0',
            'catID' => 'required'
        ]);

        // storing all datas here into "items" table in database
        $item = new Item([
            'item_name' => $request->get('item_name'),
            'item_price' => $request->get('item_price'),
            'item_available_unit' => $request->get('item_available_unit'),
            'catID' => $request->get('catID'),
            'suppID' => Auth::id() //automatically assigned user's id to this foreign key
        ]);
        $item->save();

        // success message, you can edit it as you like
        return redirect('/inventory')->with('success', 'Your items have been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dunno man
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieve details of the "item(id)" of "items"
        // and "categories"(to select categories) in view edit-item
        $item = Item::find($id);
        $categories = Category::all();
        return view('supplier.edit-item', compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validation process, incase if user put some weird data inside this
        $request->validate([
            'item_name'=>'required|string|max:100',
            'item_price'=>'required|gt:0', //price must be above 0, unless u want to sell freebies
            'item_available_unit'=>'required|numeric|gt:0',
            'catID' => 'required'
        ]);

        // updating all the data from view edit-item using PATCH
        // then update relevant details into "item" of the "items" table
        $item = Item::find($id);
        $item->item_name =  $request->get('item_name');
        $item->item_price = $request->get('item_price');
        $item->item_available_unit = $request->get('item_available_unit');
        $item->catID = $request->get('catID');
        $item->save();

        // success message, you can edit it as you like
        return redirect('/inventory')->with('success', 'All changes are saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find the item's id in "items", then deletes it
        $item = Item::find($id);
        $item->delete();

        // success message, you can edit it as you like
        return redirect('/inventory')->with('success', 'The select item has been deleted!');
    }
}
