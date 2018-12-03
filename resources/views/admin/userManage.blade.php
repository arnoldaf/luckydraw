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


  <div class="card">
    <div class="card-body">

      <div class="container">
         <div class="row">
             <div class="col-12">
                 @include('admin.partials.form-status')
             </div>
         </div>
     </div>

        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    User Management <small class="text-muted">Active Users </small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                      <a href="{{ route('users.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="" data-original-title="Create New"><svg class="svg-inline--fa fa-plus-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="plus-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"></path></svg><!-- <i class="fas fa-plus-circle"></i> --></a>
                  </div><!--btn-toolbar-->
            </div><!--col-->
        </div><!--row-->
        @include('admin.partials.search-users-form')

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>E-mail</th>
                            <th>User ID</th>
                            <th>Confirmed</th>
                            <th>Phone</th>
                            <th>Roles</th>
                            <th>Registration </th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody  id="users_table">

                          @foreach($users as $user)
                              <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->uuid}}</td>
                                    <td>
                                      <span class="badge badge-success">{{$user->active?"Yes":"No"}}</span>
                                    </td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->role_name}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>

                                      {!! Form::open(array('url' => 'admin/users/' . $user->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                          {!! Form::hidden('_method', 'DELETE') !!}
                                          {!! Form::button(trans('usersmanagement.buttons.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user ?')) !!}
                                      {!! Form::close() !!}
                                      <!--
                                      <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('users/' . $user->id) }}" data-toggle="tooltip" title="Show">
                                          {!! trans('usersmanagement.buttons.show') !!}
                                      </a>
                                    -->
                                      <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('admin/users/' . $user->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                          {!! trans('usersmanagement.buttons.edit') !!}
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
