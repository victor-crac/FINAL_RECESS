<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\view;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class participantController extends Controller
{
    //
    public function index(){
        $query = "SELECT participants.participant_id, participants.Name, participants.Date_Of_Birth FROM participants";
       

$participants = DB::select($query);
$participants = json_decode(json_encode($participants),true);
return view::make('participants')->with(['participants'=>$participants,'total'=>count($participants)]);

    }
}