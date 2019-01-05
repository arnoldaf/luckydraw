
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">


<title>Asia Play</title>
<meta name="description" content="Place to put your description text"/>
<meta name="author" content="Corsini Alessio"/>
<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="{!! asset('member/css/base2.css') !!}"/>
<link href="{!! asset('member/css/jquery.bxslider_index.css')!!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('member/css/jquery.fancybox-1.3.4_2.css" rel="stylesheet') !!}" type="text/css" />
<link href="{!! asset('member/css/slide/settings.css')!!}" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="member/images/favicon.png">
<link rel="apple-touch-icon" href="member/images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="member/images/apple-touch-icon-72x72.png">
<link href="{!! asset('member/css/tabs.css')!!}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{!! asset('member/css/screen3.css')!!}"/>
<link rel="apple-touch-icon" sizes="114x114" href="{!! asset('member/images/apple-touch-icon-114x114.png')!!}">
<link href="{!! asset('member/css/font-awesome-4.0.1/css/font-awesome.min.css')!!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('member/css/menu.css')!!}" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{!! asset('member/css/custom.css')!!}?version={{rand(1,10010)}}" />
<script src="{!! asset('member/js/slideproject/modernizr.js')!!}" type="text/javascript"></script>
<script src="{!! asset('member/js/jquery-1.10.1.min.js')!!}" type="text/javascript"></script>
<script src="{!! asset('member/js/jquery-migrate-1.2.1.min.js')!!}" type="text/javascript"></script>

</head>
<body>
<div id="preloader">
      <div id="status">
          <figure class="figure_top">
            <div class="dot white"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </figure>
    </div>
</div>
<div id="toplineright"></div>
<div id="toplineleft"></div>
<div class="container-menu">
  <div class="container content-menu">
   <div class="logo">
    <img src="{!! ('member/images/asia_play_logo.png') !!}" alt="log" />
  </div>
  <!-- mega menu -->
    @if( !Auth::check() || Auth::user()->role_id ==1)
			<ul id="navmenu" class="poker-mega-menu poker-mega-menu-anim-scale poker-mega-menu-response-to-icons">
        <li class="menu-first-li">
            <a class="link_onepages" href="{{ route('sitehome') }}"><i class="fa fa-single fa-home"></i></a>

        </li>
        <li ><a class="link_onepages" href="#section-3"><i class="fa fa-gamepad"></i>Play Game</a>
            <div class="grid-container4">
                <ul>
                    <li><a href="#"><i class="fa fa-money"></i>Number Game </a></li>
                </ul>
            </div>
        </li>

        <li ><a class="link_onepages" href="#section-3"><i class="fa fa-bar-chart"></i>Game Results</a>
        </li>

        <li aria-haspopup="true">
					<a class="link_onepage" href="#section-3"><i class="fa fa-users"></i>About us</a>
				</li>

        <li aria-haspopup="true">
					<a class="link_onepage" href="#section-3"><i class="fa fa-envelope"></i>Contact us</a>
				</li>
  			<!--
  				<li><a class="link_onepage" href="#section-6"><i class="fa fa-single fa-envelope"></i></a></li>
        -->
        <!--
        <li aria-haspopup="true" class="right">

            <div class="grid-container5">
                <form action="#">
                    <fieldset>
                        <section><label class="input"><i class="fa fa-append fa-envelope-o"></i><input type="text" placeholder="Email address"></label></section>
                        <div class="row">
                            <section class="col col-6"><label class="input"><i class="fa fa-append fa-user"></i><input type="text" placeholder="First Name"></label></section>
                            <section class="col col-6"><label class="input"><i class="fa fa-append fa-user"></i><input type="text" placeholder="Last Name"></label></section>
                        </div>
                        <section><label class="input"><i class="fa fa-append fa-lock"></i><input type="password" placeholder="Password"></label></section>
                        <section><label class="input"><i class="fa fa-append fa-lock"></i><input type="password" placeholder="Confirm password"></label></section>
                        <button type="submit" class="button">Register</button>
                    </fieldset>
                </form>
            </div>
        </li>
      -->
        <li aria-haspopup="true" class="right last">
          <a data-toggle="modal" href="#loginModal"><i class="fa fa-sign-in"></i>Login</a>

        </li>

			</ul>
      @endif
      @if( Auth::check() && Auth::user()->role_id !=1)

      <ul id="navmenu" class="poker-mega-menu poker-mega-menu-anim-scale poker-mega-menu-response-to-icons">

          <li class="menu-first-li">
              <a class="link_onepages" href="{{ route('sitehome') }}"><i class="fa fa-single fa-home"></i></a>

          </li>
          <li ><a class="link_onepages" href="{{ route('playgame') }}"><i class="fa fa-eye"></i>Play Game</a>
              <div class="grid-container4">
                  <ul>
                      <li><a href="{{ route('playgame') }}"><i class="fa fa-check"></i>Number Game </a></li>
                  </ul>
              </div>
          </li>

          <li ><a class="link_onepages" href="#section-3"><i class="fa fa-star"></i>Game Results</a>
              <div class="grid-container4">
                  <ul>
                      <li><a href="#"><i class="fa fa-check"></i>My Bid Result </a></li>
                      <li><a href="#"><i class="fa fa-check"></i>Game Results </a></li>
                  </ul>
              </div>
          </li>
          <li ><a class="link_onepages" href="#section-3"><i class="fa fa-star"></i>Manage My Points</a>
              <div class="grid-container4">
                  <ul>
                    <li><a href="{{ route('point-transfer') }}"><i class="fa fa-check"></i>Receive </a></li>
                    <li><a href="{{ route('point-transfer') }}"><i class="fa fa-check"></i>Transfer </a></li>
                    <li><a href="{{ route('point-transfer') }}"><i class="fa fa-check"></i>Transaction History </a></li>
                  </ul>
              </div>
          </li>

          <li ><a class="link_onepages" href="#section-3"><i class="fa fa-star"></i>Comission</a>
              <div class="grid-container4">
                  <ul>
                      <li><a href="#"><i class="fa fa-check"></i>Commission History</a></li>
                  </ul>
              </div>
          </li>
          @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
          <li ><a class="link_onepages" href="#section-3"><i class="fa fa-star"></i>Downline</a>
              <div class="grid-container4">
                  <ul>
                      <li><a href="#"><i class="fa fa-check"></i>Downline  List</a></li>
                  </ul>
                  <ul>
                      <li><a href="#"><i class="fa fa-check"></i>Downline  Client Data</a></li>
                  </ul>
              </div>
          </li>
          @endif

          <li ><a class="link_onepages" href="#section-3"><i class="fa fa-star"></i>Balance:&#8377;{{(Auth::user()->last_balance == 0 ? '0.00':Auth::user()->last_balance) }}</a>

          </li>
              <li aria-haspopup="true" class="right last" style="border-left-width: 0px;"><a class="link_onepages" href="#section-3"><i class=""></i>Welcome: {{Auth::user()->first_name }}</a>
                  <div class="grid-container4">
                      <ul>
                        <li><a href="{{ route('profile') }}"><i class="fa fa-check"></i>Profile</a></li>
                        <li><a href="{{ route('passwords') }}"><i class="fa fa-check"></i>Change Password and PIN</a></li>
                          <li><a data-toggle="modal" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="fa fa-sign-in"></i>Logout</a></li>
                      </ul>
                  </div>
              </li>
      </ul>



      @endif

     </div>
</div>



<div class="clear"></div>
<div class="row" >
game result page

</p>
<div class="clear"></div>

<!-- Content Part - Table -->
   <section id="testimonial">
    <div class="container">
       <h2 class="section_title_white">game result page</span></h2>
       <hr class="separator2"/>
       <section class="sponsors">
        <article id="sponsorpoker">
          <div class="one_sixth_sponsor"> <a href="#"><img class="" src="member/images/brand-logo2.png" alt="" /></a> </div>
          <div class="one_sixth_sponsor"> <a href="#"><img class="" src="member/images/brand-logo3.png" alt="" /></a> </div>
          <div class="one_sixth_sponsor"> <a href="#"><img class="" src="member/images/brand-logo4.png" alt="" /></a> </div>
          <div class="one_sixth_sponsor"> <a href="#"><img class="" src="member/images/brand-logo7.png" alt="" /></a> </div>
          <div class="one_sixth_sponsor"> <a href="#"><img class="" src="member/images/brand-logo5.png" alt="" /></a> </div>
          <div class="one_sixth_sponsor lastcolumn"> <a href="#"><img class="" src="member/images/brand-logo1.png" alt="" /></a> </div>
        </article>
      </section>
    </div>
</section>
<!-- Contact -->
<div id="section-6">
    <div class="contactinfo">
        <div class="content-contact">
            <div class="container">

                <div class="two_third_contact ctn_social">
                    <section class="social_align">
                        <ul class="socials fr">
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </section>
                </div>
                <div class="clear"></div><br />
                <div class="two_third_contact lastcolumn">
                    <div id="blockTitle7" class="block_title">
                        <h2>Contact <span class="secondtxt">us</span></h2>
                        <div class="g-hr type_short"><span class="g-hr-h"><i class="fa fa-envelope-o"></i></span></div>
                        <h3 class="subtitle_poker">PROIN GRAVIDA NIBH VEL VELIT AUCTOR ALIQUET. AENEAN SOLLICITUDIN.</h3>
                    </div>
                    <div id="contact_Form">
                        <form method="post" id="contact_form">
                                <section id="contact" class="contact-select">
                                   <div class="info_maps">
                                    <section class="first">
                                      <ul class="contactsidebar" >
                                          <li><i class="fa fa-home"></i><span>Steet us: </span>2A4 UD Street Name, Punta Cana</li>
                                          <li><i class="fa fa-phone"></i><span>Phone US: </span>(+44) 66-997-12341</li>
                                      </ul>
                                    </section>
                                  </div>
                              </section>

                                <div class="name">
                                    <label for="name">Your Name:</label>
                                    <p> Please enter your full name</p>
                                    <input id="name" name="email" type="text" placeholder="e.g. Mr. John Doe" required />
                                </div>
                                <div class="email">
                                    <label for="email">Your Email:</label>
                                    <p> Please enter your email address</p>
                                    <input id="emailid" name="emai" type="text" placeholder="example@domain.com" required />
                                </div>
                                <div class="message">
                                    <label for="message">Your Message:</label>
                                    <p> Please enter your question</p>
                                    <textarea name="messagetext" id="message" cols="30" rows="4"></textarea>
                                </div>
                                <div id="loader">
                                    <input type="submit" value="Submit" />
                                </div>
                                <p class="success">Your message has been sent successfully.</p>
                                <p class="error">E-mail must be valid and message must be longer than 20 characters.</p>

                        </form>
                    </div>
                </div>

            </div>
            <div class="footer-top-div">
                <div class="container">
                    <div id="footer" class="footer_content">
                        <div class="two_third_contact">
                            <div class="one_fourth">
                                <img src="member/images/logo_footer.png" alt="log" />
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nibh magna, fringilla sit amet lobortis id, posuere sit amet metus.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur Aenean nibh magna, fringilla sit amet.</p>
                            </div>
                            <div class="one_fourth">
                                <h3>Recent post</h3>
                                <ul class="footer_post">
                                    <li><i class="fa fa-star"></i>Lorem ipsum dolor sit</li>
                                    <li><i class="fa fa-star"></i>Lorem ipsum dolor</li>
                                    <li><i class="fa fa-star"></i>Lorem ipsum </li>
                                    <li><i class="fa fa-star"></i>Lorem ipsum dolor</li>
                                    <li><i class="fa fa-star"></i>Lorem ipsum dolor sit</li>
                                </ul>
                            </div>
                            <div class="one_fourth">
                                <h3>Flickr Photos</h3>
                                <!--<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?show_name=1&amp;count=6&amp;display=random&amp;size=s&amp;layout=x&amp;source=user&amp;user=35244330@N00"></script> -->
                            </div>
                            <div class="cleartags"></div>
                            <div class="one_fourth">
                                <h3 class="footer-tags">Popular Tags</h3>
                                <ul class="tags-widget">
                                    <li><a href="#">poker</a></li>
                                    <li><a href="#">blackjack</a></li>
                                    <li><a href="#">money</a></li>
                                    <li><a href="#">roulette</a></li>
                                    <li><a href="#">guaranteed</a></li>
                                    <li><a href="#">tournament</a></li>
                                    <li><a href="#">cash game</a></li>
                                    <li><a href="#">casinò</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr class="separatorspace"/>
                    <p class="copyright">&copy; 2013 by <a href="#">Corsaro Design</a>. All Rights Reserved</p>
                </div>
            </div>

    </div>
  </div>
</div>
<!--
<form method="post" action="/login" id="login-form">
  <fieldset>
    <section><label class="input"><i class="fa fa-append fa-user"></i><input type="text" id="email" required="required" name="email" placeholder="User Id"></label></section>
    <section><label class="input"><i class="fa fa-append fa-lock"></i><input type="password" id="password" type="password" name="password" required="required"  placeholder="Password"></label></section>
    <button type="submit" class="button">Login</button>
  </fieldset>
</form>
-->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"><input type="hidden" name="_token" value="{{ csrf_token() }}"></form>



<div class="modal hide" id="loginModal">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">x</button>
            <h3>Login to Account</h3>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger error-message hide">
              <strong>Error!</strong> These credentials do not match our records..
            </div>
            <div class="alert alert-success success-message show">
              <strong>Success!</strong> Login successfull. Redirecting to dashboard...
            </div>
            <form method="post" action="{{ route('login') }}" id="login-form1">
              <p><input type="text" class="span3" type="text" id="email" required="required" name="email" placeholder="User Id"></p>
              <p><input type="password" class="span3" id="password" type="password" name="password" required="required"  placeholder="Password"></p>
              <p>
                <button type="reset" class="btn btn-primary">Reset</button>
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="#">Forgot Password?</a>
              </p>
            </form>
          </div>
          <div class="modal-footer">
            New To MyWebsite.com?
            <a href="#" class="">Register</a>
          </div>
        </div>

    <script type="text/javascript" src="{!! asset('member/js/jquery.easing.1.3.js')!!}"></script>
    <script src="{!! asset('member/js/jquery.fancybox-1.3.4.pack.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('member/js/scroll/jquery.bxslider.js')!!}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            "use strict";
            $('.slider1').bxSlider({
                slideWidth: 350,
                slideHeight: '100%',
                minSlides: 2,
                maxSlides: 3,
                slideMargin: 10
            });
        });
    </script>
    <script src="{!! asset('member/js/jquery.appear.js')!!}" type="text/javascript"></script>
	<script type="text/javascript" src="{!! asset('member/js/slide/jquery.themepunch.plugins.min.js')!!}"></script>
    <script type="text/javascript" src="{!! asset('member/js/slide/jquery.themepunch.revolution.min.js')!!}"></script>
    <script src="{!! asset('member/js/jquery.parallax-1.1.3.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('member/js/screen.js')!!}" type="text/javascript"></script>

    <script src="{!! asset('member/js/jquery.nav1.js')!!}" type="text/javascript"></script>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function () { "use strict"; $('#Grid_top').mixitup(); });
        $(function () { "use strict"; $('#Grid').mixitup(); });
    </script>

    <!-- Contact Form -->
    <script type="text/javascript">


        $(document).ready(function () {
          $(".right").click(function(){
            $(".success-message").hide()
            $(".error-message").hide()
          });

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });



          $("#login-form1").submit(function(e) {

            e.preventDefault();
            var $form = $(this);
            $.post($form.attr("action"), $form.serialize())
            .done(function(data) {
              console.log(data);
              // Some stuff there
              $(".success-message").show()
              $(".error-message").hide()
              window.location.href = '{{ route('redirect') }}';
            })
            .fail(function(xhr, status, error) {
              $(".success-message").hide()
              $(".error-message").show()
              /*
              if (xhr.responseText != "") {
                  var jsonResponseText = $.parseJSON(xhr.responseText);
                  var jsonResponseStatus = '';
                  var message = '';
                  $.each(jsonResponseText, function(name, val) {
                      if (name == "ResponseStatus") {
                          jsonResponseStatus = $.parseJSON(JSON.stringify(val));
                           $.each(jsonResponseStatus, function(name2, val2) {
                               if (name2 == "Message") {
                                   message = val2;
                               }
                           });
                      }
                  });
              } */

              // Dispatch errors in modal
            });
          });

        });
    </script>
    <style>
    .btn-primary {background: #D4202B;}
    .modal-dialog {
        margin: 40vh auto 0px auto
    }
    .modal {top:30%;}

    </style>

</body>
</html>
