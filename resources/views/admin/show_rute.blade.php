@extends('admin.admin_template')
@section('content')
<section class="col-lg-12 connectedSortable">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <div class="col-md-10">
              <h3 class="box-title">Rutes Data</h3>
              </div>
              <div class="col-md-2"><a class="btn btn-primary" href="{{ route('rutes.create') }}">Create Rute</a></div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Tanggal</th>
                  <th>Dari</th>
                  <th>Tujuan</th>
                  <th>Harga</th>
                  <th>Maskapai</th>
                  <th>Action</th>
                </tr>
                <?php $no=1; ?>
                @foreach($rute as $rutes)
                <tr>
                  <td>{{$no++}}</td>
                    <td>{{$rutes->depart_at}}</td>
                    <td>{{$rutes->rute_from}}</td>
                    <td>{{$rutes->rute_to}}</td>
                    <td>Rp. {{$rutes->price}}</td>
                    <td>{{$rutes->transportation->description}}</td>
                  <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['rutes.destroy', $rutes->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </table>
              {!! $rute->links() !!}
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        </section>
@endsection