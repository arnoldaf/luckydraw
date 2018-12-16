@extends('layouts.member-out')

@section('title', 'Play Game')
<!-- Program Intro -->
@section('content')
    <div class="quote-icon"><img src="{!! asset('member/images/icon_logo2.png')!!}" alt="" /></div>
    <div class="parallax">
        <article class="">
            <div class="container">
                <section id="form-section">
                <div id="blockTitle7" class="block_title">
                    <h2>Personal <span class="secondtxt">Details</span></h2>
                    <div class="g-hr type_short"><span class="g-hr-h"><i class="fa fa-envelope-o"></i></span></div>
                </div>




        {!! Form::open(array('route' => ['updateProfileRequest'], 'method' => 'PUT', 'role' => 'form', 'class' => '', 'id' => "contact_form")) !!}
        {!! csrf_field() !!}
          <div id="contact_Form1">
                        <!-- profile form -->

                  <h3>Personal Details & Account Info</h3>

                  @if (session('message'))
                    <div class="alert alert-{{ Session::get('status') }} status-box alert-dismissable fade show" role="alert">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;<span class="sr-only">Close</span></a>
                      {{ session('message') }}
                    </div><br>
                  @endif

                  @if (session('success'))
                    <div class="alert alert-success alert-dismissable fade show" role="alert">
                      <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
                      <h4 style="float:left;"><i class="icon fa fa-check fa-fw" aria-hidden="true"></i> Success</h4>
                      {{ session('success') }}
                    </div><br>
                  @endif

                  @if(session()->has('status'))
                      @if(session()->get('status') == 'wrong')
                          <div class="alert alert-danger status-box alert-dismissable fade show" role="alert">
                              <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;<span class="sr-only">Close</span></a>-->
                              {{ session('message') }}
                          </div><br>
                      @endif
                  @endif

                  @if (session('error'))
                    <div class="alert alert-danger alert-dismissable fade show" role="alert">
                      <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
                      <h4 style="color: #fff;">
                        <i class="icon fa fa-warning fa-fw" aria-hidden="true"></i>
                        Error
                      </h4>
                      {{ session('error') }}
                    </div><br>
                  @endif

                  @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissable fade show" style="height:auto;" role="alert">
                      <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
                      <h4 style="color: #fff;font-size: 14px; font-weight:bold;">
                        <i class="icon fa fa-warning fa-fw" aria-hidden="true"></i>
                        <strong>{{ Lang::get('auth.whoops') }}</strong> {{ Lang::get('auth.someProblems') }}
                      </h4>
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div><br>
                  @endif

                    <div class="fname">
                        <label for="name">First Name*:</label>
                        <input id="first_name" name="first_name" value="{{$user->first_name}}" type="text" placeholder="e.g. Mr. John Doe" />
                    </div>
                    <div class="lname">
                        <label for="name">Last Name:</label>
                        <!-- <p> Please enter your last name</p> -->
                        <input id="last_name" name="last_name" value="{{$user->last_name}}" type="text" placeholder="Last Name"  />
                    </div>
                    <div class="address">
                        <label for="address">Street Address:</label>
                        <input id="address" name="address" value="{{$user->address}}" type="text" placeholder="Street Address"   />
                    </div>
                     <div class="city">
                        <label for="city">City*:</label>
                        <input id="city" name="city" value="{{$user->city}}" type="text" placeholder="City"  />
                    </div>
                     <div class="country">
                        <label for="country">Country*:</label>
                         <p> Change Location</p>
                         <select>
                            <option value="1">India</option>
                        </select>
                    </div>
                     <div class="birthday">
                        <label for="birthday">Birthday:</label>
                        <div class="moveleft">
                          <?php
                            $day = $month = $year = '';
                            if($user->dob != NULL) {
                                $day = date('d', strtotime($user->dob));
                                $month = date('m', strtotime($user->dob));
                                $year = date('Y', strtotime($user->dob));
                            }
                          ?>

                          <select  name="day" id="day" >
                                      <option value="">Day</option>
                                      @for ($i = 1; $i <= 31; $i++)
                                          <option value="{{ sprintf('%02d', $i) }}"  {{ intval($i) == intval($day) ? 'selected="selected"' : '' }} >{{ sprintf('%02d', $i) }}</option>
                                      @endfor
                           </select> /
                           <select  name="month" id="month">
                                       <option value="">Month</option>
                                       @for ($i = 1; $i <= 12; $i++)
                                           <option value="{{ sprintf('%02d', $i) }}" {{ intval($i) == intval($month) ? 'selected="selected"' : '' }}>{{ sprintf('%02d', $i) }}</option>
                                       @endfor
                            </select> /

                            <select name="year" id="year">
                                        <option value="">Year</option>
                                        @for ($i = 2018; $i >1950; $i--)
                                            <option value="{{ sprintf('%02d', $i) }}" {{ intval($i) == intval($year) ? 'selected="selected"' : '' }}>{{sprintf('%02d', $i) }}</option>
                                        @endfor
                             </select>
                    </div>
                    </div>
                     <div class="phone">
                        <label for="phone">Phone No:</label>
                        <input id="phone" name="phone" value="{{$user->phone}}" type="text" placeholder="91-999999999"  />
                    </div>
                    <div class="email1">
                        <label for="email">Email Id:</label>
                        <input id="email" name="email" value="{{$user->email}}" type="text" placeholder="example@domain.com"  />
                    </div>
                     <div class="rank">
                        <label for="rank">Rank:</label>
                        <select name="role" id="role" disabled>
                                    <option value="">Select User Role</option>
                                    @if ($roles)
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected="selected"' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    @endif
                         </select>

                    </div>

                    <div id="loader">
                        <input type="submit" name="submit" value="Save" />
                    </div>
                    <p class="success">Your message has been sent successfully.</p>
                    <p class="error">E-mail must be valid and message must be longer than 20 characters.</p>

            <!--</form> -->
            <!-- profile form end -->
            <?php /*
            <div class="divider"></div>
            <!-- change password form -->
            <form method="post" id="contact_form">
                  <h3>Change Password</h3>

                    <div class="cpassword">
                        <label for="cpassword">Current Password:</label>
                        <!-- <p> Please enter your first name</p> -->
                        <input id="cpassword" name="cpassowrd" type="text" placeholder="******" required />
                    </div>
                    <div class="npassword">
                        <label for="name">New Password:</label>
                        <!-- <p> Please enter your last name</p> -->
                        <input id="npassword" name="npassowrd" type="text" placeholder="******" required />
                    </div>
                    <div class="rnpassword">
                        <label for="name">Repeat New Password:</label>
                        <!-- <p> Please enter your last name</p> -->
                        <input id="rnpassword" name="rnpassowrd" type="text" placeholder="******" required />
                    </div>


                    <div id="loader">
                        <input type="submit" value="Save" />
                    </div>
                    <p class="success">Your message has been sent successfully.</p>
                    <p class="error">E-mail must be valid and message must be longer than 20 characters.</p>

            </form>
            <!-- change password form end -->
             <div class="divider"></div>
            <!-- change pin form -->
            <form method="post" id="contact_form">
                  <h3>Change Pin</h3>

                    <div class="cpassword">
                        <label for="cpassword">Current Pin:</label>
                        <!-- <p> Please enter your first name</p> -->
                        <input id="cpassword" name="cpassowrd" type="text" placeholder="******" required />
                    </div>
                    <div class="npassword">
                        <label for="name">New Pin:</label>
                        <!-- <p> Please enter your last name</p> -->
                        <input id="npassword" name="npassowrd" type="text" placeholder="******" required />
                    </div>
                    <div class="rnpassword">
                        <label for="name">Repeat New Pin:</label>
                        <!-- <p> Please enter your last name</p> -->
                        <input id="rnpassword" name="rnpassowrd" type="text" placeholder="******" required />
                    </div>


                    <div id="loader">
                        <input type="submit" value="Save" />
                    </div>
                    <p class="success">Your message has been sent successfully.</p>
                    <p class="error">Pin must be valid and must be longer than 6 characters.</p>

            </form>
            <!-- change pin form end -->
             <div class="divider"></div>
            <!-- change password form -->
            <form method="post" id="contact_form">
                  <h3>Account Status</h3>

                    <label for="birthday">Account Status:</label>
                        <div class="moveleft">
                        <select>
                            <option>Active</option>
                            <option>Closed/option>
                        </select>
                    </div>


                    <div id="loader">
                        <input type="submit" value="Save" />
                    </div>
                    <p class="success">Your message has been sent successfully.</p>
                    <p class="error">Pin must be valid and must be longer than 6 characters.</p>

            </form>
            <!-- change password form end -->

            */ ?>

        </div>
          {!! Form::close() !!}
@endsection
<style>
    .alert { height: 20px; padding: 5px; color: #fff;}
    .alert-danger {background-color: #d4202b}
    .alert-success {background-color: #00ff00}
</style>
