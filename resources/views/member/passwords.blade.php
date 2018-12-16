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
                  <div id="contact_Form1">
                        <!-- profile form -->
                  <!-- profile form end -->
                  <div class="divider"></div>
                  <!-- change password form -->
                  <form method="post" id="contact_form" class="change_password">
                          @csrf
                        <h3>Change Password</h3>
                        <div class="error-msg alert hidden" style="height:auto;"> </div>
                          <div class="cpassword">
                              <label for="cpassword">Current Password:</label>
                              <input id="oldpassword" name="oldpassword" type="text" placeholder="******" required />
                          </div>
                          <div class="npassword">
                              <label for="name">New Password:</label>
                              <input id="password" name="password" type="text" placeholder="******" required />
                          </div>
                          <div class="rnpassword">
                              <label for="name">Repeat New Password:</label>
                              <input id="password_confirmation" name="password_confirmation" type="text" placeholder="******" required />
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
                  <form method="post" id="contact_form" class="change_pin">
                        @csrf
                        <h3>Change Pin</h3>
                        <div class="error-msg alert hidden" style="height:auto;"> </div>
                          <div class="cpassword">
                              <label for="cpassword">Current Pin:</label>
                              <input id="cpassword" name="oldpin" type="text" placeholder="******" required />
                          </div>
                          <div class="npassword">
                              <label for="name">New Pin:</label>
                              <input id="npassword" name="pin" type="text" placeholder="******" required />
                          </div>
                          <div class="rnpassword">
                              <label for="name">Repeat New Pin:</label>
                              <input id="rnpassword" name="confirm_pin" type="text" placeholder="******" required />
                          </div>
                          <div id="loader">
                              <input type="submit" value="Save" />
                          </div>
                          <p class="success">Your message has been sent successfully.</p>
                          <p class="error">Pin must be valid and must be longer than 6 characters.</p>

                  </form>
                  <!-- change pin form end -->



        </div>

@endsection
<style>
    .alert { height: 20px; padding: 5px; color: #fff;}
    .alert-danger {background-color: #d4202b}
    .alert-success {background-color: #00ff00}
</style>
