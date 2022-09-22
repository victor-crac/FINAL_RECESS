<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index (){
        return view('delivery');
    }
    public function store(Request $request)
    {
        $student = new Booking;
        $student->location = $request->input('location');
        $student->quantity = $request->input('quantity');
        $student->booking_id = $request->input('bookingId');
        $student->save();
        return redirect()->back()->with('status','Order Added Successfully');
    }
}
