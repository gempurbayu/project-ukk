<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rute;
use App\Transportation;

class BookController extends Controller
{
    public function carimaskapai(Request $request)
    {
    	$depart_at=$request->depart_at;
    	$rute_from=$request->rute_from;
    	$rute_to=$request->rute_to;

        $rute = Rute::where('depart_at','like','%'.$depart_at.'%')
        ->where('rute_from','like','%'.$rute_from.'%')
        ->where('rute_to','like','%'.$rute_to.'%')
        ->paginate(4);
		return view('customers.carimaskapai',compact('rute'));
    }
}
