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
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    User Management <small class="text-muted">Active Users</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
    <a href="http://finovics.com/admin/auth/user/create" class="btn btn-success ml-1" data-toggle="tooltip" title="" data-original-title="Create New"><svg class="svg-inline--fa fa-plus-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="plus-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"></path></svg><!-- <i class="fas fa-plus-circle"></i> --></a>
</div><!--btn-toolbar-->            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>E-mail</th>
                            <th>Confirmed</th>
                            <th>Roles</th>
                            <th>Other Permissions</th>
                            <th>Social</th>
                            <th>Last Updated</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                                                    <tr>
                                <td>Istrator</td>
                                <td>Admin</td>
                                <td>admin@admin.com</td>
                                <td><span class="badge badge-success">Yes</span></td>
                                <td>Administrator</td>
                                <td>N/A</td>
                                <td>None</td>
                                <td>2 days ago</td>
                                <td>
    	<div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
		  <a href="http://finovics.com/admin/auth/user/1" class="btn btn-info"><svg class="svg-inline--fa fa-eye fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-1" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="View"><title id="svg-inline--fa-title-1">View</title><path fill="currentColor" d="M569.354 231.631C512.969 135.949 407.81 72 288 72 168.14 72 63.004 135.994 6.646 231.631a47.999 47.999 0 0 0 0 48.739C63.031 376.051 168.19 440 288 440c119.86 0 224.996-63.994 281.354-159.631a47.997 47.997 0 0 0 0-48.738zM288 392c-75.162 0-136-60.827-136-136 0-75.162 60.826-136 136-136 75.162 0 136 60.826 136 136 0 75.162-60.826 136-136 136zm104-136c0 57.438-46.562 104-104 104s-104-46.562-104-104c0-17.708 4.431-34.379 12.236-48.973l-.001.032c0 23.651 19.173 42.823 42.824 42.823s42.824-19.173 42.824-42.823c0-23.651-19.173-42.824-42.824-42.824l-.032.001C253.621 156.431 270.292 152 288 152c57.438 0 104 46.562 104 104z"></path></svg><!-- <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="View"></i> --></a>
		  <a href="http://finovics.com/admin/auth/user/1/edit" class="btn btn-primary"><svg class="svg-inline--fa fa-edit fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-2" data-prefix="fas" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="Edit"><title id="svg-inline--fa-title-2">Edit</title><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg><!-- <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> --></a>

		  <div class="btn-group" role="group">
			<button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  More
			</button>
			<div class="dropdown-menu" aria-labelledby="userActions">


			  <a href="http://finovics.com/admin/auth/user/1/password/change" class="dropdown-item">Change Password</a>



			</div>
		  </div>
		</div></td>
                            </tr>
                                                    <tr>
                                <td>User</td>
                                <td>Silver</td>
                                <td>shivamgupta27@gmail.com</td>
                                <td><a href="http://finovics.com/admin/auth/user/2/unconfirm" data-toggle="tooltip" data-placement="top" title="" name="confirm_item" data-original-title="Un-confirm"><span class="badge badge-success" style="cursor:pointer">Yes</span></a></td>
                                <td>Executive</td>
                                <td>N/A</td>
                                <td>None</td>
                                <td>1 month ago</td>
                                <td>
    	<div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
		  <a href="http://finovics.com/admin/auth/user/2" class="btn btn-info"><svg class="svg-inline--fa fa-eye fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-3" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="View"><title id="svg-inline--fa-title-3">View</title><path fill="currentColor" d="M569.354 231.631C512.969 135.949 407.81 72 288 72 168.14 72 63.004 135.994 6.646 231.631a47.999 47.999 0 0 0 0 48.739C63.031 376.051 168.19 440 288 440c119.86 0 224.996-63.994 281.354-159.631a47.997 47.997 0 0 0 0-48.738zM288 392c-75.162 0-136-60.827-136-136 0-75.162 60.826-136 136-136 75.162 0 136 60.826 136 136 0 75.162-60.826 136-136 136zm104-136c0 57.438-46.562 104-104 104s-104-46.562-104-104c0-17.708 4.431-34.379 12.236-48.973l-.001.032c0 23.651 19.173 42.823 42.824 42.823s42.824-19.173 42.824-42.823c0-23.651-19.173-42.824-42.824-42.824l-.032.001C253.621 156.431 270.292 152 288 152c57.438 0 104 46.562 104 104z"></path></svg><!-- <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="View"></i> --></a>
		  <a href="http://finovics.com/admin/auth/user/2/edit" class="btn btn-primary"><svg class="svg-inline--fa fa-edit fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-4" data-prefix="fas" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="Edit"><title id="svg-inline--fa-title-4">Edit</title><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg><!-- <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> --></a>

		  <div class="btn-group" role="group">
			<button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  More
			</button>
			<div class="dropdown-menu" aria-labelledby="userActions">

			  <a href="http://finovics.com/admin/auth/user/2/login-as" class="dropdown-item">Login As Silver User</a>
			  <a href="http://finovics.com/admin/auth/user/2/password/change" class="dropdown-item">Change Password</a>
			  <a href="http://finovics.com/admin/auth/user/2/mark/0" class="dropdown-item">Deactivate</a>

			  <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="dropdown-item" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();">Delete
<form action="http://finovics.com/admin/auth/user/2" method="POST" name="delete_item" style="display:none">
<input type="hidden" name="_method" value="delete">
<input type="hidden" name="_token" value="0Z3jLe9x1bYs4JCG8CT9uWaWjUnAj0ovFMie0HuS">
</form>
</a>
			</div>
		  </div>
		</div></td>
                            </tr>
                                                    <tr>
                                <td>Lewis</td>
                                <td>Oscar</td>
                                <td>omkashyap.27@gmail.com</td>
                                <td><a href="http://finovics.com/admin/auth/user/3/unconfirm" data-toggle="tooltip" data-placement="top" title="" name="confirm_item" data-original-title="Un-confirm"><span class="badge badge-success" style="cursor:pointer">Yes</span></a></td>
                                <td>Executive, User</td>
                                <td>N/A</td>
                                <td>None</td>
                                <td>2 months ago</td>
                                <td>
    	<div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
		  <a href="http://finovics.com/admin/auth/user/3" class="btn btn-info"><svg class="svg-inline--fa fa-eye fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-5" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="View"><title id="svg-inline--fa-title-5">View</title><path fill="currentColor" d="M569.354 231.631C512.969 135.949 407.81 72 288 72 168.14 72 63.004 135.994 6.646 231.631a47.999 47.999 0 0 0 0 48.739C63.031 376.051 168.19 440 288 440c119.86 0 224.996-63.994 281.354-159.631a47.997 47.997 0 0 0 0-48.738zM288 392c-75.162 0-136-60.827-136-136 0-75.162 60.826-136 136-136 75.162 0 136 60.826 136 136 0 75.162-60.826 136-136 136zm104-136c0 57.438-46.562 104-104 104s-104-46.562-104-104c0-17.708 4.431-34.379 12.236-48.973l-.001.032c0 23.651 19.173 42.823 42.824 42.823s42.824-19.173 42.824-42.823c0-23.651-19.173-42.824-42.824-42.824l-.032.001C253.621 156.431 270.292 152 288 152c57.438 0 104 46.562 104 104z"></path></svg><!-- <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="View"></i> --></a>
		  <a href="http://finovics.com/admin/auth/user/3/edit" class="btn btn-primary"><svg class="svg-inline--fa fa-edit fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-6" data-prefix="fas" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="Edit"><title id="svg-inline--fa-title-6">Edit</title><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg><!-- <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> --></a>

		  <div class="btn-group" role="group">
			<button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  More
			</button>
			<div class="dropdown-menu" aria-labelledby="userActions">

			  <a href="http://finovics.com/admin/auth/user/3/login-as" class="dropdown-item">Login As Oscar Lewis</a>
			  <a href="http://finovics.com/admin/auth/user/3/password/change" class="dropdown-item">Change Password</a>
			  <a href="http://finovics.com/admin/auth/user/3/mark/0" class="dropdown-item">Deactivate</a>

			  <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="dropdown-item" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();">Delete
<form action="http://finovics.com/admin/auth/user/3" method="POST" name="delete_item" style="display:none">
<input type="hidden" name="_method" value="delete">
<input type="hidden" name="_token" value="0Z3jLe9x1bYs4JCG8CT9uWaWjUnAj0ovFMie0HuS">
</form>
</a>
			</div>
		  </div>
		</div></td>
                            </tr>
                                                    <tr>
                                <td>Anderson</td>
                                <td>Arnold</td>
                                <td>afoj786@gmail.com</td>
                                <td><a href="http://finovics.com/admin/auth/user/14/unconfirm" data-toggle="tooltip" data-placement="top" title="" name="confirm_item" data-original-title="Un-confirm"><span class="badge badge-success" style="cursor:pointer">Yes</span></a></td>
                                <td>Executive</td>
                                <td>N/A</td>
                                <td>None</td>
                                <td>1 month ago</td>
                                <td>
    	<div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
		  <a href="http://finovics.com/admin/auth/user/14" class="btn btn-info"><svg class="svg-inline--fa fa-eye fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-7" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="View"><title id="svg-inline--fa-title-7">View</title><path fill="currentColor" d="M569.354 231.631C512.969 135.949 407.81 72 288 72 168.14 72 63.004 135.994 6.646 231.631a47.999 47.999 0 0 0 0 48.739C63.031 376.051 168.19 440 288 440c119.86 0 224.996-63.994 281.354-159.631a47.997 47.997 0 0 0 0-48.738zM288 392c-75.162 0-136-60.827-136-136 0-75.162 60.826-136 136-136 75.162 0 136 60.826 136 136 0 75.162-60.826 136-136 136zm104-136c0 57.438-46.562 104-104 104s-104-46.562-104-104c0-17.708 4.431-34.379 12.236-48.973l-.001.032c0 23.651 19.173 42.823 42.824 42.823s42.824-19.173 42.824-42.823c0-23.651-19.173-42.824-42.824-42.824l-.032.001C253.621 156.431 270.292 152 288 152c57.438 0 104 46.562 104 104z"></path></svg><!-- <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="View"></i> --></a>
		  <a href="http://finovics.com/admin/auth/user/14/edit" class="btn btn-primary"><svg class="svg-inline--fa fa-edit fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-8" data-prefix="fas" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="Edit"><title id="svg-inline--fa-title-8">Edit</title><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg><!-- <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> --></a>

		  <div class="btn-group" role="group">
			<button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  More
			</button>
			<div class="dropdown-menu" aria-labelledby="userActions">

			  <a href="http://finovics.com/admin/auth/user/14/login-as" class="dropdown-item">Login As Arnold Anderson</a>
			  <a href="http://finovics.com/admin/auth/user/14/password/change" class="dropdown-item">Change Password</a>
			  <a href="http://finovics.com/admin/auth/user/14/mark/0" class="dropdown-item">Deactivate</a>

			  <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="dropdown-item" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();">Delete
<form action="http://finovics.com/admin/auth/user/14" method="POST" name="delete_item" style="display:none">
<input type="hidden" name="_method" value="delete">
<input type="hidden" name="_token" value="0Z3jLe9x1bYs4JCG8CT9uWaWjUnAj0ovFMie0HuS">
</form>
</a>
			</div>
		  </div>
		</div></td>
                            </tr>
                                                    <tr>
                                <td>Dilwala</td>
                                <td>Paul</td>
                                <td>pramodsahswe@gmail.com</td>
                                <td><a href="http://finovics.com/admin/auth/user/15/unconfirm" data-toggle="tooltip" data-placement="top" title="" name="confirm_item" data-original-title="Un-confirm"><span class="badge badge-success" style="cursor:pointer">Yes</span></a></td>
                                <td>Executive, User</td>
                                <td>N/A</td>
                                <td>None</td>
                                <td>1 month ago</td>
                                <td>
    	<div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
		  <a href="http://finovics.com/admin/auth/user/15" class="btn btn-info"><svg class="svg-inline--fa fa-eye fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-9" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="View"><title id="svg-inline--fa-title-9">View</title><path fill="currentColor" d="M569.354 231.631C512.969 135.949 407.81 72 288 72 168.14 72 63.004 135.994 6.646 231.631a47.999 47.999 0 0 0 0 48.739C63.031 376.051 168.19 440 288 440c119.86 0 224.996-63.994 281.354-159.631a47.997 47.997 0 0 0 0-48.738zM288 392c-75.162 0-136-60.827-136-136 0-75.162 60.826-136 136-136 75.162 0 136 60.826 136 136 0 75.162-60.826 136-136 136zm104-136c0 57.438-46.562 104-104 104s-104-46.562-104-104c0-17.708 4.431-34.379 12.236-48.973l-.001.032c0 23.651 19.173 42.823 42.824 42.823s42.824-19.173 42.824-42.823c0-23.651-19.173-42.824-42.824-42.824l-.032.001C253.621 156.431 270.292 152 288 152c57.438 0 104 46.562 104 104z"></path></svg><!-- <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="View"></i> --></a>
		  <a href="http://finovics.com/admin/auth/user/15/edit" class="btn btn-primary"><svg class="svg-inline--fa fa-edit fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-10" data-prefix="fas" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="Edit"><title id="svg-inline--fa-title-10">Edit</title><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg><!-- <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> --></a>

		  <div class="btn-group" role="group">
			<button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  More
			</button>
			<div class="dropdown-menu" aria-labelledby="userActions">

			  <a href="http://finovics.com/admin/auth/user/15/login-as" class="dropdown-item">Login As Paul Dilwala</a>
			  <a href="http://finovics.com/admin/auth/user/15/password/change" class="dropdown-item">Change Password</a>
			  <a href="http://finovics.com/admin/auth/user/15/mark/0" class="dropdown-item">Deactivate</a>

			  <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="dropdown-item" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();">Delete
<form action="http://finovics.com/admin/auth/user/15" method="POST" name="delete_item" style="display:none">
<input type="hidden" name="_method" value="delete">
<input type="hidden" name="_token" value="0Z3jLe9x1bYs4JCG8CT9uWaWjUnAj0ovFMie0HuS">
</form>
</a>
			</div>
		  </div>
		</div></td>
                            </tr>
                                                    <tr>
                                <td>Kaur</td>
                                <td>Chanpreet</td>
                                <td>chanpreetkaur2@gmail.com</td>
                                <td><a href="http://finovics.com/admin/auth/user/16/unconfirm" data-toggle="tooltip" data-placement="top" title="" name="confirm_item" data-original-title="Un-confirm"><span class="badge badge-success" style="cursor:pointer">Yes</span></a></td>
                                <td>Executive, User</td>
                                <td>N/A</td>
                                <td>None</td>
                                <td>17 hours ago</td>
                                <td>
    	<div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
		  <a href="http://finovics.com/admin/auth/user/16" class="btn btn-info"><svg class="svg-inline--fa fa-eye fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-11" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="View"><title id="svg-inline--fa-title-11">View</title><path fill="currentColor" d="M569.354 231.631C512.969 135.949 407.81 72 288 72 168.14 72 63.004 135.994 6.646 231.631a47.999 47.999 0 0 0 0 48.739C63.031 376.051 168.19 440 288 440c119.86 0 224.996-63.994 281.354-159.631a47.997 47.997 0 0 0 0-48.738zM288 392c-75.162 0-136-60.827-136-136 0-75.162 60.826-136 136-136 75.162 0 136 60.826 136 136 0 75.162-60.826 136-136 136zm104-136c0 57.438-46.562 104-104 104s-104-46.562-104-104c0-17.708 4.431-34.379 12.236-48.973l-.001.032c0 23.651 19.173 42.823 42.824 42.823s42.824-19.173 42.824-42.823c0-23.651-19.173-42.824-42.824-42.824l-.032.001C253.621 156.431 270.292 152 288 152c57.438 0 104 46.562 104 104z"></path></svg><!-- <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="View"></i> --></a>
		  <a href="http://finovics.com/admin/auth/user/16/edit" class="btn btn-primary"><svg class="svg-inline--fa fa-edit fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-12" data-prefix="fas" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="Edit"><title id="svg-inline--fa-title-12">Edit</title><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg><!-- <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> --></a>

		  <div class="btn-group" role="group">
			<button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  More
			</button>
			<div class="dropdown-menu" aria-labelledby="userActions">

			  <a href="http://finovics.com/admin/auth/user/16/login-as" class="dropdown-item">Login As Chanpreet Kaur</a>
			  <a href="http://finovics.com/admin/auth/user/16/password/change" class="dropdown-item">Change Password</a>
			  <a href="http://finovics.com/admin/auth/user/16/mark/0" class="dropdown-item">Deactivate</a>

			  <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="dropdown-item" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();">Delete
<form action="http://finovics.com/admin/auth/user/16" method="POST" name="delete_item" style="display:none">
<input type="hidden" name="_method" value="delete">
<input type="hidden" name="_token" value="0Z3jLe9x1bYs4JCG8CT9uWaWjUnAj0ovFMie0HuS">
</form>
</a>
			</div>
		  </div>
		</div></td>
                            </tr>
                                                    <tr>
                                <td>Kumar</td>
                                <td>Mohit</td>
                                <td>mohitkwatra85@gmail.com</td>
                                <td><a href="http://finovics.com/admin/auth/user/17/unconfirm" data-toggle="tooltip" data-placement="top" title="" name="confirm_item" data-original-title="Un-confirm"><span class="badge badge-success" style="cursor:pointer">Yes</span></a></td>
                                <td>Executive, User</td>
                                <td>View Backend</td>
                                <td>None</td>
                                <td>1 month ago</td>
                                <td>
    	<div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
		  <a href="http://finovics.com/admin/auth/user/17" class="btn btn-info"><svg class="svg-inline--fa fa-eye fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-13" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="View"><title id="svg-inline--fa-title-13">View</title><path fill="currentColor" d="M569.354 231.631C512.969 135.949 407.81 72 288 72 168.14 72 63.004 135.994 6.646 231.631a47.999 47.999 0 0 0 0 48.739C63.031 376.051 168.19 440 288 440c119.86 0 224.996-63.994 281.354-159.631a47.997 47.997 0 0 0 0-48.738zM288 392c-75.162 0-136-60.827-136-136 0-75.162 60.826-136 136-136 75.162 0 136 60.826 136 136 0 75.162-60.826 136-136 136zm104-136c0 57.438-46.562 104-104 104s-104-46.562-104-104c0-17.708 4.431-34.379 12.236-48.973l-.001.032c0 23.651 19.173 42.823 42.824 42.823s42.824-19.173 42.824-42.823c0-23.651-19.173-42.824-42.824-42.824l-.032.001C253.621 156.431 270.292 152 288 152c57.438 0 104 46.562 104 104z"></path></svg><!-- <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="View"></i> --></a>
		  <a href="http://finovics.com/admin/auth/user/17/edit" class="btn btn-primary"><svg class="svg-inline--fa fa-edit fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-14" data-prefix="fas" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="Edit"><title id="svg-inline--fa-title-14">Edit</title><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg><!-- <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> --></a>

		  <div class="btn-group" role="group">
			<button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  More
			</button>
			<div class="dropdown-menu" aria-labelledby="userActions">

			  <a href="http://finovics.com/admin/auth/user/17/login-as" class="dropdown-item">Login As Mohit Kumar</a>
			  <a href="http://finovics.com/admin/auth/user/17/password/change" class="dropdown-item">Change Password</a>
			  <a href="http://finovics.com/admin/auth/user/17/mark/0" class="dropdown-item">Deactivate</a>

			  <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="dropdown-item" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();">Delete
<form action="http://finovics.com/admin/auth/user/17" method="POST" name="delete_item" style="display:none">
<input type="hidden" name="_method" value="delete">
<input type="hidden" name="_token" value="0Z3jLe9x1bYs4JCG8CT9uWaWjUnAj0ovFMie0HuS">
</form>
</a>
			</div>
		  </div>
		</div></td>
                            </tr>
                                                    <tr>
                                <td>Chawla</td>
                                <td>Mohit</td>
                                <td>mohit.chawla15@gmail.com</td>
                                <td><a href="http://finovics.com/admin/auth/user/18/unconfirm" data-toggle="tooltip" data-placement="top" title="" name="confirm_item" data-original-title="Un-confirm"><span class="badge badge-success" style="cursor:pointer">Yes</span></a></td>
                                <td>Executive, User</td>
                                <td>View Backend</td>
                                <td>None</td>
                                <td>1 month ago</td>
                                <td>
    	<div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
		  <a href="http://finovics.com/admin/auth/user/18" class="btn btn-info"><svg class="svg-inline--fa fa-eye fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-15" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="View"><title id="svg-inline--fa-title-15">View</title><path fill="currentColor" d="M569.354 231.631C512.969 135.949 407.81 72 288 72 168.14 72 63.004 135.994 6.646 231.631a47.999 47.999 0 0 0 0 48.739C63.031 376.051 168.19 440 288 440c119.86 0 224.996-63.994 281.354-159.631a47.997 47.997 0 0 0 0-48.738zM288 392c-75.162 0-136-60.827-136-136 0-75.162 60.826-136 136-136 75.162 0 136 60.826 136 136 0 75.162-60.826 136-136 136zm104-136c0 57.438-46.562 104-104 104s-104-46.562-104-104c0-17.708 4.431-34.379 12.236-48.973l-.001.032c0 23.651 19.173 42.823 42.824 42.823s42.824-19.173 42.824-42.823c0-23.651-19.173-42.824-42.824-42.824l-.032.001C253.621 156.431 270.292 152 288 152c57.438 0 104 46.562 104 104z"></path></svg><!-- <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="View"></i> --></a>
		  <a href="http://finovics.com/admin/auth/user/18/edit" class="btn btn-primary"><svg class="svg-inline--fa fa-edit fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-16" data-prefix="fas" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="Edit"><title id="svg-inline--fa-title-16">Edit</title><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg><!-- <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> --></a>

		  <div class="btn-group" role="group">
			<button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  More
			</button>
			<div class="dropdown-menu" aria-labelledby="userActions">

			  <a href="http://finovics.com/admin/auth/user/18/login-as" class="dropdown-item">Login As Mohit Chawla</a>
			  <a href="http://finovics.com/admin/auth/user/18/password/change" class="dropdown-item">Change Password</a>
			  <a href="http://finovics.com/admin/auth/user/18/mark/0" class="dropdown-item">Deactivate</a>

			  <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="dropdown-item" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();">Delete
<form action="http://finovics.com/admin/auth/user/18" method="POST" name="delete_item" style="display:none">
<input type="hidden" name="_method" value="delete">
<input type="hidden" name="_token" value="0Z3jLe9x1bYs4JCG8CT9uWaWjUnAj0ovFMie0HuS">
</form>
</a>
			</div>
		  </div>
		</div></td>
                            </tr>
                                                    <tr>
                                <td>Nigam</td>
                                <td>Sushant</td>
                                <td>lovemydelhi@gmail.com</td>
                                <td><a href="http://finovics.com/admin/auth/user/19/unconfirm" data-toggle="tooltip" data-placement="top" title="" name="confirm_item" data-original-title="Un-confirm"><span class="badge badge-success" style="cursor:pointer">Yes</span></a></td>
                                <td>Executive, User</td>
                                <td>View Backend</td>
                                <td>None</td>
                                <td>1 month ago</td>
                                <td>
    	<div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
		  <a href="http://finovics.com/admin/auth/user/19" class="btn btn-info"><svg class="svg-inline--fa fa-eye fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-17" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="View"><title id="svg-inline--fa-title-17">View</title><path fill="currentColor" d="M569.354 231.631C512.969 135.949 407.81 72 288 72 168.14 72 63.004 135.994 6.646 231.631a47.999 47.999 0 0 0 0 48.739C63.031 376.051 168.19 440 288 440c119.86 0 224.996-63.994 281.354-159.631a47.997 47.997 0 0 0 0-48.738zM288 392c-75.162 0-136-60.827-136-136 0-75.162 60.826-136 136-136 75.162 0 136 60.826 136 136 0 75.162-60.826 136-136 136zm104-136c0 57.438-46.562 104-104 104s-104-46.562-104-104c0-17.708 4.431-34.379 12.236-48.973l-.001.032c0 23.651 19.173 42.823 42.824 42.823s42.824-19.173 42.824-42.823c0-23.651-19.173-42.824-42.824-42.824l-.032.001C253.621 156.431 270.292 152 288 152c57.438 0 104 46.562 104 104z"></path></svg><!-- <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="View"></i> --></a>
		  <a href="http://finovics.com/admin/auth/user/19/edit" class="btn btn-primary"><svg class="svg-inline--fa fa-edit fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-18" data-prefix="fas" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="Edit"><title id="svg-inline--fa-title-18">Edit</title><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg><!-- <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> --></a>

		  <div class="btn-group" role="group">
			<button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  More
			</button>
			<div class="dropdown-menu" aria-labelledby="userActions">

			  <a href="http://finovics.com/admin/auth/user/19/login-as" class="dropdown-item">Login As Sushant Nigam</a>
			  <a href="http://finovics.com/admin/auth/user/19/password/change" class="dropdown-item">Change Password</a>
			  <a href="http://finovics.com/admin/auth/user/19/mark/0" class="dropdown-item">Deactivate</a>

			  <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="dropdown-item" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();">Delete
<form action="http://finovics.com/admin/auth/user/19" method="POST" name="delete_item" style="display:none">
<input type="hidden" name="_method" value="delete">
<input type="hidden" name="_token" value="0Z3jLe9x1bYs4JCG8CT9uWaWjUnAj0ovFMie0HuS">
</form>
</a>
			</div>
		  </div>
		</div></td>
                            </tr>
                                                    <tr>
                                <td>Test</td>
                                <td>Test</td>
                                <td>test@finovics.com</td>
                                <td><a href="http://finovics.com/admin/auth/user/21/unconfirm" data-toggle="tooltip" data-placement="top" title="" name="confirm_item" data-original-title="Un-confirm"><span class="badge badge-success" style="cursor:pointer">Yes</span></a></td>
                                <td>User</td>
                                <td>N/A</td>
                                <td>None</td>
                                <td>2 months ago</td>
                                <td>
    	<div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
		  <a href="http://finovics.com/admin/auth/user/21" class="btn btn-info"><svg class="svg-inline--fa fa-eye fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-19" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="View"><title id="svg-inline--fa-title-19">View</title><path fill="currentColor" d="M569.354 231.631C512.969 135.949 407.81 72 288 72 168.14 72 63.004 135.994 6.646 231.631a47.999 47.999 0 0 0 0 48.739C63.031 376.051 168.19 440 288 440c119.86 0 224.996-63.994 281.354-159.631a47.997 47.997 0 0 0 0-48.738zM288 392c-75.162 0-136-60.827-136-136 0-75.162 60.826-136 136-136 75.162 0 136 60.826 136 136 0 75.162-60.826 136-136 136zm104-136c0 57.438-46.562 104-104 104s-104-46.562-104-104c0-17.708 4.431-34.379 12.236-48.973l-.001.032c0 23.651 19.173 42.823 42.824 42.823s42.824-19.173 42.824-42.823c0-23.651-19.173-42.824-42.824-42.824l-.032.001C253.621 156.431 270.292 152 288 152c57.438 0 104 46.562 104 104z"></path></svg><!-- <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="View"></i> --></a>
		  <a href="http://finovics.com/admin/auth/user/21/edit" class="btn btn-primary"><svg class="svg-inline--fa fa-edit fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-20" data-prefix="fas" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="Edit"><title id="svg-inline--fa-title-20">Edit</title><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg><!-- <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> --></a>

		  <div class="btn-group" role="group">
			<button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  More
			</button>
			<div class="dropdown-menu" aria-labelledby="userActions">

			  <a href="http://finovics.com/admin/auth/user/21/login-as" class="dropdown-item">Login As Test Test</a>
			  <a href="http://finovics.com/admin/auth/user/21/password/change" class="dropdown-item">Change Password</a>
			  <a href="http://finovics.com/admin/auth/user/21/mark/0" class="dropdown-item">Deactivate</a>

			  <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="dropdown-item" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();">Delete
<form action="http://finovics.com/admin/auth/user/21" method="POST" name="delete_item" style="display:none">
<input type="hidden" name="_method" value="delete">
<input type="hidden" name="_token" value="0Z3jLe9x1bYs4JCG8CT9uWaWjUnAj0ovFMie0HuS">
</form>
</a>
			</div>
		  </div>
		</div></td>
                            </tr>
                                                    <tr>
                                <td>Pandey</td>
                                <td>Gaurav</td>
                                <td>gauravakg10@gmail.com</td>
                                <td><a href="http://finovics.com/admin/auth/user/22/unconfirm" data-toggle="tooltip" data-placement="top" title="" name="confirm_item" data-original-title="Un-confirm"><span class="badge badge-success" style="cursor:pointer">Yes</span></a></td>
                                <td>Executive, User</td>
                                <td>View Backend</td>
                                <td>None</td>
                                <td>1 month ago</td>
                                <td>
    	<div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
		  <a href="http://finovics.com/admin/auth/user/22" class="btn btn-info"><svg class="svg-inline--fa fa-eye fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-21" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="View"><title id="svg-inline--fa-title-21">View</title><path fill="currentColor" d="M569.354 231.631C512.969 135.949 407.81 72 288 72 168.14 72 63.004 135.994 6.646 231.631a47.999 47.999 0 0 0 0 48.739C63.031 376.051 168.19 440 288 440c119.86 0 224.996-63.994 281.354-159.631a47.997 47.997 0 0 0 0-48.738zM288 392c-75.162 0-136-60.827-136-136 0-75.162 60.826-136 136-136 75.162 0 136 60.826 136 136 0 75.162-60.826 136-136 136zm104-136c0 57.438-46.562 104-104 104s-104-46.562-104-104c0-17.708 4.431-34.379 12.236-48.973l-.001.032c0 23.651 19.173 42.823 42.824 42.823s42.824-19.173 42.824-42.823c0-23.651-19.173-42.824-42.824-42.824l-.032.001C253.621 156.431 270.292 152 288 152c57.438 0 104 46.562 104 104z"></path></svg><!-- <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="View"></i> --></a>
		  <a href="http://finovics.com/admin/auth/user/22/edit" class="btn btn-primary"><svg class="svg-inline--fa fa-edit fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-22" data-prefix="fas" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="Edit"><title id="svg-inline--fa-title-22">Edit</title><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg><!-- <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> --></a>

		  <div class="btn-group" role="group">
			<button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  More
			</button>
			<div class="dropdown-menu" aria-labelledby="userActions">

			  <a href="http://finovics.com/admin/auth/user/22/login-as" class="dropdown-item">Login As Gaurav Pandey</a>
			  <a href="http://finovics.com/admin/auth/user/22/password/change" class="dropdown-item">Change Password</a>
			  <a href="http://finovics.com/admin/auth/user/22/mark/0" class="dropdown-item">Deactivate</a>

			  <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="dropdown-item" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();">Delete
<form action="http://finovics.com/admin/auth/user/22" method="POST" name="delete_item" style="display:none">
<input type="hidden" name="_method" value="delete">
<input type="hidden" name="_token" value="0Z3jLe9x1bYs4JCG8CT9uWaWjUnAj0ovFMie0HuS">
</form>
</a>
			</div>
		  </div>
		</div></td>
                            </tr>
                                                    <tr>
                                <td>Kumar Mishra</td>
                                <td>Anand</td>
                                <td>code.anandmishra@gmail.com</td>
                                <td><a href="http://finovics.com/admin/auth/user/23/unconfirm" data-toggle="tooltip" data-placement="top" title="" name="confirm_item" data-original-title="Un-confirm"><span class="badge badge-success" style="cursor:pointer">Yes</span></a></td>
                                <td>Executive, User</td>
                                <td>View Backend</td>
                                <td>None</td>
                                <td>1 month ago</td>
                                <td>
    	<div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
		  <a href="http://finovics.com/admin/auth/user/23" class="btn btn-info"><svg class="svg-inline--fa fa-eye fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-23" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="View"><title id="svg-inline--fa-title-23">View</title><path fill="currentColor" d="M569.354 231.631C512.969 135.949 407.81 72 288 72 168.14 72 63.004 135.994 6.646 231.631a47.999 47.999 0 0 0 0 48.739C63.031 376.051 168.19 440 288 440c119.86 0 224.996-63.994 281.354-159.631a47.997 47.997 0 0 0 0-48.738zM288 392c-75.162 0-136-60.827-136-136 0-75.162 60.826-136 136-136 75.162 0 136 60.826 136 136 0 75.162-60.826 136-136 136zm104-136c0 57.438-46.562 104-104 104s-104-46.562-104-104c0-17.708 4.431-34.379 12.236-48.973l-.001.032c0 23.651 19.173 42.823 42.824 42.823s42.824-19.173 42.824-42.823c0-23.651-19.173-42.824-42.824-42.824l-.032.001C253.621 156.431 270.292 152 288 152c57.438 0 104 46.562 104 104z"></path></svg><!-- <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="View"></i> --></a>
		  <a href="http://finovics.com/admin/auth/user/23/edit" class="btn btn-primary"><svg class="svg-inline--fa fa-edit fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-24" data-prefix="fas" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="Edit"><title id="svg-inline--fa-title-24">Edit</title><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg><!-- <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> --></a>

		  <div class="btn-group" role="group">
			<button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  More
			</button>
			<div class="dropdown-menu" aria-labelledby="userActions">

			  <a href="http://finovics.com/admin/auth/user/23/login-as" class="dropdown-item">Login As Anand Kumar Mishra</a>
			  <a href="http://finovics.com/admin/auth/user/23/password/change" class="dropdown-item">Change Password</a>
			  <a href="http://finovics.com/admin/auth/user/23/mark/0" class="dropdown-item">Deactivate</a>

			  <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="dropdown-item" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();">Delete
<form action="http://finovics.com/admin/auth/user/23" method="POST" name="delete_item" style="display:none">
<input type="hidden" name="_method" value="delete">
<input type="hidden" name="_token" value="0Z3jLe9x1bYs4JCG8CT9uWaWjUnAj0ovFMie0HuS">
</form>
</a>
			</div>
		  </div>
		</div></td>
                            </tr>
                                                    <tr>
                                <td>Chand</td>
                                <td>Poonam</td>
                                <td>poonamchand9989@gmail.com</td>
                                <td><a href="http://finovics.com/admin/auth/user/24/unconfirm" data-toggle="tooltip" data-placement="top" title="" name="confirm_item" data-original-title="Un-confirm"><span class="badge badge-success" style="cursor:pointer">Yes</span></a></td>
                                <td>Executive, User</td>
                                <td>View Backend</td>
                                <td>None</td>
                                <td>1 month ago</td>
                                <td>
    	<div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
		  <a href="http://finovics.com/admin/auth/user/24" class="btn btn-info"><svg class="svg-inline--fa fa-eye fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-25" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="View"><title id="svg-inline--fa-title-25">View</title><path fill="currentColor" d="M569.354 231.631C512.969 135.949 407.81 72 288 72 168.14 72 63.004 135.994 6.646 231.631a47.999 47.999 0 0 0 0 48.739C63.031 376.051 168.19 440 288 440c119.86 0 224.996-63.994 281.354-159.631a47.997 47.997 0 0 0 0-48.738zM288 392c-75.162 0-136-60.827-136-136 0-75.162 60.826-136 136-136 75.162 0 136 60.826 136 136 0 75.162-60.826 136-136 136zm104-136c0 57.438-46.562 104-104 104s-104-46.562-104-104c0-17.708 4.431-34.379 12.236-48.973l-.001.032c0 23.651 19.173 42.823 42.824 42.823s42.824-19.173 42.824-42.823c0-23.651-19.173-42.824-42.824-42.824l-.032.001C253.621 156.431 270.292 152 288 152c57.438 0 104 46.562 104 104z"></path></svg><!-- <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="View"></i> --></a>
		  <a href="http://finovics.com/admin/auth/user/24/edit" class="btn btn-primary"><svg class="svg-inline--fa fa-edit fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-26" data-prefix="fas" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="Edit"><title id="svg-inline--fa-title-26">Edit</title><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg><!-- <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> --></a>

		  <div class="btn-group" role="group">
			<button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  More
			</button>
			<div class="dropdown-menu" aria-labelledby="userActions">

			  <a href="http://finovics.com/admin/auth/user/24/login-as" class="dropdown-item">Login As Poonam Chand</a>
			  <a href="http://finovics.com/admin/auth/user/24/password/change" class="dropdown-item">Change Password</a>
			  <a href="http://finovics.com/admin/auth/user/24/mark/0" class="dropdown-item">Deactivate</a>

			  <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="dropdown-item" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();">Delete
<form action="http://finovics.com/admin/auth/user/24" method="POST" name="delete_item" style="display:none">
<input type="hidden" name="_method" value="delete">
<input type="hidden" name="_token" value="0Z3jLe9x1bYs4JCG8CT9uWaWjUnAj0ovFMie0HuS">
</form>
</a>
			</div>
		  </div>
		</div></td>
                            </tr>
                                                    <tr>
                                <td>Sahu</td>
                                <td>Ajay</td>
                                <td>ajaysahu111@gmail.com</td>
                                <td><a href="http://finovics.com/admin/auth/user/25/unconfirm" data-toggle="tooltip" data-placement="top" title="" name="confirm_item" data-original-title="Un-confirm"><span class="badge badge-success" style="cursor:pointer">Yes</span></a></td>
                                <td>Executive, User</td>
                                <td>View Backend</td>
                                <td>None</td>
                                <td>1 month ago</td>
                                <td>
    	<div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
		  <a href="http://finovics.com/admin/auth/user/25" class="btn btn-info"><svg class="svg-inline--fa fa-eye fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-27" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="View"><title id="svg-inline--fa-title-27">View</title><path fill="currentColor" d="M569.354 231.631C512.969 135.949 407.81 72 288 72 168.14 72 63.004 135.994 6.646 231.631a47.999 47.999 0 0 0 0 48.739C63.031 376.051 168.19 440 288 440c119.86 0 224.996-63.994 281.354-159.631a47.997 47.997 0 0 0 0-48.738zM288 392c-75.162 0-136-60.827-136-136 0-75.162 60.826-136 136-136 75.162 0 136 60.826 136 136 0 75.162-60.826 136-136 136zm104-136c0 57.438-46.562 104-104 104s-104-46.562-104-104c0-17.708 4.431-34.379 12.236-48.973l-.001.032c0 23.651 19.173 42.823 42.824 42.823s42.824-19.173 42.824-42.823c0-23.651-19.173-42.824-42.824-42.824l-.032.001C253.621 156.431 270.292 152 288 152c57.438 0 104 46.562 104 104z"></path></svg><!-- <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="View"></i> --></a>
		  <a href="http://finovics.com/admin/auth/user/25/edit" class="btn btn-primary"><svg class="svg-inline--fa fa-edit fa-w-18" data-toggle="tooltip" data-placement="top" title="" aria-labelledby="svg-inline--fa-title-28" data-prefix="fas" data-icon="edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" data-original-title="Edit"><title id="svg-inline--fa-title-28">Edit</title><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"></path></svg><!-- <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> --></a>

		  <div class="btn-group" role="group">
			<button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  More
			</button>
			<div class="dropdown-menu" aria-labelledby="userActions">

			  <a href="http://finovics.com/admin/auth/user/25/login-as" class="dropdown-item">Login As Ajay Sahu</a>
			  <a href="http://finovics.com/admin/auth/user/25/password/change" class="dropdown-item">Change Password</a>
			  <a href="http://finovics.com/admin/auth/user/25/mark/0" class="dropdown-item">Deactivate</a>

			  <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="dropdown-item" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();">Delete
<form action="http://finovics.com/admin/auth/user/25" method="POST" name="delete_item" style="display:none">
<input type="hidden" name="_method" value="delete">
<input type="hidden" name="_token" value="0Z3jLe9x1bYs4JCG8CT9uWaWjUnAj0ovFMie0HuS">
</form>
</a>
			</div>
		  </div>
		</div></td>
                            </tr>
                                                </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    14 users total
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
<link href="http://finovics.com/css/backend.css?111" rel="stylesheet">
