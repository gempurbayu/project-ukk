<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\User;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::latest()->paginate(5);
        $users = User::Latest();
        return view('customers.show',compact('customers','users','id'))
            ->with('i', (request()->input('page', 1) - 1) * 5)->with([
     'customer' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::Latest();
        $customers = Customer::Latest();
        return view('customers.create',compact('customers','users','id'))->with([
     'customer' => $customers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         request()->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'gender' => 'required',
        ]);
        Customer::create($request->all());
        return redirect()->route('customers.index')
                        ->with('success','Customers created successfully');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return view('customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = Customer::find($id);
        $users = User::Latest();
        return view('customers.edit',compact('customers','users','id'))->with([
     'customer' => $customers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       request()->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'gender' => 'required',
        ]);
        Customer::find($id)->update($request->all());
        return redirect()->route('customers.index')
                        ->with('success','Customers created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Customer::find($id)->delete();
        return redirect()->route('customers.index')
                        ->with('success','customer deleted successfully');
    }
}
