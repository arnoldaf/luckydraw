<div class="tab-pane fade in active" id="profile">
    <div class="panel-body">
        <!-- Nav tabs -->
        <ul class="nav nav-pills">
            <li class="active"><a href="#profile-settings" data-toggle="tab">Profile Settings</a>
            </li>
            <li><a href="#password" data-toggle="tab">Password</a>
            </li>
            <li><a href="#pin" data-toggle="tab">PIN</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane fade in active" id="profile-settings">
                <p></p>

                {!! Form::open(array('route' => ['users.update', $user->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation')) !!}
                {!! csrf_field() !!}
                <div class="mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label required-field" for="first_name">First Name</label>

                            <div class="col-md-6">

                                {!! Form::text('first_name', $user->first_name, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => 'First Name', 'required'=>"true", 'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">Last Name</label>

                            <div class="col-md-6">
                                {!! Form::text('last_name', $user->last_name, array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => 'Last Name', 'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">Street Address</label>

                            <div class="col-md-6">
                                {!! Form::text('address', $user->address, array('id' => 'address', 'class' => 'form-control', 'placeholder' => 'Address', 'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->


                        <div class="form-group row">
                            <label class="col-md-2 form-control-label required-field" for="first_name">City</label>

                            <div class="col-md-6">
                                {!! Form::text('city', $user->city, array('id' => 'city', 'class' => 'form-control', 'placeholder' => 'City',  'autofocus'=> "" , 'required'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label required-field" for="country">Country</label>

                            <div class="col-md-6">
                                <select class="custom-select form-control required" name="country" id="country">
                                    <!--<option value="">Select Country</option>-->
                                    <option value="1" >India</option>
                                </select>

                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">Birthday</label>
                            <div class="col-md-6">
                                <?php
                                $day = $month = $year = '';
                                if ($user->dob != NULL && $user->dob != '0000-00-00') {
                                    $day = date('d', strtotime($user->dob));
                                    $month = date('m', strtotime($user->dob));
                                    $year = date('Y', strtotime($user->dob));
                                }
                                ?>
                                <select class="custom-select form-control" name="day" id="day" style="width: 20%; float:left;margin-right: 8px;">
                                    <option value="">Day</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                    <option value="{{ sprintf('%02d', $i) }}"  {{ intval($i) == intval($day) ? 'selected="selected"' : '' }} >{{ sprintf('%02d', $i) }}</option>
                                    @endfor
                                </select>&nbsp;
                                <select class="custom-select form-control" name="month" id="month"  style="width: 20%; float:left;margin-right: 8px;">
                                    <option value="">Month</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ sprintf('%02d', $i) }}" {{ intval($i) == intval($month) ? 'selected="selected"' : '' }}>{{ sprintf('%02d', $i) }}</option>
                                    @endfor
                                </select> &nbsp;

                                <select class="custom-select form-control" name="year" id="year"  style="width: 20%; float:left;margin-right: 8px;">
                                    <option value="">Year</option>
                                    @for ($i = 2018; $i >1950; $i--)
                                    <option value="{{ sprintf('%02d', $i) }}" {{ intval($i) == intval($year) ? 'selected="selected"' : '' }}>{{sprintf('%02d', $i) }}</option>
                                    @endfor
                                </select>&nbsp;
                            </div><!--col-->
                        </div><!--form-group-->



                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">Phone No.</label>

                            <div class="col-md-6">
                                {!! Form::text('phone', $user->phone, array('id' => 'phone', 'class' => 'form-control', 'placeholder' => 'Phone', 'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="email">Email Id</label>

                            <div class="col-md-6">
                                {!! Form::text('email', $user->email, array('id' => 'emailid', 'class' => 'form-control', 'placeholder' => 'Email Id', 'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="first_name">Role</label>

                            <div class="col-md-6">
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

                            <div class="col-md-6">
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

                            <div class="col-md-6">
                                <select name="distributor_manager" id="distributor_manager"  disabled  class="custom-select form-control" >
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

                            <div class="col-md-6">
                                {!! Form::text('comission', $user->comission, array('id' => 'email', 'class' => 'form-control required','placeholder' => 'Comission', 'required'=>"", 'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->
                        <div class="form-group row patti"  style="{{ $user->role_id == 2 ? '': 'display:none;' }}">
                            <label class="col-md-2 form-control-label" for="first_name">Patti(%)</label>
                            <div class="col-md-6">
                                {!! Form::text('patti', $user->patti, array('id' => 'patti', 'class' => 'form-control required', 'placeholder' => 'Patti', 'autofocus'=> "" )) !!}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="active">Active</label>

                            <div class="col-md-6">
                                <label class="switch switch-3d switch-primary">
                                    <input type="hidden" name="action" value="profile-settings">
                                    <input class="switch-input" type="checkbox" name="status" id="active" value="1" {{$user->active?'checked="true"':''}}>
                                    <span class="switch-label"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row patti">
                            <label class="col-md-2 form-control-label" for="first_name"></label>
                            <div class="col-md-6">
                                <button class="btn btn-success btn-sm" type="reset">Reset</button>
                                <button class="btn btn-success btn-sm" type="submit">Update</button>
                            </div><!--col-->
                        </div><!--form-group-->
                    </div><!--col-->
                </div><!--card-->
                {!! Form::close() !!}



            </div>
            <div class="tab-pane fade" id="password">
                <p></p>

                {!! Form::open(array('route' => ['users.update', $user->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation')) !!}
                {!! csrf_field() !!}

                <div class="mt-4 mb-4">
                    <div class="col">

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="password">Password</label>

                            <div class="col-md-6">
                                {!! Form::password('password', array('id' => 'password', 'class' => 'form-control ', 'placeholder' => 'Password')) !!}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="password_confirmation">Password Confirmation</label>

                            <div class="col-md-6">
                                {!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'Password Confirmation' )) !!}
                            </div><!--col-->
                        </div><!--form-group-->
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="password_confirmation"></label>

                            <div class="col-md-6">
                                <button class="btn btn-success btn-sm " type="reset">Reset</button>
                                <input type="hidden" name="action" value="password">
                                <button class="btn btn-success btn-sm " type="submit">Update</button>
                            </div><!--col-->
                        </div><!--form-group-->



                    </div><!--col-->
                </div><!--row-->

                {!! Form::close() !!}


            </div>
            <div class="tab-pane fade" id="pin">


                <p></p>

                {!! Form::open(array('route' => ['users.update', $user->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation')) !!}
                {!! csrf_field() !!}

                <div class="mt-4 mb-4">
                    <div class="col">

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="password">PIN</label>

                            <div class="col-md-6">
                                {!! Form::password('pin', array('id' => 'pin', 'class' => 'form-control ', 'placeholder' => 'PIN', 'maxlength' => '4', 'onkeypress'=>'isNumber(event)' )) !!}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="password_confirmation">Confirm PIN</label>

                            <div class="col-md-6">
                                {!! Form::password('pin_confirmation', array('id' => 'pin_confirmation', 'maxlength' => '4', 'class' => 'form-control', 'onkeypress'=>'isNumber(event)', 'placeholder' => 'PIN Confirmation' )) !!}
                            </div><!--col-->
                        </div><!--form-group-->
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label" for="password_confirmation"></label>

                            <div class="col-md-6">
                                <button class="btn btn-success btn-sm " type="reset">Reset</button>
                                <input type="hidden" name="action" value="pin">
                                <button class="btn btn-success btn-sm " type="submit">Update</button>
                            </div><!--col-->
                        </div><!--form-group-->



                    </div><!--col-->
                </div><!--row-->

                {!! Form::close() !!}


            </div>
        </div>
    </div>

</div>