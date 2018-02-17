<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rute;
use App\Customer;
use App\Transportation;

class BookController extends Controller
{
    public function carimaskapai(Request $request)
    {
    	$depart_at=$request->depart_at;
        $rute_from=$request->rute_from;
        $rute_to=$request->rute_to;
        $seat=$request->seat; 

        $rute = Rute::where('depart_at','like','%'.$depart_at.'%')
        ->where('rute_from','like','%'.$rute_from.'%')
        ->where('rute_to','like','%'.$rute_to.'%')
        ->whereHas('transportation',function($query) use($seat){
            $query->whereRaw('seat_qty'.-$seat.'> 0 ');
        })
        ->paginate(4);

        return view('customers.carimaskapai',compact('rute'));
    }

        public function detail(Rute $rute){

        return view('customers.detail',compact('rute'));        
    }
}
