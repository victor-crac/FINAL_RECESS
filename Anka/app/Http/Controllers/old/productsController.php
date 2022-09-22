<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class productsController extends Controller
{
    //
    public function index()
    {   

        $query ="SELECT * FROM products";
        $products = DB::select($query);
        $products= json_decode(json_encode($products),true);
        return view::make('product')->with(['products'=>$products,'total'=>count($products)]);
        // return view('product');
    }
}
