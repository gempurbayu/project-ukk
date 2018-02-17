@extends('layouts.app')
@section('content')
<div class="fh5co-hero">
	<div class="fh5co-overlay"></div>
	<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url({{asset('images/cover_bg_3.jpg')}});">
		<div class="container" style="padding-top: 80px;">
			<div class="row">
				<div class="col-md-8 col-md-offset-2" style="background-color: #fff;z-index: 2;padding-top: 20px; opacity: 0.8; border-radius: 6px;">
					
				
				@foreach($rute as $rutes)
					
					<b> Maskapai : {{$rutes->transportation->description}} ( {{$rutes->transportation->code}} )<br>
						Perjalanan : {{$rutes->rute_from}} - {{$rutes->rute_to}}<br>
						Harga : Rp.{{$rutes->price}}
					</b><br>
					<br>
					<a href="{{route('book.detail',$rutes)}}?seat={{$_GET['seat']}}" class="btn btn-primary" style="font-size: 12px;">PILIH</a><br>
														<hr>
				@endforeach
				{{$rute->links()}}
			
				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection