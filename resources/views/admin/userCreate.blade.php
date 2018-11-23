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

                                            <form class="form-horizontal" method="POST" action="http://finovics.com/admin/auth/user"><input type="hidden" name="_token" value="0Z3jLe9x1bYs4JCG8CT9uWaWjUnAj0ovFMie0HuS">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            User Management
                            <small class="text-muted">Create User</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">Name</label>

                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name" placeholder="Name" maxlength="191" required="" autofocus="">
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">Address</label>

                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name" placeholder="Name" maxlength="191" required="" autofocus="">
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">Phone(s)</label>

                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name" placeholder="Name" maxlength="191" required="" autofocus="">
                            </div><!--col-->
                        </div><!--form-group-->



                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="email">E-mail Address</label>

                            <div class="col-md-10">
                                <input class="form-control" type="email" name="email" id="email" value="" placeholder="E-mail Address" maxlength="191" required="">
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="password">Password</label>

                            <div class="col-md-10">
                                <input class="form-control" type="password" name="password" id="password" placeholder="Password" required="">
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="password_confirmation">Password Confirmation</label>

                            <div class="col-md-10">
                                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation" required="">
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">Comission(%)</label>

                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name" placeholder="Comission" maxlength="191" required="" autofocus="">
                            </div><!--col-->
                        </div><!--form-group-->
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">Patti(%)</label>

                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name" placeholder="Patti" maxlength="191" required="" autofocus="">
                            </div><!--col-->
                        </div><!--form-group-->


                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="active">Active</label>

                            <div class="col-md-10">
                                <label class="switch switch-3d switch-primary">
                                    <input class="switch-input" type="checkbox" name="active" id="active" value="1" checked="">
                                    <span class="switch-label"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </div><!--col-->
                        </div><!--form-group-->

                        <!--
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="confirmation_email">Send Confirmation E-mail<br><small>(If confirmed is off)</small></label>

                            <div class="col-md-10">
                                <label class="switch switch-3d switch-primary">
                                    <input class="switch-input" type="checkbox" name="confirmation_email" id="confirmation_email" value="1" checked="">
                                    <span class="switch-label"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </div>
                        </div>
                      -->


                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        <a class="btn btn-danger btn-sm" href="http://finovics.com/admin/auth/user">Cancel</a>
                    </div><!--col-->

                    <div class="col text-right">
                        <button class="btn btn-success btn-sm pull-right" type="submit">Create</button>
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    </form>
                </div><!--animated-->
            </div>

@endsection
<link href="http://finovics.com/css/backend.css?111" rel="stylesheet">
