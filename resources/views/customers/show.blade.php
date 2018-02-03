@extends('admin.admin_template')
@section('content')
<section class="col-lg-12 connectedSortable">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">User Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">Id</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Gender</th>
                  <th>Action</th>
                </tr>
                <?php $no=1; ?>
                @foreach($customers as $customer)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$customer->name}}</td>
                  <td>{{$customer->address}}</td>
                  <td>{{$customer->phone}}</td>
                  <td>{{$customer->gender}}</td>
                  <td>
                  <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['customers.destroy', $customer->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </table>
              {!! $customers->links() !!}
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        </section>
@endsection