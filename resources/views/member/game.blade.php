<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Poker Responsive Site Template</title>
    <meta name="description" content="Place to put your description text" />
    <meta name="author" content="Corsini Alessio" />
    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <link rel="stylesheet" href="{!! asset('member/css/base2.css')!!}" />

    <link href="{!! asset('member/css/jquery.bxslider_index.css') !!}" rel="stylesheet" type="text/css" />
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

    <div class="pt100"></div>
    <!-- Program Intro -->
    <section id="tournaments">
        <div class="quote-icon"><img src="{!! asset('member/images/icon_logo2.png') !!}" alt="" /></div>
        <div class="parallax">
            <article class="">
                <div class="container">
                    <section>
                       
                            <div class="stepbystep ">
                                <div class="rightsection denominations">
                                    <ul>
                                        <li class="icon active"><a href="#">50</a></li>
                                        <li class="icon"><a href="#">100</a></li>
                                        <li class="icon"><a href="#">200</a></li>
                                        <li class="icon"><a href="#">500</a></li>
                                        <li class="icon"><a href="#">2000</a></li>

                                    </ul>
                                </div>
                            </div>
                       
                   
                    <br/>
                   
                        <article>
                            <div class="main">
                                <div id="ttabs" class="poker-tabs poker-tabs-pos-top-left poker-tabs-anim-scale poker-tabs-response-to-icons">
                                    <?php $tabSer = 1;?>
                                    @foreach($games as $game)
                                    <input type="radio" name="poker-tabs" checked id="poker-tab{{$game['id']}}" class="poker-tab-content-{{$tabSer}}">
                                    <label for="poker-tab{{$game['id']}}"><span><span><i class="fa fa-bolt"></i>{{$game['name']}}</span></span></label>
                                            <?php $tabSer++;?>
                                    @endforeach
                                    {{--<input type="radio" name="poker-tabs" id="poker-tab2" class="poker-tab-content-2">--}}
                                    {{--<label for="poker-tab2"><span><span><i class="fa fa-picture-o"></i>Gali</span></span></label>--}}

                                    {{--<input type="radio" name="poker-tabs" id="poker-tab3" class="poker-tab-content-3">--}}
                                    {{--<label for="poker-tab3"><span><span><i class="fa fa-cogs"></i>Ghaziabad</span></span></label>--}}

                                    <ul>
                                        <?php $tabSer = 0;?>
                                        @foreach($games as $game)
                                                <?php $tabSer++;?>
                                        <li class="poker-tab-content-{{$tabSer}} game-wrapper" data-id="{{$game['id']}}">
                                            <div class="numberbg">
                                                <div class="checker__numbers">
                                                    <div class="checker__grid two_third">
                                                        @for($i = 0; $i <=99; $i++)
                                                        <a href="javascript:;" id="B0ID_{{$i}}" class="ball user-selected-num"><span class="num">{{$i}}</span><p class="value hidden"> 0</p></a>
                                                            <!--<a href="javascript:;" id="B0ID_18" class="ball Selected"><span>18</span><p class="value"> 9000 </p></a>-->
                                                        @endfor


                                                    </div>
                                                    <div class="one_third_gallery  lastcolumn clubbox">
                                                        <div class="twocol">
                                                            <div class="tablebox">
                                                                <h3>ANDER (A)</h3>
                                                                @for($i = 0; $i <=9; $i++)
                                                                <a href="javascript:;" id="B0ID_{{$i}}" class="ball"><span>{{$i}}</span></a>
                                                                @endfor
                                                            </div>
                                                            <div class="tablebox">
                                                                <h3>BAHAR (B)</h3>
                                                                @for($i = 0; $i <= 9; $i++)
                                                                <a href="javascript:;" id="B0ID_{{$i}}" class="ball"><span>{{$i}}</span></a>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="numberbg-right">
                                                    <div id="tablewrapper">

                                                            <section>
                                                                <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="nosort">
                                                                                <h3>S. No.</h3>
                                                                            </th>
                                                                            <th>
                                                                                <h3>Club</h3>
                                                                            </th>
                                                                            <th>
                                                                                <h3>Number</h3>
                                                                            </th>
                                                                            <th>
                                                                                <h3>Points</h3>
                                                                            </th>
                                                                            <th>
                                                                                <h3>Actions</h3>
                                                                            </th>
                                    
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr class="evenrow">
                                                                            <td>1</td>
                                                                            <td class="name">Dishawar</td>
                                                                            <td>44</td>
                                                                            <td>1000</td>
                                                                            <td>
                                                                                <a href="" class="delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="oddrow">
                                                                            <td>2</td>
                                                                            <td class="name">Dishawar</td>
                                                                            <td>44</td>
                                                                            <td>1000</td>
                                                                            <td>
                                                                                <a href="" class="delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="evenrow">
                                                                            <td>3</td>
                                                                            <td class="name">Dishawar</td>
                                                                            <td>44</td>
                                                                            <td>1000</td>
                                                                            <td>
                                                                                <a href="" class="delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="oddrow">
                                                                            <td>4</td>
                                                                            <td class="name">Dishawar</td>
                                                                            <td>44</td>
                                                                            <td>1000</td>
                                                                            <td>
                                                                                <a href="" class="delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="evenrow">
                                                                            <td>5</td>
                                                                            <td class="name">Dishawar</td>
                                                                            <td>44</td>
                                                                            <td>1000</td>
                                                                            <td>
                                                                                <a href="" class="delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="oddrow">
                                                                            <td>6</td>
                                                                            <td class="name">Dishawar</td>
                                                                            <td>44</td>
                                                                            <td>1000</td>
                                                                            <td>
                                                                                <a href="" class="delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="evenrow">
                                                                            <td>7</td>
                                                                            <td class="name">Dishawar</td>
                                                                            <td>44</td>
                                                                            <td>1000</td>
                                                                            <td>
                                                                                <a href="" class="delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="evenrow">
                                                                            <td>&nbsp;</td>
                                                                            <td class="name">&nbsp;</td>
                                                                            <td>&nbsp;</td>
                                                                            <td>&nbsp;</td>
                                                                            <td>
                                                                                &nbsp;
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="evenrow">
                                                                            <td>&nbsp;</td>
                                                                            <td class="name">&nbsp;</td>
                                                                            <td>&nbsp;</td>
                                                                            <td>&nbsp;</td>
                                                                            <td>
                                                                                &nbsp;
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="evenrow">
                                                                            <td>&nbsp;</td>
                                                                            <td class="name">&nbsp;</td>
                                                                            <td>&nbsp;</td>
                                                                            <td>&nbsp;</td>
                                                                            <td>
                                                                                &nbsp;
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="evenrow">
                                                                            <td>&nbsp;</td>
                                                                            <td class="name">&nbsp;</td>
                                                                            <td>&nbsp;</td>
                                                                            <td>&nbsp;</td>
                                                                            <td>
                                                                                &nbsp;
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="evenrow">
                                                                            <td>&nbsp;</td>
                                                                            <td class="name">&nbsp;</td>
                                                                            <td>&nbsp;</td>
                                                                            <td>&nbsp;</td>
                                                                            <td>
                                                                                &nbsp;
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="evenrow">
                                                                            <td>&nbsp;</td>
                                                                            <td class="name">&nbsp;</td>
                                                                            <td>&nbsp;</td>
                                                                            <td>&nbsp;</td>
                                                                            <td>
                                                                                &nbsp;
                                                                            </td>
                                                                        </tr>
                                    
                                                                        <tr class="">
                                                                            <td colspan="3">Total Bid Points</td>
                                    
                                                                            <td class="bid-amount"><strong> 0 </strong></td>
                                                                            <td>
                                    
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </section>
                                                            <form method="post" name="form_checker">
                                                                <div class="checker__buttons">
                                                                    <a href="javascript:void(0)" id="reset_checker" onclick="ClearForm()" class="">
                                    
                                                                        <span class="btn  btn-lg btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</span>
                                                                    </a>
                                                                    <input type="submit" value="Confirm Bid" class="btn btn-lg  btn-primary">
                                                                </div>
                                    
                                                            </form>
                                                        </div>
                                            </div>
                                            <section id='jodi'>
                                                    <div class="container ">
                                                        <div class="checker">
                                                            <div id="checkerStatus" class="checker__status">Select Numbers through CROSSING</div>
                                                            <ul class="checker__balls">
                                                                <li> <input type="radio">
                                                                    <span id="empty01">Jodi</span>
                                                                </li>
                                                                <li><input type="radio">
                                                                    <span id="empty02">without Jodi</span>
                                                                </li>
                                        
                                                            </ul>
                                                        </div>
                                                        <div class="checker__numbers">
                                                            <div class="checker__grid">
                                                                <h3>A</h3>
                                                                @for($i=0; $i<=9; $i++)
                                                                <a href="javascript:;" id="B0ID_{{$i}}" class="ball"><span>{{$i}}</span></a>
                                                                @endfor
                                                                <!-- <h3 class="col-md-2">Enter Points</h3> -->
                                                            </div>
                                                            <div class="checker__grid">
                                                                <h3>B</h3>
                                                                @for($i =0; $i<=9; $i++)
                                                                <a href="javascript:;" id="B0ID_{{$i}}" class="ball"><span>{{$i}}</span></a>
                                                                @endfor
                                                                <h3>1000</h3>
                                                            </div>
                                        
                                        
                                                        </div>
                                                        <div class="container">
                                                            <form method="post" name="form_checker">
                                                                <div class="checker__buttons">
                                                                    <a href="javascript:void(0)" id="reset_checker" onclick="ClearForm()" class="btn">
                                        
                                                                        <span class="btn btn-primary">Calculate</span>
                                                                    </a>
                                        
                                                                </div>
                                        
                                                            </form>
                                                        </div>
                                                    </div>
                                                </section>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                </div>
                        </article>
                    </section>
                    </div>
            </article>
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
                                            <ul class="contactsidebar">
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
                                    <input id="email" name="emai" type="text" placeholder="example@domain.com" required />
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
                                    <img src="{!! asset('member/images/logo_footer.png') !!}" alt="log" />
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
    <script type="text/javascript" src="{!! asset('member/js/jquery.easing.1.3.js') !!}"></script>
    <script src="{!! asset('member/js/jquery.fancybox-1.3.4.pack.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('member/js/scroll/jquery.bxslider.js') !!}" type="text/javascript"></script>
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
    <script type="text/javascript" src="{!! asset('member/js/slide/jquery.themepunch.plugins.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('member/js/slide/jquery.themepunch.revolution.min.js') !!}"></script>
    <script src="{!! asset('member/js/screen2.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('member/js/jquery.nav2.js') !!}" type="text/javascript"></script>
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