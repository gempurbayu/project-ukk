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
    public function store(Request $request)
    {
    	request()->validate([
            'depart_at' => 'required',
            'rute_from' => 'required',
            'rute_to' => 'required',
            'price' => 'required',
        ]);
        Rute::create($request->all());
        return redirect()->route('rutes.index')
                        ->with('success','Customers created successfully');
    }
    public function edit($id)
    {
        $users = User::Latest();
        $rutes = Rute::Latest();
        $customers = Customer::Latest();
        $transportation = Transportation::all();
        $rutes = Rute::find($id);
        return view('admin.edit_rute',compact('transportation','rutes','users','id'))->with([
     'rutes' => $rutes])->with(['customer' => $customers]);
    }
    public function update(Request $request, $id)
    {
       request()->validate([
            'depart_at' => 'required',
            'rute_from' => 'required',
            'rute_to' => 'required',
            'price' => 'required',
        ]);
        Rute::find($id)->update($request->all());
        return redirect()->route('rutes.index')
                        ->with('success','rute update successfully');
    }
    public function show($id)
    {
        $rute = Rute::find($id);
        return view('admin.show_data',compact('rute'));
    }
}
