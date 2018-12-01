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
                      <a href="/admin/users/create" class="btn btn-success ml-1" data-toggle="tooltip" title="" data-original-title="Create New"><svg class="svg-inline--fa fa-plus-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="plus-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"></path></svg><!-- <i class="fas fa-plus-circle"></i> --></a>
                  </div><!--btn-toolbar-->
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>UUID</th>
                            <th>Confirmed</th>
                            <th>Phone</th>
                            <th>Roles</th>
                            <th>Last Updated</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                          @foreach($users as $user)
                              <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->uuid}}</td>
                                    <td>
                                      <span class="badge badge-success">{{$user->active?"Yes":"No"}}</span>
                                    </td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->role_id}}</td>
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

                                      <!--
                                          <div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
                                          <a href="/admin/auth/user/1" class="btn btn-info"><svg class="svg-inline--fa fa-eye fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-1" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="View"><title id="svg-inline--fa-title-1">View</title><path fill="currentColor" d="M569.354 231.631C512.969 135.949 407.81 72 288 72 168.14 72 63.004 135.994 6.646 231.631a47.999 47.999 0 0 0 0 48.739C63.031 376.051 168.19 440 288 440c119.86 0 224.996-63.994 281.354-159.631a47.997 47.997 0 0 0 0-48.738zM288 392c-75.162 0-136-60.827-136-136 0-75.162 60.826-136 136-136 75.162 0 136 60.826 136 136 0 75.162-60.826 136-136 136zm104-136c0 57.438-46.562 104-104 104s-104-46.562-104-104c0-17.708 4.431-34.379 12.236-48.973l-.001.032c0 23.651 19.173 42.823 42.824 42.823s42.824-19.173 42.824-42.823c0-23.651-19.173-42.824-42.824-42.824l-.032.001C253.621 156.431 270.292 152 288 152c57.438 0 104 46.562 104 104z"></path></svg></a>
                                          <a href="/admin/auth/user/1/edit" class="btn btn-primary"><svg class="svg-inline--fa fa-edit fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-2" data-prefix="fas" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="Edit"><title id="svg-inline--fa-title-2">Edit</title><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg>/a>

                                          <div class="btn-group" role="group">
                                              <button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                More
                                              </button>
                                              <div class="dropdown-menu" aria-labelledby="userActions">
                                                <a href="/admin/auth/user/1/password/change" class="dropdown-item">Change Password</a>
                                              </div>
                                          </div>
                                        </div>
                                      -->
                                    </td>
                                </tr>
                          @endforeach

                      </tbody>
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
    @if(config('usersmanagement.enableSearchUsers'))
        @include('scripts.search-users')
    @endif
@endsection
