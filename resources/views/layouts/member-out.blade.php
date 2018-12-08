<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Lucky draw - @yield('title')</title>
    <meta name="description" content="Place to put your description text" />
    <meta name="author" content="Corsini Alessio" />
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <link rel="stylesheet" href="{!! asset('member/css/base2.css')!!}" />

    <link href="{!! asset('member/css/jquery.bxslider_index.css')!!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('member/css/jquery.fancybox-1.3.4_2.css')!!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('member/css/slide/settings.css')!!}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{!! asset('member/images/favicon.png')!!}">
    <link rel="apple-touch-icon" href="{!! asset('member/images/apple-touch-icon.png')!!}">
    <link rel="apple-touch-icon" sizes="72x72" href="{!! asset('member/images/apple-touch-icon-72x72.png')!!}">
    <link href="{!! asset('member/css/tabs.css')!!}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{!! asset('member/css/screen2.css')!!}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{!! asset('member/images/apple-touch-icon-114x114.png')!!}">
    <link href="{!! asset('member/css/font-awesome-4.0.1/css/font-awesome.min.css')!!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('member/css/menu.css')!!}" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <script src="{!! asset('member/js/slideproject/modernizr.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('member/js/jquery-1.10.1.min.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('member/js/jquery-migrate-1.2.1.min.js')!!}" type="text/javascript"></script>
    <link rel="stylesheet" href="{!! asset('member/css/custom.css')!!}" />
    <link href="https://fonts.googleapis.com/css?family=Chakra+Petch" rel="stylesheet">
    <script> var sit_url = "{{url('')}}"; </script>
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
            <img src="{!! asset('member/images/logo2.jpg')!!}" alt="log" />
        </div>
        <!-- mega menu -->
        <ul id="navmenu" class="poker-mega-menu poker-mega-menu-anim-scale poker-mega-menu-response-to-icons">
            <li class="menu-first-li">
                <a class="link_onepages" href="#toplineright"><i class="fa fa-single fa-home"></i></a>
                <div class="grid-container2">
                    <ul>
                        <li><a href="index.html"><i class="fa fa-globe"></i>Home Page 1</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#"><i class="fa fa-eye"></i>Game</a>
                <div class="grid-container3">
                    <ul>
                        <li><a class="link_onepages" href="#texas"><i class="fa fa-check"></i>Texas Hold 'em</a></li>
                        <li><a class="link_onepages" href="#game"><i class="fa fa-check"></i>Other Games</a></li>
                    </ul>
                </div>
            </li>
            <li><a class="link_onepages" href="#tournaments"><i class="fa fa-briefcase"></i>Tournaments</a></li>
            <li><a class="link_onepages" href="#section-3"><i class="fa fa-star"></i>About us</a>
                <div class="grid-container4">
                    <ul>
                        <li><a href="more_details.html"><i class="fa fa-check"></i>Page Details 1</a></li>
                        <li><a href="more_details2.html"><i class="fa fa-check"></i>Page Details 2</a></li>
                        <li><a href="blog.html"><i class="fa fa-check"></i>Blog Simple</a></li>
                        <li><a href="blog_column.html"><i class="fa fa-check"></i>Blog Column Right</a></li>
                    </ul>
                </div>
            </li>
            <li><a class="link_onepages" href="#section-4"><i class="fa fa-bullhorn"></i>Events</a></li>
            <li><a class="link_onepages" href="#section-6"><i class="fa fa-single fa-envelope"></i></a></li>
            <li aria-haspopup="true" class="right">
                <a href="#"><i class="fa fa-lock"></i>Register</a>
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
            <li aria-haspopup="true" class="right last">
                <a href="#_"><i class="fa fa-sign-in"></i>Login</a>
                <div class="grid-container4">
                    <form action="#">
                        <fieldset>
                            <section><label class="input"><i class="fa fa-append fa-user"></i><input type="text" placeholder="Login or E-mail"></label></section>
                            <section><label class="input"><i class="fa fa-append fa-lock"></i><input type="password" placeholder="Password"></label></section>
                            <button type="submit" class="button">Login</button>
                        </fieldset>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>

<!-- Program Intro -->
<section id="tournaments">
    @yield('content')
</section>
<section id='jodi'>

</section>

<!-- Contact -->
<div id="section-6">
    <div class="contactinfo">
        <div class="content-contact">

            <div class="footer-top-div">
                <div class="container">
                    <div id="footer" class="footer_content">
                        <div class="two_third_contact">
                            <div class="one_fourth">
                                <img src="{!! asset('member/images/logo_footer.png')!!}" alt="log" />
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
                                <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?show_name=1&amp;count=6&amp;display=random&amp;size=s&amp;layout=x&amp;source=user&amp;user=35244330@N00"></script>
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
                    <hr class="separatorspace" />
                    <p class="copyright">&copy; 2013 by <a href="#">Corsaro Design</a>. All Rights Reserved</p>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="{!! asset('member/js/jquery.easing.1.3.js')!!}"></script>
<script src="{!! asset('member/js/jquery.fancybox-1.3.4.pack.js')!!}" type="text/javascript"></script>
<script src="{!! asset('member/js/scroll/jquery.bxslider.js')!!}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        "use strict";
        $('.slider1').bxSlider({
            slideWidth: 350,
            minSlides: 2,
            maxSlides: 3,
            slideMargin: 10
        });
    });
</script>
<script type="text/javascript" src="{!! asset('member/js/slide/jquery.themepunch.plugins.min.js')!!}"></script>
<script type="text/javascript" src="{!! asset('member/js/slide/jquery.themepunch.revolution.min.js')!!}"></script>
<script src="{!! asset('member/js/screen2.js')!!}" type="text/javascript"></script>
<script src="{!! asset('member/js/jquery.nav2.js')!!}" type="text/javascript"></script>
<script src="{!! asset('member/js/user-bid.js') !!}" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        "use strict";
        $('#Grid_top').mixitup();
    });
    $(function() {
        "use strict";
        $('#Grid').mixitup();
    });
</script>

<!-- Contact Form -->
<script type="text/javascript">
    $(document).ready(function() {
        $(function() {
            "use strict";
            $('#contact_form').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var name = $("#name").val();
                var email = $("#email").val();
                var text = $("#message").val();
                var dataString = 'name=' + name + '&email=' + email + '&message=' + text;

                function isValidEmail(emailAddress) {
                    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
                    return pattern.test(emailAddress);
                };
                if (isValidEmail(email) && (text.length > 20) && (name.length > 1)) {
                    $.ajax({
                        type: 'POST',
                        url: "contact_form/contact_process.php",
                        data: dataString,
                        success: function() {
                            $('.success').fadeIn(1000);
                        }
                    });
                } else {
                    $('.error').fadeIn(1000);
                }
            });
        });



    });
</script>

</body>

</html>