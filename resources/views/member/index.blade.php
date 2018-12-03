
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">

<title>Poker Responsive Site Template</title>
<meta name="description" content="Place to put your description text"/>
<meta name="author" content="Corsini Alessio"/>
<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<link rel="stylesheet" href="{!! asset('member/css/base2.css') !!}"/>
<link href="{!! asset('member/css/jquery.bxslider_index.css')!!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('member/css/jquery.fancybox-1.3.4_2.css" rel="stylesheet') !!}" type="text/css" />
<link href="{!! asset('member/css/slide/settings.css')!!}" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.png">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
<link href="{!! asset('member/css/tabs.css')!!}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{!! asset('member/css/screen3.css')!!}"/>
<link rel="apple-touch-icon" sizes="114x114" href="{!! asset('member/images/apple-touch-icon-114x114.png')!!}">
<link href="{!! asset('member/css/font-awesome-4.0.1/css/font-awesome.min.css')!!}" rel="stylesheet" type="text/css" />
<link href="{!! asset('member/css/menu.css')!!}" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
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
    <img src="{!! ('member/images/logo2.jpg') !!}" alt="log" />
  </div>
  <!-- mega menu -->
			<ul id="navmenu" class="poker-mega-menu poker-mega-menu-anim-scale poker-mega-menu-response-to-icons">
				<li class="menu-first-li">
					<a class="link_onepage" href="#toplineright"><i class="fa fa-single fa-home"></i></a>
                    <div class="grid-container2">
						<ul><li><a href="index2.html"><i class="fa fa-globe"></i>Home Page 1</a></li></ul>
					</div>
				</li>
			    <li>
			        <a href="#"><i class="fa fa-eye"></i>Game</a>
			        <div class="grid-container3">
			            <ul>
			                <li><a class="link_onepage" href="#texas"><i class="fa fa-check"></i>Texas Hold 'em</a></li>
			                <li><a class="link_onepage" href="#game"><i class="fa fa-check"></i>Other Games</a></li>
			            </ul>
			        </div>
			    </li>
                <li><a class="link_onepage" href="#tournaments"><i class="fa fa-briefcase"></i>Tournaments</a></li>
                <li aria-haspopup="true">
					<a class="link_onepage" href="#section-3"><i class="fa fa-star"></i>About us</a>
					<div class="grid-container4">
						<ul>
							<li><a href="more_details.html"><i class="fa fa-check"></i>Page Details 1</a></li>
							<li><a href="more_details2.html"><i class="fa fa-check"></i>Page Details 2</a></li>
                            <li><a href="blog.html"><i class="fa fa-check"></i>Blog Simple</a></li>
                            <li><a href="blog_column.html"><i class="fa fa-check"></i>Blog Column Right</a></li>
						</ul>
					</div>
				</li>
				<li><a class="link_onepage" href="#section-4"><i class="fa fa-bullhorn"></i>Events</a></li>
				<li><a class="link_onepage" href="#section-6"><i class="fa fa-single fa-envelope"></i></a></li>

				<li aria-haspopup="true" class="right last">
					<a href="#"><i class="fa fa-sign-in"></i>Login</a>
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
<!-- Slider -->
<div id="section-1">
<div class="slidePoint" id="slide0" data-slide="1" data-stellar-background-ratio="0.5">
    <div class="padding_slide1">
        <div class="clearfix">
                    <div class="slide-contentfull">
                        <div class="fullwidthbanner-container">
                            <div class="fullwidthbanner">
                                <ul>
                                    <li data-transition="fade" data-slotamount="10" data-thumb="#">
                                        <img src="images/slides/1.jpg" alt=""/>
                                        <div class="caption lfl small_text img-arleft" data-x="-60" data-y="150" data-speed="600" data-start="1600" data-easing="easeOutExpo"><img src="images/slides/power.png" alt=""/></div>
                                        <div class="caption lfl small_text img-arleft" data-x="-40" data-y="210" data-speed="900" data-start="1300" data-easing="easeOutExpo"><img src="images/rb.png" alt=""/></div>
                                        <div class="caption lft medium_black" data-x="70" data-y="190" data-speed="400" data-start="1000" data-easing="easeOutExpo"><p class="blackbold">RESPONSIVE</p></div>
                                        <div class="caption fade medium_black" data-x="70" data-y="300" data-speed="600" data-start="1500" data-easing="easeInOutElastic"><p>TOUCH SWIPE NAVIGATION</p></div>
                                        <div class="caption sfb small_text" data-x="80" data-y="390" data-speed="1200" data-start="2400" data-easing="easeOutExpo"><img src="images/ipad1.png" alt=""/></div>
                                        <div class="caption sfb small_text" data-x="180" data-y="510" data-speed="1200" data-start="3400" data-easing="easeOutExpo"><img src="images/hand.png" alt=""/></div>
                                        <div class="caption sfr small_text" data-x="410" data-y="350" data-speed="900" data-start="2500" data-easing="easeOutExpo"><img src="images/slides/line1.png" alt=""/></div>
                                        <div class="caption sfr small_text_desc" data-x="530" data-y="350" data-speed="900" data-start="2500" data-easing="easeOutExpo">
                                            <p>Limited-time offer : </p>
                                            <p>Deposit and free $20!</p>
                                        </div>
                                        <div class="caption fade" data-x="580" data-y="450" data-speed="2000" data-start="3300" data-easing="easeInOutElastic"><img class="guarantee" src="images/guarantee.png" alt="guarantee"/></div>
                                    </li>
                                    <li data-transition="slideright" data-slotamount="6" data-thumb="#">
                                        <img src="images/slides/2.jpg" alt=""/>
                                        <div class="caption sfb medium_text" data-x="40" data-y="420" data-speed="1200" data-start="2400" data-easing="easeOutExpo"><p>RESPONSIVE DESIGN</p></div>
                                        <div class="caption sfb medium_text" data-x="40" data-y="470" data-speed="1200" data-start="2600" data-easing="easeOutExpo"><p>Parallax version</p></div>
                                        <div class="caption sfb medium_text" data-x="40" data-y="520" data-speed="1200" data-start="2800" data-easing="easeOutExpo"><p>CSS3 Animation</p></div>
                                        <div class="caption sfr small_text imgimac" data-x="440" data-y="320" data-speed="500" data-start="1200" data-easing="easeOutExpo"><img src="images/imac.png" alt=""/></div>
                                         <div class="caption sfr small_text imgipad" data-x="420" data-y="430" data-speed="600" data-start="1800" data-easing="easeOutExpo"><img src="images/ipad.png" alt=""/></div>
                                        <div class="caption lft medium_black" data-x="40" data-y="150" data-speed="400" data-start="2800" data-easing="easeOutExpo"><p class="blackbold">Your poker web site </p></div>
                                        <div class="caption lft medium_black" data-x="40" data-y="255" data-speed="600" data-start="3000" data-easing="easeOutExpo"><p>Business solution</p></div>
                                    </li>
                                    <li id="money" data-transition="slideright" data-slotamount="6" data-thumb="#">
                                        <img src="images/slides/3.jpg" alt=""/>
                                        <div class="caption sfb small_text" data-x="100" data-y="420" data-speed="1200" data-start="2400" data-easing="easeOutExpo"><img src="images/banner1-man.png" alt=""/></div>
                                        <div class="caption lft medium_black" data-x="70" data-y="150" data-speed="400" data-start="2800" data-easing="easeOutExpo"><p class="blackbold">Your game your money</p></div>
                                        <div class="caption lft medium_black" data-x="70" data-y="255" data-speed="600" data-start="3000" data-easing="easeOutExpo"><p>Million solution</p></div>
                                        <div class="caption lfl small_text" data-x="150" data-y="320" data-speed="900" data-start="1400" data-easing="easeOutExpo"><img src="images/slides/rb.png" alt=""/></div>
                                        <div class="caption lfl small_text" data-x="-20" data-y="500" data-speed="900" data-start="1200" data-easing="easeOutExpo"><img src="images/slides/ru.png" alt=""/></div>
                                        <div class="caption lfr small_text" data-x="600" data-y="320" data-speed="900" data-start="1400" data-easing="easeOutExpo"><img src="images/slides/lb.png" alt=""/></div>
                                        <div class="caption lfr small_text" data-x="800" data-y="500" data-speed="900" data-start="1200" data-easing="easeOutExpo"><img src="images/slides/lu.png" alt=""/></div>
                                        <div class="caption lfl small_text" data-x="110" data-y="270" data-speed="900" data-start="1600" data-easing="easeOutExpo"><img src="images/slides/b.png" alt=""/></div>
                                        <div class="caption lfl small_text" data-x="-70" data-y="570" data-speed="900" data-start="1500" data-easing="easeOutExpo"><img src="images/slides/a.png" alt=""/></div>
                                        <div class="caption lfr small_text" data-x="620" data-y="270" data-speed="900" data-start="1600" data-easing="easeOutExpo"><img src="images/slides/a.png" alt=""/></div>
                                        <div class="caption lfr small_text" data-x="840" data-y="570" data-speed="900" data-start="1500" data-easing="easeOutExpo"><img src="images/slides/c.png" alt=""/></div>
                                    </li>
                                </ul>
                                <div class="tp-bannertimer"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
        </div>
    </div>
</div>
</div>
    <section id="programbg">
        <article class="header-content">
            <div class="container header-support">
                <div class="one_fourth">
                    <i class="fa fa-coffee"></i>
                    <div class="clearfix"></div>
                    <h3 class="nocaps">Responsive Design</h3>
                    <p>There are variations available majoritaey suffered alteration words which look even believable.</p>
                    <br>
                    <a href="#" class="readmore_but1">Read more +</a>
                </div>
                <div class="one_fourth">
                    <i class="fa fa-leaf"></i>
                    <div class="clearfix"></div>
                    <h3 class="nocaps">Validation HTML</h3>
                    <p>There are variations available majoritaey suffered alteration words which look even believable.</p>
                    <br>
                    <a href="#" class="readmore_but1">Read more +</a>
                </div>
                <div class="one_fourth active">
                    <i class="fa fa-cog"></i>
                    <div class="clearfix"></div>
                    <h3 class="nocaps">Multiple Headers</h3>
                    <p>There are variations available majoritaey suffered alteration words which look even believable.</p>
                    <br>
                    <a href="#" class="readmore_but1">Read more +</a>
                </div>
                <div class="one_fourth last">
   		            <i class="fa fa-trophy"></i>
                    <div class="clearfix"></div>
    	            <h3 class="nocaps">Two Home Pages</h3>
                    <p>There are variations available majoritaey suffered alteration words which look even believable.</p>
                    <br>
                    <a href="#" class="readmore_but1">Read more +</a>
                </div>
            </div><!-- end container -->
        </article>
    </section>
<div class="clear"></div>
  <!-- Texas Holdem -->
  <div id="section-holdem" class="programinfo">
      <div class="container">
          <div id="texas" class="two_third_contact lastcolumn">
              <div id="blockTitle1" class="block_title">
                  <h2>Texas <span class="secondtxt">Hold 'em</span></h2>
                  <div class="g-hr type_short"><span class="g-hr-h"><i class="fa fa-dot-circle-o"></i></span></div>
                  <h3 class="subtitle_poker">PROIN GRAVIDA NIBH VEL VELIT AUCTOR ALIQUET. AENEAN SOLLICITUDIN LOREM QUIS.</h3>
              </div>
                <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </p>
                <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </p>
           </div>
      </div>
       <div class="container texas-space">
           <div class="grid_item content-item hidden fadeInUp">
               <img class="img_holdem" src="images/design_multitouch.jpg" alt="" />
           </div>
           <div class="clear"></div>
           <!-- tabs -->
           <div class="more">
           <ul class="ca-menu">
                    <li>
                        <a href="#">
                            <div class="img-content"><img class="ca-icon" src="images/2.jpg" alt="" /></div>
                            <div class="clear"></div>
                            <div class="ca-content">
                                <h2 class="ca-main">House Rules</h2>
                                 <p>Once you’ve made your deposit, you need to earn VIP Player Points (VPPs) by playing real money games on PokerClub.</p>
                                <h3 class="ca-sub">Personalized to your needs</h3>
                            </div>
                        </a>
                    </li>
                    <li class="select">
                        <a href="#">
                            <div class="img-content"><img class="ca-icon" src="images/1.jpg" alt="" /></div>
                            <div class="clear"></div>
                            <div class="ca-content">
                                <h2 class="ca-main">Cash Games</h2>
                                <p>Once you’ve made your deposit, you need to earn VIP Player Points (VPPs) by playing real money games on PokerClub.</p>
                                <h3 class="ca-sub">Advanced use of technology</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="img-content"><img class="ca-icon" src="images/3.jpg" alt="" /></div>
                            <div class="clear"></div>
                            <div class="ca-content">
                                <h2 class="ca-main">Shedule</h2>
                                <p>Once you’ve made your deposit, you need to earn VIP Player Points (VPPs) by playing real money games on PokerClub.</p>
                                <h3 class="ca-sub">Understanding visually</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="img-content"><img class="ca-icon" src="images/4.jpg" alt="" /></div>
                            <div class="ca-content">
                                <h2 class="ca-main">Poker Parties</h2>
                                <p>Once you’ve made your deposit, you need to earn VIP Player Points (VPPs) by playing real money games on PokerClub.</p>
                                <h3 class="ca-sub">Professionals in action</h3>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
           <h2 class="section_title_white">SOME <span class="secondtxt">FUN FACTS</span></h2>
           <div class="facts">
				<div class="one_fourth fact">
					<a class="fact-icon"><i class="fa fa-briefcase"></i></a>
					<div class="fact-number" data-perc="630">
						<h1 class="factor light">630</h1>
						<h3 class="light uppercase">Project Finished</h3>
					</div><!-- End Factor Area -->
				</div><!-- End Factor -->
				<div class="one_fourth fact">
					<a class="fact-icon"><i class="fa fa-pagelines"></i></a>
					<div class="fact-number" data-perc="250">
						<h1 class="factor">250</h1>
						<h3 class="light uppercase">Clients Worked</h3>
					</div><!-- End Factor Area -->
				</div><!-- End Factor -->
				<div class="one_fourth fact">
					<a class="fact-icon"><i class="fa fa-comments"></i></a>
					<div class="fact-number" data-perc="320">
						<h1 class="factor light">320</h1>
						<h3 class="light uppercase">Pizza Ordered</h3>
					</div><!-- End Factor Area -->
				</div><!-- End Factor -->
				<div class="one_fourth last fact">
					<a class="fact-icon"><i class="fa fa-coffee"></i></a>
					<div class="fact-number" data-perc="840">
						<h1 class="factor light">840</h1>
						<h3 class="light uppercase">Coffee Cups</h3>
					</div><!-- End Factor Area -->
				</div><!-- End Factor -->
				<div class="clear"></div>
			</div>
             <div class="clear"></div>
      </div>
  </div>
      <section id="top_banner" class="paralax1">
      <div class="quote-icon"><img src="{!! ('member/images/icon_logo2.png') !!}}" alt="" /></div>
        <article>
        <div class="container img_arrow">
            <div class="one_third_banner holdem_banner">
                <p class="title_ban"><span class="">Italian Chanpionship! </span></p>
                <hr/>
                <div class="hi-icon-wrap hi-icon-effect-1 hi-icon-effect-1a">
                    <a href="#" ><i class="hi-icon fa fa-heart" style=""></i></a>
                </div>
                <p class="desc_ban">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. </p>
            </div>
            <div class="one_third_banner holdem_banner">
                <p class="title_ban"><span class="">France Chanpionship! </span></p>
                <hr/>
                <div class="hi-icon-wrap hi-icon-effect-1 hi-icon-effect-1a">
                    <a href="#" ><i class="hi-icon fa fa-bars"></i></a>
                </div>
                <p class="desc_ban">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. </p>
            </div>
            <div class="one_third_banner holdem_banner last">
                <p class="title_ban"><span class="">Poland Chanpionship! </span></p>
                <hr/>
                <div class="hi-icon-wrap hi-icon-effect-1 hi-icon-effect-1a">
                    <a href="#" ><i class="hi-icon fa fa-laptop"></i></a>
                </div>
                <p class="desc_ban">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. </p>
            </div>
          </div>
        </article>
        <div class="parallax"></div>
      </section>
  <!-- Content Part - Other Games -->
  <div id="game" class="programroulette">
    <div class="container">
      <div class="two_third_contact">
       <div id="blockTitle2" class="block_title">
            <h2>Other <span class="secondtxt">Games</span></h2>
            <div class="g-hr type_short"><span class="g-hr-h"><i class="fa fa-dot-circle-o"></i></span></div>
            <h3 class="subtitle_poker">PROIN GRAVIDA NIBH VEL VELIT AUCTOR ALIQUET. AENEAN SOLLICITUDIN.</h3>
        </div>
          <p class="special">Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
          <div class="clear"></div>
          <div class="game-ipad-img">
              <div class="luxe-animate hidden fadeInUp" ><br>
                  <img class="aligncenter" alt="iPad Retina display (white)" src="images/imac2.png"/>
                  </div>
              <p></p>
          </div><div class="clear"></div>
          <h3 class="bxslider_title">Recent News & Blog</h3>
          <div class="slider1">
              <div class="slide">
                  <img src="images/carusel1.jpg" alt=""/>
                     <div class="desc"><span>24</span><br>
                      <em>May 2014</em>
                      <h2>Night in <strong>Manhattan</strong></h2>
                      <p><a href="#">by Alessio Corsini</a></p>
                    </div>
              </div>
              <div class="slide">
                  <img src="images/carusel2.jpg" alt=""/>
                  <div class="desc"><span>21</span><br>
                      <em>May 2014</em>
                      <h2>Night in <strong>Manhattan</strong></h2>
                      <p><a href="#">by Alessio Corsini</a></p>
                    </div>
              </div>
              <div class="slide">
                  <img src="images/carusel3.jpg" alt=""/>
                  <div class="desc"><span>18</span><br>
                      <em>May 2014</em>
                      <h2>Night in <strong>Manhattan</strong></h2>
                      <p><a href="#">by Alessio Corsini</a></p>
                    </div>
              </div>
              <div class="slide">
                  <img src="images/carusel3.jpg" alt=""/>
                  <div class="desc"><span>16</span><br>
                      <em>May 2013</em>
                      <h2>Night in <strong>Manhattan</strong></h2>
                      <p><a href="#">by Alessio Corsini</a></p>
                    </div>
              </div>
              <div class="slide">
                  <img src="images/carusel3.jpg" alt=""/>
                  <div class="desc"><span>05</span><br>
                      <em>May 2013</em>
                      <h2>Night in <strong>Manhattan</strong></h2>
                      <p><a href="#">by Alessio Corsini</a></p>
                    </div>
              </div>
              <div class="slide">
                  <img src="images/carusel3.jpg" alt=""/>
                  <div class="desc"><span>06</span><br>
                      <em>May 2012</em>
                      <h2>Night in <strong>Manhattan</strong></h2>
                      <p><a href="#">by Alessio Corsini</a></p>
                    </div>
              </div>
              <div class="slide">
                  <img src="images/carusel3.jpg" alt=""/>
                  <div class="desc"><span>12</span><br>
                      <em>May 2012</em>
                      <h2>Night in <strong>Manhattan</strong></h2>
                      <p><a href="#">by Alessio Corsini</a></p>
                    </div>
              </div>
              <div class="slide">
                  <img src="images/carusel3.jpg" alt=""/>
                  <div class="desc"><span>14</span><br>
                      <em>May 2011</em>
                      <h2>Night in <strong>Manhattan</strong></h2>
                      <p><a href="#">by Alessio Corsini</a></p>
                    </div>
              </div>
              <div class="slide">
                  <img src="images/carusel3.jpg" alt=""/>
                  <div class="desc"><span>09</span><br>
                      <em>May 2011</em>
                      <h2>Night in <strong>Manhattan</strong></h2>
                      <p><a href="#">by Alessio Corsini</a></p>
                    </div>
              </div>
            </div>
    </div>
  </div>
  </div>
<!-- Tournament Table Intro -->
  <section id="tournaments">
   <div class="quote-icon"><img src="images/icon_logo2.png" alt="" /></div>
  <div class="parallax">
    <article class="clearfix">
        <div class="container">
            <section>
        <article id="blockTitle6">
          <h2 class="section_title_white">Hold 'em <span class="secondtxt">Tournaments</span></h2>
        </article>
      </section>
      <br/>
            <section id="calendartable">
                <article>
                    <div class="one_sixth">
                        <h3> - Weeks - </h3>
                        <ul class="item_one">
                            <li><a href=""> Day </a><p>1 - 8</p></li>
                            <li class="speciallist"><a href=""> Day </a><p>9 - 15</p></li>
                            <li><a href=""> Day </a><p>16 - 22</p></li>
                            <li class="speciallist"> <a href=""> Day </a><p>23 - 29</p></li>
                        </ul>
                    </div>
                    <div class="one_sixth">
                        <h3> - Sunday - </h3>
                        <ul class="item_one">
                            <li class="speciallist"> <a href="#info1" class="fancybox_table thumb"> Db Chance </a><p>20.00</p></li>
                            <li> <a href="#info1" class="fancybox_table thumb"> Db Chance </a><p>20.00</p></li>
                            <li class="speciallist"> <a href="#info1" class="fancybox_table thumb"> Db Chance </a><p>20.00</p></li>
                            <li> <a href="#info1" class="fancybox_table thumb"> Db Chance </a><p>20.00</p></li>
                        </ul>
                    </div>
                    <div class="one_sixth">
                        <h3> - Monday - </h3>
                        <ul class="item_one">
                            <li> <a href="#info2" class="fancybox_table thumb" > Bounty Mon </a><p>20.00</p></li>
                            <li class="speciallist"> <a href="#info2" class="fancybox_table thumb" > Bounty Mon </a><p>20.00</p></li>
                            <li> <a href="#info2" class="fancybox_table thumb" > Bounty Mon </a><p>20.00</p></li>
                            <li class="speciallist"> <a href="#info2" class="fancybox_table thumb" > Bounty Mon </a><p>20.00</p></li>
                        </ul>
                    </div>
                    <div class="one_sixth">
                        <h3> - Tuesday - </h3>
                        <ul class="item_two">
                            <li class="speciallist"> <a href="#info3" class="fancybox_table thumb"> Freezout </a><p class="value"> 22.00 </p></li>
                            <li> <a href="#info3" class="fancybox_table thumb"> Freezout </a><p class="value"> 22.00 </p></li>
                            <li class="speciallist"> <a href="#info3" class="fancybox_table thumb"> Freezout </a><p class="value"> 22.00 </p></li>
                            <li> <a href="#info3" class="fancybox_table thumb"> Freezout </a><p class="value"> 22.00 </p></li>
                        </ul>
                    </div>
                    <div class="one_sixth">
                        <h3> - Wednes - </h3>
                        <ul class="item_three">
                            <li><a href="#info4" class="fancybox_table thumb"> Lucky </a><p class="value"> 19.00 </p></li>
                            <li class="speciallist"> <a href="#info4" class="fancybox_table thumb"> Lucky </a><p class="value"> 19.00 </p></li>
                            <li><a href="#info4" class="fancybox_table thumb"> Lucky </a><p class="value"> 19.00 </p></li>
                            <li class="speciallist"> <a href="#info4" class="fancybox_table thumb"> Lucky </a><p class="value"> 19.00 </p></li>
                        </ul>
                    </div>
                    <div class="one_sixth">
                        <h3> - Thurs - </h3>
                        <ul class="item_four">
                            <li class="speciallist"> <a href="#info5" class="fancybox_table thumb"> Db Chance </a><p class="value"> 18.00 </p></li>
                            <li> <a href="#info5" class="fancybox_table thumb"> Db Chance </a><p class="value"> 18.00 </p>
                            </li>
                            <li class="speciallist"> <a href="#info5" class="fancybox_table thumb"> Db Chance </a><p class="value"> 18.00 </p></li>
                            <li> <a href="#info5" class="fancybox_table thumb"> Db Chance </a><p class="value"> 18.00 </p></li>
                        </ul>
                    </div>
                    <div class="one_sixth">
                        <h3> - Friday - </h3>
                        <ul class="item_five">
                            <li> <a href="#info6" class="fancybox_table thumb"> Deep Stack </a><p class="value"> 22.00 </p></li>
                            <li class="speciallist"> <a href="#info6" class="fancybox_table thumb"> Deep Stack </a><p class="value"> 22.00 </p></li>
                            <li> <a href="#info6" class="fancybox_table thumb"> Deep Stack </a><p class="value"> 22.00 </p></li>
                            <li class="speciallist"> <a href="#info6" class="fancybox_table thumb"> Deep Stack </a><p class="value"> 22.00 </p></li>
                        </ul>
                    </div>
                    <div class="one_sixth lastcolumn">
                        <h3> - Saturday - </h3>
                        <ul class="item_six">
                            <li class="speciallist"> <a href="#info7" class="fancybox_table thumb"> Freezeout </a><p>21.00</p></li>
                            <li> <a href="#info7" class="fancybox_table thumb"> Freezeout </a><p>21.00</p></li>
                            <li class="speciallist"> <a href="#info7" class="fancybox_table thumb"> Freezeout </a><p>21.00</p></li>
                            <li> <a href="#info7" class="fancybox_table thumb"> Freezeout </a><p>21.00</p></li>
                        </ul>
                    </div>
                    <div id="info1">
                        <p class="title_tourn"><strong>Double Change</strong></p>
                        <p><strong>Starting Time:</strong>	19:00:00</p>
                        <p><strong>Buy In:</strong>	€40+5</p>
                        <p><strong>Stack:</strong>	12K</p>
                        <p><strong>Blinds:</strong>	20 mins</p>
                        <p><strong>Punct. Bonus:</strong>	1K</p>
                        <p><strong>Caps:</strong>	60 players</p>
                    </div>
                    <div id="info2">
                        <p class="title_tourn"><strong>Bounty Monday</strong></p>
                        <p><strong>Starting Time:</strong>	20:00:00</p>
                        <p><strong>Buy In:</strong>	€30+10+5</p>
                        <p><strong>Stack:</strong>	10K</p>
                        <p><strong>Blinds:</strong>	20 mins</p>
                        <p><strong>Punct. Bonus:</strong>	1K</p>
                        <p><strong>Caps:</strong>	60 players</p>
                    </div>
                    <div id="info3">
                        <p class="title_tourn"><strong>Freezout Tuesday</strong></p>
                        <p><strong>Starting Time:</strong>	20:00:00</p>
                        <p><strong>Buy In:</strong>	€50+5</p>
                        <p><strong>Stack:</strong>	10K</p>
                        <p><strong>Blinds:</strong>	20/25 mins</p>
                        <p><strong>Punct. Bonus:</strong>	1K</p>
                        <p><strong>Caps:</strong>	60 players</p>
                    </div>
                    <div id="info4">
                        <p class="title_tourn"><strong>Lucky Wednesday</strong></p>
                        <p><strong>Starting Time:</strong>	20:00:00</p>
                        <p><strong>Buy In:</strong>	€10+5 (unlim. rebuy)</p>
                        <p><strong>Stack:</strong>	5K</p>
                        <p><strong>Blinds:</strong>	20 mins</p>
                        <p><strong>Punct. Bonus:</strong>	1K</p>
                        <p><strong>Caps:</strong>	60 players</p>
                    </div>
                    <div id="info5">
                        <p class="title_tourn"><strong>Double Change</strong></p>
                        <p><strong>Starting Time:</strong>	20:00:00</p>
                        <p><strong>Buy In:</strong>	€30+5</p>
                        <p><strong>Stack:</strong>	10K</p>
                        <p><strong>Blinds:</strong>	20 mins</p>
                        <p><strong>Punct. Bonus:</strong>	1K</p>
                        <p><strong>Caps:</strong>	60 players</p>
                    </div>
                    <div id="info6">
                        <p class="title_tourn"><strong>Deep Stack Fridays</strong></p>
                        <p><strong>Starting Time:</strong>	21:00:00</p>
                        <p><strong>Buy In:</strong>	€100+10 (1 rebuy)</p>
                        <p><strong>Stack:</strong>	20K</p>
                        <p><strong>Blinds:</strong>	25 mins</p>
                        <p><strong>Punct. Bonus:</strong>	1K</p>
                        <p><strong>Caps:</strong>	60 players</p>
                    </div>
                    <div id="info7">
                        <p class="title_tourn"><strong>Freezeout</strong></p>
                        <p><strong>Starting Time:</strong>	20:00:00</p>
                        <p><strong>Buy In:</strong>	€30+5</p>
                        <p><strong>Stack:</strong>	12K</p>
                        <p><strong>Blinds:</strong>	20 mins</p>
                        <p><strong>Punct. Bonus:</strong>	1K</p>
                        <p><strong>Caps:</strong>	60 players</p>
                    </div>
                </article>
            </section>
        </div>
    </article>
    </div>
  </section>
  <!-- Content Part - Club -->
  <div id="section-3" class="club">
    <div class="container gallery">
      <section>
        <article id="blockTitle4" class="block_title">
          <h2>About <span class="secondtxt">Poker Club</span></h2>
          <div class="g-hr type_short"><span class="g-hr-h"><i class="fa fa-bookmark-o"></i></span></div>
          <p>The Poker Club has quickly established itself as a definite must for locals and tourists alike.  The concept behind The Casino is to make patrons feel at home, while providing them with an exciting experience in a luxurious environment.</p>
          <p>The atmosphere in the casino is always vibrant, especially during the evening, where patrons may enjoy an exquisite dinner in the brasserie or simply a refreshing drink in our newly refurbished lounge area.</p>
          <p>There are ample parking spaces for visitors to the area therefore finding a car space close to the casino is only a press of a button away.</p>
        <div class="clear"></div>
        </article>
      </section>
      <br/>
        <article class="grid_3_banner clubbox">
            <div class="pricing-table pricing-table-inverse animated fadeInRight" data-animate="fadeInRight">
                <div class="panel text-center">
                    <div class="panel-heading panel-heading-bronze">
                        <div class="pricing-table-title">BronzeStar</div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><div class="pricing-table-price"><h1>$15.99 <span>/month</span></h1></div></li>
                        <li class="list-group-item">Feature 1</li>
                        <li class="list-group-item">Feature 2</li>
                        <li class="list-group-item">Feature 3</li>
                        <li class="list-group-item">Feature 4</li>
                        <li class="list-group-item">Feature 5</li>
                    </ul>
                    <div class="pricing-table-footer">
                        <a class="btn btn-lg btn-block btn-primary">Order Now</a>
                    </div>
                </div>
            </div>
        </article>
        <article class="grid_3_banner clubbox">
            <div class="pricing-table pricing-table-inverse animated fadeInRight" data-animate="fadeInRight">
                <div class="panel text-center">
                    <div class="panel-heading panel-heading-silver">
                        <div class="pricing-table-title">SilverStar</div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><div class="pricing-table-price"><h1>$35.99 <span>/month</span></h1></div></li>
                        <li class="list-group-item">Feature 1</li>
                        <li class="list-group-item">Feature 2</li>
                        <li class="list-group-item">Feature 3</li>
                        <li class="list-group-item">Feature 4</li>
                        <li class="list-group-item">Feature 5</li>
                    </ul>
                    <div class="pricing-table-footer">
                        <a class="btn btn-lg btn-block btn-primary">Order Now</a>
                    </div>
                </div>
            </div>
        </article>
        <article class="grid_3_banner clubbox">
            <div class="pricing-table pricing-table-inverse animated fadeInRight" data-animate="fadeInRight">
                <div class="panel text-center">
                    <div class="panel-heading panel-heading-gold">
                        <div class="pricing-table-title">GoldStar</div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><div class="pricing-table-price"><h1>$93.99 <span>/month</span></h1></div></li>
                        <li class="list-group-item">Feature 1</li>
                        <li class="list-group-item">Feature 2</li>
                        <li class="list-group-item">Feature 3</li>
                        <li class="list-group-item">Feature 4</li>
                        <li class="list-group-item">Feature 5</li>
                    </ul>
                    <div class="pricing-table-footer">
                        <a class="btn btn-lg btn-block btn-primary">Order Now</a>
                    </div>
                </div>
            </div>
        </article>
        <article class="grid_3_banner lastcolumn clubbox">
            <div class="pricing-table pricing-table-inverse animated fadeInRight" data-animate="fadeInRight">
                <div class="panel text-center">
                    <div class="panel-heading panel-heading-supernova">
                        <div class="pricing-table-title">Supernova</div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><div class="pricing-table-price"><h1>$152.99 / <span>month</span></h1></div></li>
                        <li class="list-group-item">Feature 1</li>
                        <li class="list-group-item">Feature 2</li>
                        <li class="list-group-item">Feature 3</li>
                        <li class="list-group-item">Feature 4</li>
                        <li class="list-group-item">Feature 5</li>
                    </ul>
                    <div class="pricing-table-footer">
                        <a class="btn btn-lg btn-block btn-primary">Order Now</a>
                    </div>
                </div>
            </div>
        </article>
    </div>
  </div>

 <!-- Content Part - Events -->
<div id="services">
    <section id="events">
        <div class="parallax">
            <article class="clearfix">
                <div class="container services-our">
                    <h2 class="section_title_white">Our <span class="secondtxt">Services</span></h2>
                    <div class="one_fourth">
                        <div class="box">
                            <div class="image">
                                <div>
                                    <i class="fa fa-coffee"></i>
                                    <h4 class="nocaps">Design</h4>
                                </div>
                            </div>
                            <div class="text">
                                <div><h4 class="nocaps">Design</h4> Lorem ipsum dolor sit amet, consectetuer  elit. Suspen disse et justo.</div>
                            </div>
                        </div>
                    </div>
                    <div class="one_fourth">
                        <div class="box">
                            <div class="image">
                                <div>
                                    <i class="fa fa-desktop"></i>
                                    <h4 class="nocaps">Devolopment</h4>
                                </div>
                            </div>
                            <div class="text">
                                <div><h4 class="nocaps">Devolopment</h4> Lorem ipsum dolor sit amet, consectetuer  elit. Suspen disse et justo.</div>
                            </div>
                        </div>
                    </div>
                    <div class="one_fourth">
                        <div class="box">
                            <div class="image">
                                <div>
                                    <i class="fa fa-search"></i>
                                    <h4 class="nocaps">Branding</h4>
                                </div>
                            </div>
                            <div class="text">
                                <div><h4 class="nocaps">Branding</h4> Lorem ipsum dolor sit amet, consectetuer  elit. Suspen disse et justo.</div>
                            </div>
                        </div>

                    </div>
                    <div class="one_fourth last">
                        <div class="box">
                            <div class="image">
                                <div>
                                    <i class="fa fa-camera"></i>
                                    <h4 class="nocaps">Photography</h4>
                                </div>
                            </div>
                            <div class="text">
                                <div><h4 class="nocaps">Photography</h4> Lorem ipsum dolor sit amet, consectetuer  elit. Suspen disse et justo.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
    </div>
  <!-- Content Part - Gallery -->
  <div id="section-4" class="eventsgallery">
    <div class="container gallery">
      <div id="blockTitle5" class="block_title">
          <h2>Events <span class="secondtxt">Gallery</span></h2>
          <div class="g-hr type_short"><span class="g-hr-h"><i class="fa fa-eye"></i></span></div>
           <h3 class="subtitle_poker">PROIN GRAVIDA NIBH VEL VELIT AUCTOR ALIQUET. AENEAN SOLLICITUDIN..</h3>
      </div>
      <div class="clear"></div>
      <!-- FILTER CONTROLS -->
			<div class="controls control_align">
				<ul class="filter-buttons">
					<li class="filter selected" data-filter="all">Show All</li>
					<li class="filter" data-filter="category_1">Cat. 1</li>
					<li class="filter" data-filter="category_2">Cat. 2</li>
					<li class="filter" data-filter="category_3">Cat. 3</li>
					<li class="filter" data-filter="category_3 category_1">Cat. 1 &amp; 3</li>
				</ul>
			</div>
			<!-- SORT CONTROLS -->
        <div class="controls">
            <ul class="filter-buttons">
                <li class="sort active sort-firs" data-sort="default" data-order="desc">Default</li>
                <li class="sort" data-sort="data-cat" data-order="desc">Descending</li>
                <li class="sort" data-sort="data-cat" data-order="asc">Ascending</li>
            </ul>
        </div>
        </div>
            <ul id="Grid" class="grid cs-style-1"><!-- GRID -->
				<li class="mix category_1 one_third_gallery_wild" data-cat="1">
                    <figure class="2014 clearfix">
                        <div class="layer">
                            <div class="portfolio-info">
                                <p class="gallery_title">BRASIL CHAMPIONSHIP</p>
                                <p class="gallery_desc">Date: 14/10/2013</p>
                                <p class="gallery_desc">Time: 17:00</p>
                                <p class="gallery_desc">Buy-in: $650+50</p>
                                <p class="gallery_desc">At vero eos et accusam et justo duo dolores et ea rebum.</p>
                                <a href="more_details.html" class="icon-effect"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <img class="" src="images/event2.jpg" alt="alt" />
                    </figure>
                </li>
				<li class="mix category_3 one_third_gallery_wild" data-cat="3">
                    <figure class="2014 clearfix">
                            <div class="layer">
                            <div class="portfolio-info">
                                <p class="gallery_title">CARIBBEAN ADVENTURE</p>
                                <p class="gallery_desc"><i class="fa fa-calendar-o"></i> Date: 14/10/2013</p>
                                <p class="gallery_desc"><i class="fa fa-clock-o"></i> Time: 17:00</p>
                                <p class="gallery_desc"><i class="fa fa-money"></i> Buy-in: $650+50</p>
                                <p class="gallery_desc">At vero eos et accusam et justo duo dolores et ea rebum.</p>
                                <a href="more_details.html" class="icon-effect"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <img class="" src="images/event5.jpg" alt="alt" />
                    </figure>
                </li>
				<li class="mix category_2 one_third_gallery_wild" data-cat="2">
                    <figure class="2014 clearfix">
                        <div class="layer">
                            <div class="portfolio-info">
                                <p class="gallery_title">RUSSIAN POKER SERIES</p>
                                <p class="gallery_desc"><i class="fa fa-calendar-o"></i> Date: 14/10/2013</p>
                                <p class="gallery_desc"><i class="fa fa-clock-o"></i> Time: 17:00</p>
                                <p class="gallery_desc"><i class="fa fa-money"></i> Buy-in: $650+50</p>
                                <p class="gallery_desc">At vero eos et accusam et justo duo dolores et ea rebum.</p>
                                <a href="more_details.html" class="icon-effect"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                         <img class="" src="images/event4.jpg" alt="alt" />
                    </figure>
                </li>
				<li class="mix category_3 one_third_gallery_wild" data-cat="3">
                    <figure class="2014 clearfix">
                        <div class="layer">
                            <div class="portfolio-info">
                                <p class="gallery_title">ITALIAN CHAMPIONSHIP</p>
                                <p class="gallery_desc"><i class="fa fa-calendar-o"></i> Date: 14/10/2013</p>
                                <p class="gallery_desc"><i class="fa fa-clock-o"></i> Time: 17:00</p>
                                <p class="gallery_desc"><i class="fa fa-money"></i> Buy-in: $650+50</p>
                                <p class="gallery_desc">At vero eos et accusam et justo duo dolores et ea rebum.</p>
                                <a href="more_details.html" class="icon-effect"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <img class="" src="images/event1.jpg" alt="alt" />
                    </figure>
                </li>
				<li class="mix category_2 one_third_gallery_wild" data-cat="2">
                    <figure class="2014 clearfix">
                        <div class="layer">
                            <div class="portfolio-info">
                                <p class="gallery_title">SWEDISH CHAMPIONSHIP</p>
                                <p class="gallery_desc"><i class="fa fa-calendar-o"></i> Date: 14/10/2013</p>
                                <p class="gallery_desc"><i class="fa fa-clock-o"></i> Time: 17:00</p>
                                <p class="gallery_desc"><i class="fa fa-money"></i> Buy-in: $650+50</p>
                                <p class="gallery_desc">At vero eos et accusam et justo duo dolores et ea rebum.</p>
                                <a href="more_details.html" class="icon-effect"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <img class="" src="images/event6.jpg" alt="alt" />
                    </figure>
                 </li>
				<li class="mix category_1 one_third_gallery_wild" data-cat="1">
                    <figure class="2014 clearfix">
                        <div class="layer">
                            <div class="portfolio-info">
                                <p class="gallery_title">AUISSIE MILLIONS</p>
                                <p class="gallery_desc"><i class="fa fa-calendar-o"></i> Date: 14/10/2013</p>
                                <p class="gallery_desc"><i class="fa fa-clock-o"></i> Time: 17:00</p>
                                <p class="gallery_desc"><i class="fa fa-money"></i> Buy-in: $650+50</p>
                                <p class="gallery_desc">At vero eos et accusam et justo duo dolores et ea rebum.</p>
                                <a href="more_details.html" class="icon-effect"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <img class="" src="images/event7.jpg" alt="alt" />
                    </figure>
                </li>
                <li class="mix category_3 one_third_gallery_wild" data-cat="3">
                    <figure class="2014 clearfix">
                        <div class="layer">
                            <div class="portfolio-info">
                                <p class="gallery_title">FRENCH CHAMPIONSHIP</p>
                                <p class="gallery_desc"><i class="fa fa-calendar-o"></i> Date: 14/10/2013</p>
                                <p class="gallery_desc"><i class="fa fa-clock-o"></i> Time: 17:00</p>
                                <p class="gallery_desc"><i class="fa fa-money"></i> Buy-in: $650+50</p>
                                <p class="gallery_desc">At vero eos et accusam et justo duo dolores et ea rebum.</p>
                                <a href="more_details.html" class="icon-effect"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <img class="" src="images/event6.jpg" alt="alt" />
                    </figure>
                </li>
				<li class="mix category_2 one_third_gallery_wild" data-cat="2">
                    <figure class="2014 clearfix">
                        <div class="layer">
                            <div class="portfolio-info">
                                <p class="gallery_title">FINNISH CHAMPIONSHIP</p>
                                <p class="gallery_desc"><i class="fa fa-calendar-o"></i> Date: 14/10/2013</p>
                                <p class="gallery_desc"><i class="fa fa-clock-o"></i> Time: 17:00</p>
                                <p class="gallery_desc"><i class="fa fa-money"></i> Buy-in: $650+50</p>
                                <p class="gallery_desc">At vero eos et accusam et justo duo dolores et ea rebum.</p>
                                <a href="more_details.html" class="icon-effect"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <img class="" src="images/event2.jpg" alt="alt" />
                    </figure>
                </li>
                <li class="mix category_3 one_third_gallery_wild" data-cat="3">
                    <figure class="2014 clearfix">
                        <div class="layer">
                            <div class="portfolio-info">
                                <p class="gallery_title">GERMAN CHAMPIONSHIP</p>
                                <p class="gallery_desc"><i class="fa fa-calendar-o"></i> Date: 14/10/2013</p>
                                <p class="gallery_desc"><i class="fa fa-clock-o"></i> Time: 17:00</p>
                                <p class="gallery_desc"><i class="fa fa-money"></i> Buy-in: $650+50</p>
                                <p class="gallery_desc">At vero eos et accusam et justo duo dolores et ea rebum.</p>
                                <a href="more_details.html" class="icon-effect"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <img class="" src="images/event5.jpg" alt="alt" />
                    </figure>
                </li>
				<li class="mix category_2 one_third_gallery_wild" data-cat="2">
                    <figure class="2014 clearfix">
                        <div class="layer">
                            <div class="portfolio-info">
                                <p class="gallery_title">ITALIAN CHAMPIONSHIP</p>
                                <p class="gallery_desc"><i class="fa fa-calendar-o"></i> Date: 14/10/2013</p>
                                <p class="gallery_desc"><i class="fa fa-clock-o"></i> Time: 17:00</p>
                                <p class="gallery_desc"><i class="fa fa-money"></i> Buy-in: $650+50</p>
                                <p class="gallery_desc">At vero eos et accusam et justo duo dolores et ea rebum.</p>
                                <a href="more_details.html" class="icon-effect"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <img class="" src="images/event4.jpg" alt="alt" />
                    </figure>
                </li>
				<li class="gap"></li>
			</ul>
    </div>


<!-- Content Part - Table -->
   <section id="testimonial">
    <div class="container">
       <h2 class="section_title_white">Our <span class="secondtxt">Testimonials</span></h2>
       <hr class="separator2"/>
       <section class="sponsors">
        <article id="sponsorpoker">
          <div class="one_sixth_sponsor"> <a href="#"><img class="" src="images/brand-logo2.png" alt="" /></a> </div>
          <div class="one_sixth_sponsor"> <a href="#"><img class="" src="images/brand-logo3.png" alt="" /></a> </div>
          <div class="one_sixth_sponsor"> <a href="#"><img class="" src="images/brand-logo4.png" alt="" /></a> </div>
          <div class="one_sixth_sponsor"> <a href="#"><img class="" src="images/brand-logo7.png" alt="" /></a> </div>
          <div class="one_sixth_sponsor"> <a href="#"><img class="" src="images/brand-logo5.png" alt="" /></a> </div>
          <div class="one_sixth_sponsor lastcolumn"> <a href="#"><img class="" src="images/brand-logo1.png" alt="" /></a> </div>
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
                                <img src="images/logo_footer.png" alt="log" />
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
                    <hr class="separatorspace"/>
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
    <script type="text/javascript">
        $(function () { "use strict"; $('#Grid_top').mixitup(); });
        $(function () { "use strict"; $('#Grid').mixitup(); });
    </script>

    <!-- Contact Form -->
    <script type="text/javascript">
        $(document).ready(function () {
            $(function () {
                "use strict";
                $('#contact_form').submit(function (e) {
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
                            success: function () {
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
