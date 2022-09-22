<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ItemController extends Controller
{
    public function index()


    {    
        $query = "SELECT sales.participant_id, sales.product_id, sales.goods_sold FROM sales";
           
    
        $sales = DB::select($query);
        $sales= json_decode(json_encode($sales),true);
        return view::make('items')->with(['sales'=>$sales,'total'=>count($sales)]);
        // return view('items');
    }
}
