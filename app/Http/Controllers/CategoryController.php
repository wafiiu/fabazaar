<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // retrieve all "categories" data table inside $categories
        // then put them in view admin-category
        $categories = Category::all();
        return view('admin.admin-category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // to show view of category-create
        return view('admin.category-create');
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
            'cat_name'=>'required|string|max:100'
        ]);

        // storing the category in the "categories" table in database
        $category = new Category([
            'cat_name' => $request->get('cat_name'),
        ]);
        $category->save();

        // success message, you can edit it as you like
        return redirect('/admincategory')->with('New category has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //nope
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieve details of the category of "categories" table in view category-edit
        $category = Category::find($id);
        return view('admin.category-edit', compact('category'));
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

        $request->validate([
            'cat_name'=>'required|string|max:100'
        ]);

        // updating all the data from view category-edit using PATCH
        // then update the name of "category" of the "categories" table
        $categories = Category::find($id);
        $categories->cat_name =  $request->get('cat_name');
        $categories->save();

        // success message, you can edit it as you like
        return redirect('/admincategory')->with('success', 'All changes are saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find the category's id in "categories", then deletes it
        $categories = Category::find($id);
        $categories->delete();

        // success message, you can edit it as you like
        return redirect('/admincategory')->with('success', 'The select category has been deleted!');
    }
}
