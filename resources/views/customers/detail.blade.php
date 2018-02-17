@extends('layouts.app')
@section('content')
<div class="fh5co-hero">
	<div class="fh5co-overlay" 	style="position: fixed !important;background-repeat: no-repeat;"></div>
	<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url({{asset('images/cover_bg_3.jpg')}});background-repeat: no-repeat;height: none; ">
		<div class="container" style="padding-top: 80px;">
			<div class="row">
				<div class="col-md-8 col-md-offset-2" style="background-color: #fff;z-index: 2;padding-top: 20px;opacity: 0.8; border-radius: 6px;">


					<div class="tab-content" >
					<table>
					<b>
						<tr>
						<td>Waktu Keberangkatan</td>
						<td> : {{$rute->depart_at}}</td>
						</tr>
						<tr>
						<td>Dari</td> 
						<td> : {{$rute->rute_to}}</td>
						</tr>
						<tr>
						<td>Ke</td> 
						<td> : {{$rute->rute_from}}</td>
						</tr>
						<tr>
						<td>Maskapai</td> 
						<td> : {{$rute->transportation->description}} [ {{$rute->transportation->code}} ]</td>
						</tr>
						<tr>
						<td>Jumlah Penumpang</td> 
						<td> : {{$_GET['seat']}}</td>
						</tr>
						<tr>
						<td>Harga</td>
						<td> : {{number_format($rute->price)}} x {{$_GET['seat']}} = {{number_format($rute->price * $_GET['seat'],2)}}</td>
						</tr>
					</b>
					</table>
						<hr style="">
						<p style="font-size: 14px;">
						*) Jika data sudah benar dan sesuai dengan yang dipesan silahkan klik tombol <b>LANJUTKAN</b><br>
						*) Jika data belum benar dan belum sesuai maka klik tombol <b>KEMBALI</b><br>
						</p>
						<a href="/" class="btn btn-primary" style="font-size: 13px;">KEMBALI</a>
						<a href="#" class="btn btn-primary" style="font-size: 13px;">LANJUTKAN</a>

					</div>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection