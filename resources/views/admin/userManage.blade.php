@extends('admin.theme.default')

@section('content')

<div id="page-wrapper">

  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">Client Data </h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <div class="row">
      <div class="col-lg-6">
          @include('admin.partials.form-status')
      </div>
  </div>

  <div class="card">
  {!! Form::open(array('route' => 'search-users', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
  <div class="card-body">
    <div class="form-group row">
        <label class="col-md-2 float-sm-right form-control-label" for="first_name">User ID</label>

        <div class="col-md-4">
            <input class="form-control" type="text" value="{{ Request::get('userid')}}" name="userid" id="userid" placeholder="User ID" maxlength="191" autofocus="">

        </div><!--col-->
    </div><!--form-group-->

    <div class="form-group row">
        <label class="col-md-2 float-sm-right form-control-label" for="first_name">Name</label>

        <div class="col-md-4">
            <input class="form-control" type="text" name="name" value="{{ Request::get('name')}}"  id="name" placeholder="Name" maxlength="191" autofocus="">

        </div><!--col-->
    </div><!--form-group-->

    <div class="form-group row">
        <label class="col-md-2 float-sm-right form-control-label" for="first_name">Email Id</label>

        <div class="col-md-4">
            <input class="form-control" type="text" name="emailid" value="{{ Request::get('emailid')}}"  id="emailid" placeholder="Email Id" maxlength="191" autofocus="">

        </div><!--col-->
    </div><!--form-group-->

    <div class="form-group row">
        <label class="col-md-2 float-sm-right form-control-label" for="first_name">Phone</label>

        <div class="col-md-4">
            <input class="form-control" type="text" name="phone" id="phone" value="{{ Request::get('phone')}}"   placeholder="Phone" maxlength="191" autofocus="">

        </div><!--col-->
    </div><!--form-group-->

    <div class="form-group row">
        <label class="col-md-2 float-sm-right form-control-label" for="first_name">Status</label>

        <div class="col-md-4">
          <select class="custom-select form-control" name="status"    id="status" style="height: auto;" >
                      <option value="" {{ (Request::get('status') =='')? 'selected':''}} >Select</option>
                      <option value="1" {{ (Request::get('status') == 1)? 'selected':''}} >Active</option>
                      <option value="0" {{ Request::get('status') == 0 && Request::get('status') !=''? 'selected':''}}>Inactive</option>
           </select>

        </div><!--col-->
    </div><!--form-group-->

    <div class="form-group row">
        <label class="col-md-2 float-sm-right form-control-label" for="first_name">Joined Date</label>

        <div class="col-md-4">

          <input class="form-control" type="text" autocomplete="off" name="reportrange" onkeydown="no_backspaces(event);" value="01/01/2018 - 01/15/2018" />
          <!--<input class="form-control" type="text" name="joineddate" id="joineddate" placeholder="YYYY-MM-DD" maxlength="191" autofocus="">-->

        </div><!--col-->



    </div><!--form-group-->
    <div class="form-group row">
        <label class="col-md-2 float-sm-right form-control-label" for="first_name"></label>

        <div class="col-md-4 ">
           <!--<button class="btn btn-success btn-sm " type="reset">Reset</button>-->
           <a class="btn btn-danger btn-sm" href="{{route('users')}}">Reset</a>
           <button class="btn btn-success btn-sm" type="submit">Search</button>
        </div><!--col-->
    </div><!--form-group-->
  </div>
  </div>

  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  User Management
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                          <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th>Balance</th>
                            <th>Registration</th>
                            <th>Actions</th>
                          </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>User ID</th>
                          <th>Name</th>
                          <th>E-mail</th>
                          <th>Status</th>
                          <th>Role</th>
                          <th>Balance</th>
                          <th>Registration</th>
                          <th>Actions</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach($users as $user)
                            <tr>
                                  <td>{{$user->user_account}}</td>
                                  <td>{{$user->first_name}} {{$user->last_name}}</td>
                                  <td>{{$user->email}}</td>
                                  <td>
                                    <span class="badge badge-success">{{$user->active?"Active":"Inactive"}}</span>
                                  </td>
                                  <td>{{$user->role_name}}</td>
                                  <td>{{$user->last_balance==''?'0':$user->last_balance}}</td>
                                  <td>{{$user->created_at}}</td>
                                  <td align="center" class="center">
                                    <a href="{{ URL::to('admin/userProfile/' . $user->id ) }}"><i class="fa fa-cog fa-fw"></i></a>
                                  </td>
                              </tr>
                        @endforeach
                      </tbody>
                  </table>
                  <!-- /.table-responsive -->

              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>

      <!-- /.col-lg-12 -->
  </div>
    <div class="row">Updated today at {{date('Y-m-d H:i:s')}}</div>


</div>
{!! Form::close() !!}
@endsection
