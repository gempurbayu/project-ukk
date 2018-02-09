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
               <form class="form-horizontal" method="POST" action="{{ route('customers.store') }}">
                                    {{ csrf_field() }}
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    </div>
                                    </form>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                        <label for="address" class="col-md-4 control-label">Address</label>

                                        <div class="col-md-6">
                                            <input id="address" type="textarea" class="form-control" name="address" value="{{ old('address') }}" required>

                                            @if ($errors->has('address'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label for="phone" class="col-md-4 control-label">Phone</label>

                                        <div class="col-md-6">
                                            <input id="phone" type="text" class="form-control" name="phone" required>

                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                        <label for="phone" class="col-md-4 control-label">Gender</label>

                                        <div class="col-md-6">
                                             <select name="gender" class="form-control">
                                              <option value="Pria">Pria</option>
                                              <option value="Wanita">Wanita</option>
                                            </select> 

                                            @if ($errors->has('gender'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('gender') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Create
                                            </button>
                                        </div>
                                    </div>
                                </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
</section>
@endsection