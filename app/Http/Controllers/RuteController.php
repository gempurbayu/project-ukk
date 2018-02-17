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
    	$rutes = Rute::latest()->paginate(5);
        $users = User::Latest();
        $customers = Customer::Latest();
        return view('admin.show_rute',compact('transportation','customers','users','id'))
            ->with('i', (request()->input('page', 1) - 1) * 5)->with([
     'rute' => $rutes])->with(['customer' => $customers]);
    }

     public function create()
    {
        $rutes = Rute::Latest();
        $users = User::Latest();
        $customers = Customer::Latest();
    	$transportation = Transportation::all();
    	return view('admin.create_rute',compact('transportation','users','customers','id'))->with([
     'rute' => $rutes])->with([
     'customer' => $customers]);;
    }
    public function store()
    {
    	Rute::create([
    		'depart_at' => request('depart_at'),
    		'rute_from' => request('rute_from'),
    		'rute_to' => request('rute_to'),
    		'price' => request('price'),
    		'transportation_id' => request('transportation_id'),  
    	]);
    	return redirect()->url('/admin/customers');
    }

    public function show($id)
    {
        $rute = Rute::find($id);
        return view('admin.show_data',compact('rute'));
    }
}
