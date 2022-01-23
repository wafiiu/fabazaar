<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
  public function index() {
      if (Auth::user()->hasRole('customer')) {
          return view('customerdash');
      }
      else if (Auth::user()->hasRole('supplier')) {
          return view('supplierdash');
      }
      else if (Auth::user()->hasRole('admin')) {
          return view('admindashboard');
      }
  }

  public function orders(){
    return view('customer.orders');
  }
}
