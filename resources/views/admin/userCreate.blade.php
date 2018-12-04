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

      {!! Form::open(array('route' => 'users.store', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
      {!! csrf_field() !!}
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


                <div class="container">
                   <div class="row">
                       <div class="col-12">
                           @include('admin.partials.form-status')
                       </div>
                   </div>
               </div>

                <hr>
                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label required-field" for="first_name">First Name</label>

                            <div class="col-md-10">

                                {!! Form::text('first_name', NULL, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => 'First Name', 'required'=>"true", 'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">Last Name</label>

                            <div class="col-md-10">
                                <!--<input class="form-control" type="text" name="name" id="name" placeholder="Name" maxlength="191" required="" autofocus=""> -->
                                {!! Form::text('last_name', NULL, array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => 'Last Name',  'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">Street Address</label>

                            <div class="col-md-10">

                                {!! Form::text('address', NULL, array('id' => 'address', 'class' => 'form-control', 'placeholder' => 'Street Address', 'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label required-field" for="first_name">City</label>

                            <div class="col-md-10">
                                <!--<input class="form-control" type="text" name="name" id="name" placeholder="Name" maxlength="191" required="" autofocus=""> -->
                                {!! Form::text('city', NULL, array('id' => 'city', 'class' => 'form-control', 'placeholder' => 'City',  'autofocus'=> "" , 'required'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label required-field" for="country">Country</label>

                            <div class="col-md-10">
                              <select class="custom-select form-control required" name="country" id="country">
                                          <!--<option value="">Select Country</option>-->
                                          <option value="1" >India</option>
                               </select>

                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">Birthday</label>
                            <div class="col-md-10">
                                <select class="custom-select form-control required" name="day" id="day" style="width: 10%;">
                                            <option value="">Day</option>
                                            @for ($i = 1; $i <= 31; $i++)
                                                <option value="{{ sprintf('%02d', $i) }}">{{ sprintf('%02d', $i) }}</option>
                                            @endfor
                                 </select> /
                                 <select class="custom-select form-control required" name="month" id="month"  style="width: 10%;" >
                                             <option value="">Month</option>
                                             @for ($i = 1; $i <= 12; $i++)
                                                 <option value="{{ sprintf('%02d', $i) }}">{{ sprintf('%02d', $i) }}</option>
                                             @endfor
                                  </select> /

                                  <select class="custom-select form-control required" name="year" id="year"  style="width: 10%;" >
                                              <option value="">Year</option>
                                              @for ($i = 2018; $i >1950; $i--)
                                                  <option value="{{ sprintf('%02d', $i) }}">{{ sprintf('%02d', $i) }}</option>
                                              @endfor
                                   </select>
                            </div><!--col-->
                        </div><!--form-group-->


                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">Phone No.</label>

                            <div class="col-md-10">
                                {!! Form::text('phone', NULL, array('id' => 'phone', 'class' => 'form-control', 'placeholder' => 'Phone', 'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="email">Email Id</label>

                            <div class="col-md-10">
                                {!! Form::text('email', NULL, array('id' => 'email1', 'class' => 'form-control', 'placeholder' => 'Email Id', 'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->


                          <div class="form-group row">
                              <label class="col-md-2 form-control-label required-field" for="password">Password</label>
                              <div class="col-md-10">
                                  {!! Form::password('password', array('id' => 'password', 'class' => 'form-control ', 'placeholder' => 'Password', 'required'=> '', 'pattern'=>".{5,10}", 'title'=>"6 to 15 characters")) !!}

                              </div><!--col-->
                          </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label required-field" for="password_confirmation">Password Confirmation</label>

                            <div class="col-md-10">
                                {!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control required', 'placeholder' => 'Password Confirmation' , 'required'=> '', 'pattern'=>".{5,10}", 'title'=>"6 to 15 characters")) !!}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label required-field" for="password">PIN</label>

                            <div class="col-md-10">

                                {!! Form::password('pin', array('id' => 'pin', 'class' => 'form-control ', 'maxlength' => '4', 'onkeypress'=>'validate(event)' ,'placeholder' => 'PIN', 'required'=> '')) !!}

                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label required-field" for="first_name">Role</label>

                            <div class="col-md-10">
                                <select class="custom-select form-control" name="role" id="role">
                                            <option value="">Select User Role</option>
                                            @if ($roles)
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}" >{{ $role->name }}</option>
                                                @endforeach
                                            @endif
                                 </select>

                            </div><!--col-->
                        </div><!--form-group-->


                        <div class="form-group row area-manager" style="display:none;">
                            <label class="col-md-2 form-control-label" for="first_name">Area Manager</label>

                            <div class="col-md-10">
                                <select name="area_manager" id="area_manager" class="custom-select form-control" >
                                    <option value="">Select Area Manager</option>
                                    @if ($amkUsers)
                                        @foreach($amkUsers as $amk)
                                            <option value="{{ $amk->id }}" >{{ $amk->first_name }}({{$amk->uuid}})</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row distributor-manager" style="display:none;">
                            <label class="col-md-2 form-control-label" for="distributor-manager">Distributor Manager</label>

                            <div class="col-md-10">
                                <select name="distributor_manager" id="distributor_manager" class="custom-select form-control" >
                                    <option value="">Select Distributor Manager</option>
                                    @if ($dmkUsers)
                                        @foreach($dmkUsers as $dmk)
                                            <option value="{{ $dmk->id }}" >{{ $dmk->first_name }}({{$dmk->uuid}})</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div><!--col-->
                        </div><!--form-group-->


                        <div class="form-group row">
                            <label class="col-md-2 form-control-label required-field" for="first_name">Comission(%)</label>

                            <div class="col-md-10">
                                {!! Form::number('comission', NULL, array('id' => 'email', 'class' => 'form-control required data-min_max','data-min' =>"0", 'data-max'=>"100", 'data-toggle' => 'just_number', 'onkeypress'=>'validate(event)', 'placeholder' => 'Comission', 'required'=>"", 'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->
                        <div class="form-group row patti"  style="display:none;">
                            <label class="col-md-2 form-control-label" for="patti">Patti(%)</label>
                            <div class="col-md-10">
                                {!! Form::number('patti', NULL, array('id' => 'patti', 'class' => 'form-control required data-min_max', 'data-min' =>"0", 'data-max'=>"100", 'autocomplete'=>"off", 'data-toggle' => 'just_number', 'onkeypress'=>'validate(event)', 'placeholder' => 'Patti', 'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->


                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="active">Active</label>

                            <div class="col-md-10">
                                <label class="switch switch-3d switch-primary">
                                    <input class="switch-input" type="checkbox" name="status" id="active" value="1" checked="">
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
                        <a class="btn btn-danger btn-sm" href="">Cancel</a>
                    </div><!--col-->

                    <div class="col text-right">
                        <button class="btn btn-success btn-sm pull-right" type="submit">Create</button>
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {!! Form::close() !!}
                </div><!--animated-->
            </div>

@endsection
