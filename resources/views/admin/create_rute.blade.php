@extends('admin.admin_template')

@section('content')
<section class="col-lg-12 connectedSortable">
<div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Input Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<form action="{{ route('rute.rutesetor')}}" method="post" class="form-horizontal">
						{{ csrf_field() }}

						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								<label for="from" class="col-md-2">From:</label>
								<div class="col-md-8">
								<select name="rute_from" id="" class="form-control" >
									<option value="" disabled selected>Rute to</option>
									<option value="Denpasar"> 	Denpasar</option>
									<option value="Jakarta">Jakarta</option>
									<option value="Bandung">Bandung</option>
									<option value="Jayapura">Jayapura</option>
									<option value="Pontianak">Pontianak</option>
									<option value="Palembang">Palembang</option>
									<option value="Makasar">Makasar</option>

								</select>
								</div>
							</div>
						</div>
						
						<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<label for="from" class=" col-md-2">To:</label>
							<div class="col-md-8">
							<select name="rute_to" id="" class="form-control" >
								<option value="" disabled selected>Rute to</option>
								<option value="Denpasar"> 	Denpasar</option>
								<option value="Jakarta">Jakarta</option>
								<option value="Bandung">Bandung</option>
								<option value="Jayapura">Jayapura</option>
								<option value="Pontianak">Pontianak</option>
								<option value="Palembang">Palembang</option>
								<option value="Makasar">Makasar</option>

							</select>
							</div>
						</div>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<label for="date-start" class="col-md-2">Depart:</label><br>
							<div class="col-md-8">
							<input type="text" class="form-control" id="date-start" data-date-format="yyyy-mm-dd"
								placeholder="yyyy-mm-dd"name="depart_at" />
								</div>
						</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<label class="col-md-2">Price:</label><br>
							<div class="col-md-8">
							<input type="text" class="form-control" name="price" placeholder="Masukan harga.." />
							</div>
						</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<label for="" class="col-md-2">Maskapai:</label>
							<div class="col-md-8">
							<select name="transportation_id" id="" class="form-control">
								@foreach($transportation as $transportations)
								<option value="{{$transportations->id}}">{{ $transportations->description }}</option>
								@endforeach
							</select>
							</div>
						</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
						<div class="col-md-4">
							<input type="submit" class="btn btn-primary btn-block mt" value="Save">
						</div>
						</div>
						</div>



				</form>
			</div>
            <!-- /.box-body -->
          </div>
        </div>
</section>
@endsection