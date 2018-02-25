@extends('layouts.app')
@section('content')
<div class="fh5co-hero">
	<div class="fh5co-overlay" 	style="position: fixed !important;background-repeat: no-repeat;"></div>
	<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url({{asset('images/cover_bg_3.jpg')}});background-repeat: no-repeat;height: none; ">
		<div class="container" style="padding-top: 80px;">
			<div class="row">
				<div class="col-md-8 col-md-offset-2" style="background-color: #fff;z-index: 2;padding-top: 20px;opacity: 0.8; border-radius: 6px;">

					<div class="tab-content">
				<div class="row">
				<?php $no=1; ?>
				@foreach ($customer as $customers)
					<div class="col-md-6">
					<h3>Data Penumpang {{$no++}}</h3>
					<table>
					<b>
						<tr>
						<td>Nama</td>
						<td>   : {{$customers->name}}</td>
						</tr>
						<tr>
						<td>Dari</td> 
						<td>   : {{$customers->rute->rute_from}}</td>
						</tr>
						<tr>
						<td>Ke</td> 
						<td>   : {{$customers->rute->rute_to}}</td>
						</tr>
						<tr>
						<td>Kode Tempat Duduk</td>
						<td>   : {{$customers->kursi}}</td>
						</tr>
						<tr>
						<td>Alamat</td> 
						<td>   : {{$customers->address}}</td>
						</tr>
						<tr>
						<td>Nomor Hp</td> 
						<td>   : {{$customers->phone}}</td>
						</tr>
						<tr>
						<td>Jenis Kelamin</td>
						<td>   : {{$customers->gender}}</td>
						</tr>
						
					</b>
					</table>
					</div>
						@endforeach
					</div>
						<br>	
						<form action="{{ url()->current()}}/payment?token={{$_GET['token']}}" method="post">
							
							{{ csrf_field() }}
							<div class="col-md-2"><input name="reservation_code" value="{{str_random(7)}}" hidden=""></div>
							@foreach ($customer as $customers)
							
							<div class="col-md-2"><input name="reservation_date" value="{{date('Y-m-d H:i:s')}}" hidden=""></div>
							<div class="col-md-1"><input name="seat_code" value="{{$customers->kursi}}" hidden=""></div>
							<div class="col-md-2"><input name="depart_at" value="{{$customers->rute->depart_at}}" hidden=""></div>
							<div class="col-md-2"><input name="price" value="{{$customers->rute->price}}" hidden=""></div>
							<div class="col-md-1"><input name="user_id" value="{{Auth::id()}}" hidden=""></div>
							<div class="col-md-1"><input name="customer_id" value="{{$customers->id}}" hidden=""></div>
							@endforeach
							<input type="submit" class="btn btn-primary" value="Lanjut Pembayaran">
							
							
						</form>
						
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection