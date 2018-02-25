<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rute;
use App\customer;
use App\Reservation;
use App\Transportation;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class BookController extends Controller
{

     public function createcus($id)
    {
        $rute = Rute::findOrFail($id);

        return view('customers.isidata',compact('rute'));
    }
    public function storecus(Request $request,$id)
    { 
        for ($i=0; $i < $_GET['seat'] ; $i++) { 

            $seat = $request->seathuruf[$i] . $request->seatangka[$i];
            
            Customer::create([
                'name' => $request->name[$i],
                'address' =>$request->address[$i],
                'phone' => $request->phone[$i],
                'gender' => $request->gender[$i],
                'rute_id' => $id,
                'kursi' => $seat,
                'token' => $request->token,
                
            ]);
        }
        $token = $request->token ; 
        $customer = Customer::where('rute_id',$id)->where('token',$token)->first();
        // return redirect()->route('booking.reservation',$id);
        return redirect('book/'.$id.'/reservation?name='.$customer->name.'&token='.$token);
    }

  /*
   public function seat($id)
    {
        $kursi = Customer::join('rutes', 'customers.rute_id', '=', 'rutes.id')
            ->where('rute_id',$id)
            ->select('customers.kursi')
            ->get();
        $kursi_pesan = array();
       foreach($kursi as $seat){ 
            $kursi_pesan[] = $seat->kursi;
        };
        $customer =  Customer::where('token',$_GET['token'])->get();
       
        return view('customers.seat',compact('customer','kursi_pesan'))->with([
     'customer' => $customer]);
    }

    public function seatstore($id, Request $request)
    {   $token = $request->token ;
        $customer = Customer::where('rute_id',$id)->where('token',$token)->get();
        $custom = Customer::where('rute_id',$id)->where('token',$token)->first();

        $cuy = array();
        
     
           
        $j = 0;
       for ($i=1; $i <= count($customer) ; $i++) { 
           # code...
            $customer[$j]->update([
                'kursi' => $request->input('i_'.$i),
            ]);
            
            $j++;
       }
       return redirect('book/'.$id.'/reservation?name='.$custom->name.'&token='.$token);

    }
    */

    public function reservation(Request $request,$id)
    {
        $token = $request->token ; 
        $name = $request->name;
        $customer = Customer::where('token',$token)->get();
        $count = count($customer);

        
        return view('customers.reservation',compact('customer','id'));
    }
   
    public function storersrv(Request $request,$id)
    {       
        $token = $_GET['token'];
        $customer = Customer::where('token',$token)->get();

        foreach($customer as $customers){
             Reservation::create([
                'reservation_code' => $request->reservation_code,
                'reservation_date' => $request->reservation_date,
                'seat_code' => $customers->kursi,
                'depart_at' => $request->depart_at,
                'price' => $request->price,
                'user_id' => $request->user_id,
                'customer_id' => $customers->id,
            ]);
               
         }
       
            $reservasi = Reservation::where('reservation_code', $request->reservation_code)->first();


     return view('customers.payment',compact('reservasi'));
     }

    public function payment(Request $request,$id){
        $reservation = Reservation::where('reservation_code',$request->reservation_code)->get();

    return view('customers.payment',compact('reservation'));
    }

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
