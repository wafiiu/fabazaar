<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Purchase;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customers() {
        $usertype = 'customer';
        $users = User::whereRoleIs('customer')->get();
        return view('admin.list-user', compact('users', 'usertype'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function suppliers() {
        $usertype = 'supplier';
        $users = User::whereRoleIs('supplier')->get();
        return view('admin.list-user', compact('users', 'usertype'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function details(Request $request) {
        $usertype = $request->get('userType');
        $purchases = Purchase::all();
        $id = $request->get('id');
        if ($usertype == 'customer')
            $details = User::find($id)->purchases;
        else if ($usertype == 'supplier')
            $details = User::find($id)->items;
        return view('admin.userdetails', compact('details', 'usertype','purchases'));
    }

}
