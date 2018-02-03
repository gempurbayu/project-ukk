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
                  <th>Email</th>
                  <th>Level</th>
                  <th>Action</th>
                </tr>
                <?php $no=1; ?>
                @foreach($users as $user)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->level}}</td>
                  <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </table>
              {!! $users->links() !!}
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
        </div>
        </section>
@endsection