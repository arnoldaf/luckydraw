@extends('admin.theme.default')

@section('content')

<!--
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <!--
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">User Management </a>
    </li>
    <li class="breadcrumb-item active">Create User</li>
  </ol>

      <form>
       <div class="form-group row">
         <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
         <div class="col-sm-10">
           <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
         </div>
       </div>
       <div class="form-group row">
         <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
         <div class="col-sm-10">
           <input type="password" class="form-control" id="inputPassword" placeholder="Password">
         </div>
       </div>
    </form>

</div>
-->
<!-- /.container-fluid -->

<div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="content-header">
                    </div><!--content-header-->

                    <div class="container">
                       <div class="row">
                           <div class="col-12">
                               @include('admin.partials.form-status')
                           </div>
                       </div>
                   </div>

      <div class="card">
       <h5 class="card-header">Search Users</h5>

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

               <input class="form-control" type="text" name="daterange" value="01/01/2018 - 01/15/2018" />


                 <input class="form-control" type="text" name="joineddate" id="joineddate" placeholder="YYYY-MM-DD" maxlength="191" autofocus="">

             </div><!--col-->



         </div><!--form-group-->
         <div class="form-group row">
             <label class="col-md-2 float-sm-right form-control-label" for="first_name"></label>

             <div class="col-md-4 pull-right float-sm-right">
                <!--<button class="btn btn-success btn-sm " type="reset">Reset</button>-->
                <a class="btn btn-danger btn-sm" href="{{route('users')}}">Reset</a>
                <button class="btn btn-success btn-sm" type="submit">Search</button>
             </div><!--col-->
         </div><!--form-group-->
       </div>
     {!! Form::close() !!}
     </div>

  <div class="card">
    <div class="card-body">



        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">

                    User Management <small class="text-muted" style="color:green !important; {{Request::get('status') != ''?'':'display: none;'}}">Search Results </small> <!--<small class="text-muted">Active Users </small>-->
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                      <a href="{{ route('users.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="" data-original-title="Create New"><svg class="svg-inline--fa fa-plus-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="plus-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"></path></svg><!-- <i class="fas fa-plus-circle"></i> --></a>
                  </div><!--btn-toolbar-->
            </div><!--col-->
        </div><!--row-->

        <!--@include('admin.partials.search-users-form')-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Confirmed</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Balance</th>
                            <th>Registration </th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody  id="users_table">

                          @foreach($users as $user)
                              <tr>
                                    <td>{{$user->user_account}}</td>
                                    <td>{{$user->first_name}} {{$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                      <span class="badge badge-success">{{$user->active?"Yes":"No"}}</span>
                                    </td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->role_name}}</td>
                                    <td>{{$user->last_balance}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                      <i class="fas fa-cog"></i>

                                      {!! Form::open(array('url' => 'admin/users/' . $user->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                          {!! Form::hidden('_method', 'DELETE') !!}
                                          {!! Form::button('Delete', array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user ?')) !!}
                                      {!! Form::close() !!}

                                      <!--
                                      <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('users/' . $user->id) }}" data-toggle="tooltip" title="Show">
                                          {!! trans('usersmanagement.buttons.show') !!}
                                      </a>
                                    -->

                                      <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('admin/users/' . $user->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                          Edit
                                      </a>

                                    </td>
                                </tr>
                          @endforeach
                      </tbody>
                      <tbody id="search_results"></tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {{count($users)}} users total
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">

                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
                </div><!--animated-->
            </div>

@endsection
@include('admin.modals.modal-delete')

@section('footer_scripts')
    @if ((count($users) > config('usersmanagement.datatablesJsStartCount')) && config('usersmanagement.enabledDatatablesJs'))
        @include('scripts.datatables')
    @endif
    @include('admin.scripts.delete-modal-script')
    @include('admin.scripts.save-modal-script')
    @if(config('usersmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
@endsection
