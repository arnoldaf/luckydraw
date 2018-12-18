@extends('admin.theme.default')

@section('content')


<!-- Bootstrap CSS -->
<!-- jQuery first, then Bootstrap JS. -->
<!-- Nav tabs -->






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
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    User Profile (<span style="color:green;">{{$user->user_account}})</span>
                </h4>
            </div><!--col-->


        </div><!--row-->

        <!--@include('admin.partials.search-users-form')-->
        <p>&nbsp;</p>
        <div class="row col-lg-12 ">

                    <p>&nbsp;</p>
                    <div class="tab" role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">User Profile</a></li>
                            <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Deposit Withdraw</a></li>
                            <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab">Game History</a></li>
                            <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab">Tree</a></li>
                            <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab">Comission Reports</a></li>
                            <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab">Patti Reports</a></li>
                            <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab">Net Daily Payouts</a></li>

                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabs">

                            <div role="tabpanel" class="tab-pane fade in active" id="Section1">

                              <!-- Nav tabs -->
                              <ul class="nav nav-tabs" role="tablist">
                                  <li role="presentation" class=""><a href="#profile-settings" aria-controls="home" role="tab" data-toggle="tab"> Profile Settings</a></li>
                                  <li role="presentation"><a href="#password" aria-controls="profile" role="tab" data-toggle="tab">Password</a></li>
                                  <li role="presentation"><a href="#pin" aria-controls="messages" role="tab" data-toggle="tab">PIN</a></li>
                              </ul>


                            </div>



                            <div role="tabpanel" class="tab-pane fade" id="Section2">
                                <h3>Section 2</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper, magna a ultricies volutpat, mi eros viverra massa, vitae consequat nisi justo in tortor. Proin accumsan felis ac felis dapibus, non iaculis mi varius.</p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="Section3">
                                <h3>Section 3</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper, magna a ultricies volutpat, mi eros viverra massa, vitae consequat nisi justo in tortor. Proin accumsan felis ac felis dapibus, non iaculis mi varius.</p>
                            </div>


                        </div>

                        <div class="tab-content tabs">

                           <!-- Profile Settings -->
                            <div role="tabpanel" class="tab-pane fade" id="profile-settings">

                              {!! Form::open(array('route' => ['users.update', $user->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation')) !!}
                              {!! csrf_field() !!}
                                <div class="">
                                    <div class="">
                                        <div class="row mt-4 mb-4">
                                            <div class="col">
                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label required-field" for="first_name">First Name</label>

                                                    <div class="col-md-10">

                                                        {!! Form::text('first_name', $user->first_name, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => 'First Name', 'required'=>"true", 'autofocus'=> "" )) !!}
                                                    </div><!--col-->
                                                </div><!--form-group-->

                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label" for="first_name">Last Name</label>

                                                    <div class="col-md-10">
                                                        {!! Form::text('last_name', $user->last_name, array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => 'Last Name', 'autofocus'=> "" )) !!}
                                                    </div><!--col-->
                                                </div><!--form-group-->

                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label" for="first_name">Street Address</label>

                                                    <div class="col-md-10">
                                                        {!! Form::text('address', $user->address, array('id' => 'address', 'class' => 'form-control', 'placeholder' => 'Address', 'autofocus'=> "" )) !!}
                                                    </div><!--col-->
                                                </div><!--form-group-->


                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label required-field" for="first_name">City</label>

                                                    <div class="col-md-10">
                                                        {!! Form::text('city', $user->city, array('id' => 'city', 'class' => 'form-control', 'placeholder' => 'City',  'autofocus'=> "" , 'required'=> "" )) !!}
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
                                                        <?php
                                                          $day = $month = $year = '';
                                                          if($user->dob != NULL && $user->dob != '0000-00-00') {
                                                              $day = date('d', strtotime($user->dob));
                                                              $month = date('m', strtotime($user->dob));
                                                              $year = date('Y', strtotime($user->dob));
                                                          }

                                                        ?>
                                                        <select class="custom-select form-control" name="day" id="day" style="width: 10%;">
                                                                    <option value="">Day</option>
                                                                    @for ($i = 1; $i <= 31; $i++)
                                                                        <option value="{{ sprintf('%02d', $i) }}"  {{ intval($i) == intval($day) ? 'selected="selected"' : '' }} >{{ sprintf('%02d', $i) }}</option>
                                                                    @endfor
                                                         </select> /
                                                         <select class="custom-select form-control" name="month" id="month"  style="width: 10%;">
                                                                     <option value="">Month</option>
                                                                     @for ($i = 1; $i <= 12; $i++)
                                                                         <option value="{{ sprintf('%02d', $i) }}" {{ intval($i) == intval($month) ? 'selected="selected"' : '' }}>{{ sprintf('%02d', $i) }}</option>
                                                                     @endfor
                                                          </select> /

                                                          <select class="custom-select form-control" name="year" id="year"  style="width: 10%;">
                                                                      <option value="">Year</option>
                                                                      @for ($i = 2018; $i >1950; $i--)
                                                                          <option value="{{ sprintf('%02d', $i) }}" {{ intval($i) == intval($year) ? 'selected="selected"' : '' }}>{{sprintf('%02d', $i) }}</option>
                                                                      @endfor
                                                           </select>
                                                    </div><!--col-->
                                                </div><!--form-group-->



                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label" for="first_name">Phone No.</label>

                                                    <div class="col-md-10">
                                                        {!! Form::text('phone', $user->phone, array('id' => 'phone', 'class' => 'form-control', 'placeholder' => 'Phone', 'autofocus'=> "" )) !!}
                                                    </div><!--col-->
                                                </div><!--form-group-->

                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label" for="email">Email Id</label>

                                                    <div class="col-md-10">
                                                        {!! Form::text('email', $user->email, array('id' => 'emailid', 'class' => 'form-control', 'placeholder' => 'Email Id', 'autofocus'=> "" )) !!}
                                                    </div><!--col-->
                                                </div><!--form-group-->

                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label" for="first_name">Role</label>

                                                    <div class="col-md-10">
                                                        <select class="custom-select form-control" name="role" id="role" disabled>
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
                                                        <select name="area_manager" id="area_manager" class="custom-select form-control"  disabled  >
                                                            <option value="">Select Area Manager</option>
                                                            @if ($amkUsers)
                                                                @foreach($amkUsers as $amk)
                                                                    <option value="{{ $amk->id }}" {{ $user->parent_id == $amk->id ? 'selected="selected"' : '' }}>{{ $amk->first_name }}({{$amk->user_account}})</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div><!--col-->
                                                </div><!--form-group-->

                                                <div class="form-group row distributor-manager" style="{{ $user->role_id == 4 ? '': 'display:none;' }}">
                                                    <label class="col-md-2 form-control-label" for="first_name">Distributor Manager</label>

                                                    <div class="col-md-10">
                                                        <select name="distributor_manager" id="distributor_manager"  readonly  class="custom-select form-control" >
                                                            <option value="">Select Distributor Manager</option>
                                                            @if ($dmkUsers)
                                                                @foreach($dmkUsers as $dmk)
                                                                    <option value="{{ $dmk->id }}" {{ $user->parent_id == $dmk->id ? 'selected="selected"' : '' }}>{{ $dmk->first_name }}({{$dmk->user_account}})</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div><!--col-->
                                                </div><!--form-group-->


                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label required-field" for="first_name">Comission(%)</label>

                                                    <div class="col-md-10">
                                                        {!! Form::text('comission', $user->comission, array('id' => 'email', 'class' => 'form-control required','placeholder' => 'Comission', 'required'=>"", 'autofocus'=> "" )) !!}
                                                    </div><!--col-->
                                                </div><!--form-group-->
                                                <div class="form-group row patti"  style="{{ $user->role_id == 2 ? '': 'display:none;' }}">
                                                    <label class="col-md-2 form-control-label" for="first_name">Patti(%)</label>
                                                    <div class="col-md-10">
                                                        {!! Form::text('patti', $user->patti, array('id' => 'patti', 'class' => 'form-control required', 'placeholder' => 'Patti', 'autofocus'=> "" )) !!}
                                                    </div><!--col-->
                                                </div><!--form-group-->

                                                <div class="form-group row">
                                                    <label class="col-md-2 form-control-label" for="active">Active</label>

                                                    <div class="col-md-10">
                                                        <label class="switch switch-3d switch-primary">
                                                            <input type="hidden" name="action" value="profile-settings">
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
                                                  <button class="btn btn-success btn-sm pull-right" type="reset">Reset</button>
                                            </div><!--col-->

                                            <div class="col text-right">
                                                <button class="btn btn-success btn-sm pull-right" type="submit">Update</button>
                                            </div><!--col-->
                                        </div><!--row-->
                                    </div><!--card-footer-->
                                </div><!--card-->
                            {!! Form::close() !!}

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="password">

                              {!! Form::open(array('route' => ['users.update', $user->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation')) !!}
                              {!! csrf_field() !!}
                                <div class="">
                                    <div class="">
                                        <div class="row mt-4 mb-4">
                                            <div class="col">

                                              <div class="form-group row">
                                                   <label class="col-md-2 form-control-label" for="password">Password</label>

                                                   <div class="col-md-10">
                                                       {!! Form::password('password', array('id' => 'password', 'class' => 'form-control ', 'placeholder' => 'Password')) !!}
                                                   </div><!--col-->
                                               </div><!--form-group-->

                                             <div class="form-group row">
                                                 <label class="col-md-2 form-control-label" for="password_confirmation">Password Confirmation</label>

                                                 <div class="col-md-10">
                                                     {!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'Password Confirmation' )) !!}
                                                 </div><!--col-->
                                             </div><!--form-group-->
                                             <!--
                                             <div class="form-group row">
                                                 <label class="col-md-2 form-control-label" for="password">PIN</label>

                                                 <div class="col-md-10">
                                                     {!! Form::password('pin', array('id' => 'pin', 'class' => 'form-control ', 'placeholder' => 'PIN', 'maxlength' => '4', 'onkeypress'=>'validate(event)' )) !!}

                                                 </div>
                                             </div><!--form-group-->


                                            </div><!--col-->
                                        </div><!--row-->
                                    </div><!--card-body-->

                                    <div class="card-footer clearfix">
                                        <div class="row">
                                            <div class="col">
                                                  <button class="btn btn-success btn-sm pull-right" type="reset">Reset</button>
                                            </div><!--col-->

                                            <div class="col text-right">
                                                <input type="hidden" name="action" value="password">
                                                <button class="btn btn-success btn-sm pull-right" type="submit">Update</button>
                                            </div><!--col-->
                                        </div><!--row-->
                                    </div><!--card-footer-->
                                </div><!--card-->
                            {!! Form::close() !!}


                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="pin">

                              {!! Form::open(array('route' => ['users.update', $user->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation')) !!}
                              {!! csrf_field() !!}
                                <div class="">
                                    <div class="">
                                        <div class="row mt-4 mb-4">
                                            <div class="col">
                                             <div class="form-group row">
                                                 <label class="col-md-2 form-control-label" for="password">PIN</label>

                                                 <div class="col-md-10">
                                                     {!! Form::password('pin', array('id' => 'pin', 'class' => 'form-control ', 'placeholder' => 'PIN', 'maxlength' => '4', 'onkeypress'=>'validate(event)' )) !!}

                                                 </div>
                                             </div><!--form-group-->


                                            </div><!--col-->
                                        </div><!--row-->
                                    </div><!--card-body-->

                                    <div class="card-footer clearfix">
                                        <div class="row">
                                            <div class="col">
                                                  <button class="btn btn-success btn-sm pull-right" type="reset">Reset</button>
                                            </div><!--col-->

                                            <div class="col text-right">
                                                <input type="hidden" name="action" value="password">
                                                <button class="btn btn-success btn-sm pull-right" type="submit">Update</button>
                                            </div><!--col-->
                                        </div><!--row-->
                                    </div><!--card-footer-->
                                </div><!--card-->
                            {!! Form::close() !!}


                            </div>
                        </div>




                    </div>





        </div><!--row-->

    </div><!--card-body-->
</div><!--card-->
                </div><!--animated-->
            </div>

@endsection
@include('admin.modals.modal-delete')

@section('footer_scripts')

    @include('admin.scripts.delete-modal-script')
    @include('admin.scripts.save-modal-script')
    @if(config('usersmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
@endsection
