﻿@extends('layouts.member-out')

@section('title', 'Play Game')
<!-- Program Intro -->
@section('content')
    <div class="quote-icon"><img src="{!! asset('member/images/icon_logo2.png')!!}" alt="" /></div>
    <div class="parallax">
        <article class="">
            <div class="container">
                <section>
                    <div class="head-row">
                        <div class="jackport">
                            <div class="one_fourth">
                                <img src="{!! asset('member/images/number-game.png')!!}" alt="" class="img-fluid number-game" />
                            </div>
                            <div class="one_third lastcolumn">
                                <div class="stepbystep ">
                                    <div class="rightsection denominations">
                                        <h3>Select BET to Start Game</h3>
                                        <ul>
                                            <li class="icon point-1 denominations-point selected"><a href="#"><span class="hidden">10</span></a></li>
                                            <li class="icon point-2 denominations-point"><a href="#"><span class="hidden">50</span></a></li>
                                            <li class="icon point-3 denominations-point"><a href="#"><span class="hidden">100</span></a></li>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="one_fourth timer"><h3>Draw Closes In</h3>
                                <div  id="timeleft">
                                    <h2>  <span class="hours">00</span> <span class="minutes">00</span> <span class="seconds">00</span>
                                    </h2> </div> </div>
                        </div>
                    </div>


                    <article>
                        <div class="main">
                            <div class="left-column numberbg">
                                <div id="ttabs" class="poker-tabs poker-tabs-pos-top-left poker-tabs-anim-scale poker-tabs-response-to-icons">
                                    <?php $tabSer = 1;?>
                                    @foreach($games as $game)
                                    <input type="radio" name="poker-tabs" {{$tabSer == 1 ? "checked" : ""}} id="poker-tab{{$game['id']}}" value="{{$game['id']}}" class="poker-tab-content-{{$tabSer}}">
                                    <label for="poker-tab{{ $game['id'] }}"><span><span><i class="fa fa-bolt"></i>{{$game['name']}}</span></span></label>
                                    <?php $tabSer++;?>
                                    @endforeach

                                    <ul>
                                        <?php $tabSer = 0;?>
                                        @foreach($games as $game)
                                            <?php $tabSer++;?>
                                        <li class="poker-tab-content-{{$tabSer}} game-wrapper" data-id="{{$game['id']}}" data-name="{{$game['name']}}">

                                            <div class="checker__numbers">
                                                <div class="checker__grid two_third">
                                                    @for($i = 0; $i <=99; $i++)
                                                    <a href="javascript:;" id="B0ID_{{$i}}" class="ball user-selected-num" data-id="{{$i}}"><span class="num">{{$i}}</span><p class="value hidden"> 0</p></a>
                                                    @endfor
                                                </div>
                                                <div class="one_third_gallery  lastcolumn clubbox">
                                                    <div class="twocol">
                                                        <div class="tablebox checker__grid">

                                                            <h3>A - Ander </h3>
                                                            @for($i = 0; $i <=9; $i++)
                                                                <a href="javascript:;" id="B0ID_{{$i}}" class="ball andar-bid" data-id="{{$i}}"><span>{{$i}}</span><p class="value hidden"> 0</p></a>
                                                            @endfor
                                                        </div>
                                                        <div class="tablebox checker__grid">
                                                            <h3>B - Bahar </h3>
                                                            @for($i = 0; $i <= 9; $i++)
                                                                <a href="javascript:;" id="B0ID_{{$i}}" class="ball bahar-bid" data-id="{{$i}}"><span>{{$i}}</span><p class="value hidden"> 0</p></a>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                        </li>
                                            @endforeach
                                    </ul>

                                </div>
                            </div>

                            <div class="right-column">
                                <div class="numberbg-right">
                                    <div class="newtab">
                                        <table class="table table-striped tinytable member-bid-history">
                                            <thead>
                                            <tr>
                                                <th><h3>S. No.</h3></th>
                                                <th><h3>Club</h3></th>
                                                <th><h3>Number</h3></th>
                                                <th><h3>Points</h3></th>
                                                <th><h3>Actions</h3></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="member-bid-record snippet hidden">
                                                <td class="sr-num"> </td>
                                                <td class="game-name" data-id=""> </td>
                                                <td class="bid-num"> </td>
                                                <td class="bid-amount"> </td>
                                                <td>
                                                    <a href="javascript:void(0)" class="delete member-bid-delete" data-id="">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            </tbody>
                                            <thead>
                                            <tr class="total-box">
                                                <td >
                                                    <div class="half-box blackbg" style="width:59%;">Total Bid Points</div>

                                                    <div class="half-box blackbg" style="width:21%;">
                                                        <strong class="redtxt total-bid-amount">0</strong>
                                                    </div>
                                                    <div class="half-box blackbg" style="width:20%;">
                                                        &nbsp;
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr class="">
                                                <td>
                                                    <div class="confirm-error-msg alert hidden">  </div>
                                                    <div class="half-box redbg">
                                                        <a href="javascript:void(0)" id="reset_checker"  class="white-bt">
                                                            <span class=""><i class="fa fa-refresh" aria-hidden="true"></i> Reset</span>
                                                        </a>
                                                    </div>
                                                    <div class="half-box redbg" >
                                                        <a href="javascript:void(0)" id="reset_checker"  class="white-bt confirm-bid">
                                                            <span class=""><i class="fa fa-check-circle" aria-hidden="true"></i> Confirm Bid</span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            </thead>

                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </article>
                </section>
            </div>
        </article>
    </div>

    <div class="container">
        <div class="jodi-section">
            <div class="alert alert-danger cross-error-msg hidden"> Processing.. </div>
            <div id="checkerStatus" class="checker__status"><h3> Select Numbers through CROSSING:
                    <input type="radio" name="jodi" value="1" checked> Jodi
                    <input type="radio" name="jodi" value="0"> without Jodi </h3>
            </div>

        </div>
        <div class="number-section">
            <div class="width90">
                <div class="jodibox">
                    <div class="headh3">
                        <h3>A</h3>
                    </div>
                    <div class="inputboxes cross-a">
                        @for ($i = 0; $i < 10; $i++)
                        <input type="text" name="cross_a" class="cross-a-val" maxlength="1">
                        @endfor
                        <span style="font-weight: bold; color: #3b5656"> x </span>
                        <input type="text" name="cross_a" class="cross-multiplier" onkeypress="return isNumber(event)" maxlength="3">
                    </div>

                </div>
                <div class="jodibox">
                    <div class="headh3" >
                        <h3>B</h3>
                    </div>
                    <div class="inputboxes cross-b">
                        @for ($i = 0; $i < 10; $i++)
                        <input type="text" name="cross_b" class="cross-b-val" maxlength="1">
                        @endfor
                        <span style="font-weight: bold"> x </span>
                         <input type="text" disabled name="not-in-use" class="not-in-use" maxlength="1">
                    </div>
                </div>
            </div>
            <div class="width10">
                <div class="jodibox-submit">
                    <a href="javascript:void(0)" id="reset_checker" class="white-bt cross-reset">Reset</a>
                    <a href="javascript:void(0)" id="reset_checker" class="white-bt cross-calculate">Calculate</a>

                </div>
            </div>
        </div>


    </div>

<style>
    .alert { height: 20px; padding: 5px; color: #fff; width: 50%}
    .alert-danger {background-color: #d4202b}
    .alert-success {background-color: #00ff00}
</style>
<script type="text/javascript">
    //"{{ strtotime(date("2018-12-30 11:59:59"))*1000 }}"; // new Date(2018, 12, 30, 11, 59, 59).getTime();
    jQuery.ajax({
        url: sit_url+'/auth/game-over-time',
        type: 'GET',
        success: function (countDownDateTime) {
            setInterval(function() {
                setGameOverTime(countDownDateTime);
            }, 1000);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });

    function setGameOverTime(countDownDate) {
        // Get todays date and time
        let now = new Date().getTime();
        // Find the distance between now an the count down date
        let distance = countDownDate - now;
        // Time calculations for days, hours, minutes and seconds
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("timeleft").innerHTML =   hours + ":" + minutes + ":" + seconds ;
    }
</script>

@endsection
