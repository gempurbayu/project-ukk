<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transportation;
use App\Rute;
use App\customer;
use App\User;
use Auth;

class RuteController extends Controller
{
	    public function __construct()
    {
        $this->middleware('auth');
        $users = User::Latest();
        $customers = Customer::Latest();
    }

    public function index()
    {
    	return view('admin');
    }

     public function rutebikin()
    {
        $rutes = Rute::Latest();
        $users = User::Latest();
        $customers = Customer::Latest();
    	$transportation = Transportation::all();
    	return view('admin.create_rute',compact('transportation','users','customers','id'))->with([
     'rute' => $rutes])->with([
     'customer' => $customers]);;
    }
    public function rutesetor()
    {
    	Rute::create([
    		'depart_at' => request('depart_at'),
    		'rute_from' => request('rute_from'),
    		'rute_to' => request('rute_to'),
    		'price' => request('price'),
    		'transportation_id' => request('transportation_id'),  
    	]);
    	return redirect()->route('customers.index');
    }
}
