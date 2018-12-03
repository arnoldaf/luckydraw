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

       {!! Form::open(array('route' => ['users.update', $user->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation')) !!}
      {!! csrf_field() !!}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            User Management
                            <small class="text-muted">Edit User</small>
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
                            <label class="col-md-2 form-control-label" for="first_name">Name</label>

                            <div class="col-md-10">
                                <!--<input class="form-control" type="text" name="name" id="name" placeholder="Name" maxlength="191" required="" autofocus=""> -->
                                {!! Form::text('first_name', $user->first_name, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => 'First Name', 'required'=>"true", 'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">Last Name</label>

                            <div class="col-md-10">
                                <!--<input class="form-control" type="text" name="name" id="name" placeholder="Name" maxlength="191" required="" autofocus=""> -->
                                {!! Form::text('last_name', $user->last_name, array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => 'Last Name', 'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">Street Address</label>

                            <div class="col-md-10">
                                <!--<input class="form-control" type="text" name="address" id="address" placeholder="Address" maxlength="191" autofocus="">-->
                                {!! Form::text('address', $user->address, array('id' => 'address', 'class' => 'form-control', 'placeholder' => 'Address', 'required'=>"true", 'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->


                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">City</label>

                            <div class="col-md-10">
                                <!--<input class="form-control" type="text" name="name" id="name" placeholder="Name" maxlength="191" required="" autofocus=""> -->
                                {!! Form::text('city', $user->city, array('id' => 'city', 'class' => 'form-control', 'placeholder' => 'City',  'autofocus'=> "" , 'required'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="country">Country</label>

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
                                <!--<input class="form-control" type="text" name="name" id="name" placeholder="Name" maxlength="191" required="" autofocus=""> -->

                                <select class="custom-select form-control required" name="day" id="day" style="width: 10%;" required="true">
                                          <?php
                                            $a = $user->dob;
                                            $day = date('d', strtotime($user->dob));
                                            $month = date('m', strtotime($user->dob));
                                            echo $year = date('Y', strtotime($user->year));
                                          ?>
                                            <option value="">Day</option>
                                            @for ($i = 1; $i <= 31; $i++)
                                                <option value="{{ $i }}"  {{ $i == $day ? 'selected="selected"' : '' }} >{{ $i }}{{$a}}</option>
                                            @endfor
                                 </select> /
                                 <select class="custom-select form-control required" name="month" id="month"  style="width: 10%;" required="true">
                                             <option value="">Month</option>
                                             @for ($i = 1; $i <= 12; $i++)
                                                 <option value="{{ $i }}" {{ $i == $month ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                             @endfor
                                  </select> /

                                  <select class="custom-select form-control required" name="year" id="year"  style="width: 10%;" required="true">
                                              <option value="">Year</option>
                                              @for ($i = 2018; $i >1950; $i--)
                                                  <option value="{{ $i }}" {{ $i == intval($year) ? 'selected="selected"' : '' }}>{{ $i }}{{$year}}</option>
                                              @endfor
                                   </select>
                            </div><!--col-->
                        </div><!--form-group-->



                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">Phone No.</label>

                            <div class="col-md-10">
                                <!--<input class="form-control" type="text" name="phone" id="phone" placeholder="Phone" maxlength="191" autofocus="">-->
                                {!! Form::text('phone', $user->phone, array('id' => 'phone', 'class' => 'form-control', 'placeholder' => 'Phone', 'required'=>"true", 'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="email">E-mail Address</label>

                            <div class="col-md-10">
                                <!--<input class="form-control" type="email" name="email" id="email" value="" placeholder="E-mail Address" maxlength="191">-->
                                {!! Form::text('email', $user->email, array('id' => 'email', 'class' => 'form-control', 'placeholder' => 'E-mail', 'required'=>"true", 'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->


                          <div class="form-group row">
                              <label class="col-md-2 form-control-label" for="password">Password</label>

                              <div class="col-md-10">
                                  <!--<input class="form-control" type="password" name="password" id="password" placeholder="Password">-->
                                  {!! Form::password('password', array('id' => 'password', 'class' => 'form-control ', 'placeholder' => 'Password')) !!}
                                  <!--
                                  @if ($errors->has('password'))
                                      <span class="help-block error-mgs">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                                -->
                              </div><!--col-->
                          </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="password_confirmation">Password Confirmation</label>

                            <div class="col-md-10">
                                <!--<input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation">-->
                                {!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'Password Confirmation' )) !!}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">Role</label>

                            <div class="col-md-10">
                                <select class="custom-select form-control" name="role" id="role">
                                            <option value="">Select User Role</option>
                                            @if ($roles)
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected="selected"' : '' }}>{{ $role->name }}</option>
                                                @endforeach
                                            @endif
                                 </select>

                            </div><!--col-->
                        </div><!--form-group-->


                        <div class="form-group row area-manager" style="{{ $user->role_id == 3 ? '': 'display:none;' }}">
                            <label class="col-md-2 form-control-label" for="first_name">Area Manager</label>

                            <div class="col-md-10">
                                <select name="area_manager" id="area_manager" class="custom-select form-control" >
                                    <option value="">Select Area Manager</option>
                                    @if ($amkUsers)
                                        @foreach($amkUsers as $amk)
                                            <option value="{{ $amk->id }}" {{ $user->parent_id == $amk->id ? 'selected="selected"' : '' }}>{{ $amk->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row distributor-manager" style="{{ $user->role_id == 4 ? '': 'display:none;' }}">
                            <label class="col-md-2 form-control-label" for="first_name">Distributor Manager</label>

                            <div class="col-md-10">
                                <select name="distributor_manager" id="distributor_manager" class="custom-select form-control" >
                                    <option value="">Select Distributor Manager</option>
                                    @if ($dmkUsers)
                                        @foreach($dmkUsers as $dmk)
                                            <option value="{{ $dmk->id }}" {{ $user->parent_id == $dmk->id ? 'selected="selected"' : '' }}>{{ $dmk->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div><!--col-->
                        </div><!--form-group-->


                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">Comission(%)</label>

                            <div class="col-md-10">
                                <!--<input class="form-control" type="text" name="comission" id="comission" placeholder="Comission" maxlength="191" autofocus="">-->
                                {!! Form::text('comission', $user->comission, array('id' => 'email', 'class' => 'form-control required', 'placeholder' => 'Comission', 'required'=>"", 'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">Patti(%)</label>
                            <div class="col-md-10">
                                <!--<input class="form-control" type="text" name="patti" id="patti" placeholder="Patti" maxlength="191" autofocus="">-->
                                {!! Form::text('patti', $user->patti, array('id' => 'patti', 'class' => 'form-control required', 'placeholder' => 'Patti', 'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->


                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="active">Active</label>

                            <div class="col-md-10">
                                <label class="switch switch-3d switch-primary">
                                    <input class="switch-input" type="checkbox" name="status" id="active" value="1" {{$user->active?'checked="true"':''}}>
                                    <span class="switch-label"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </div><!--col-->
                        </div><!--form-group-->


                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        <a class="btn btn-danger btn-sm" href="/">Cancel</a>
                    </div><!--col-->

                    <div class="col text-right">
                        <button class="btn btn-success btn-sm pull-right" type="submit">Update</button>
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {!! Form::close() !!}
                </div><!--animated-->
            </div>

@endsection
<link href="http://finovics.com/css/backend.css?111" rel="stylesheet">
