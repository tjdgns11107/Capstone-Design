<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create($id) {
        // $product = \App\Product::where('id', '=', $id)->get();

        return view('orders.create');
    }

    public function store() {
        //
    }
}
