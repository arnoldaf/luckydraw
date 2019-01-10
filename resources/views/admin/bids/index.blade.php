@extends('admin.theme.default')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">All Bids </h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

   
    <div class="row">
        <div class="col-12">
            @include('admin.partials.form-status')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            {!! Form::open(array('route' => 'filter-bids', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-1">
                        <label class="form-control-label" for="first_name">Lottery Name</label>
                    </div>
                    <div class="col-xs-2">
                        <select class="custom-select form-control" name="lotteryType" id="lotteryType">
                            <option {{ (Request::get('lotteryType') =='')? 'selected':''}}  value="Select"> Select </option>
                            <option {{ (Request::get('lotteryType') =='1')? 'selected':''}} value="1">Faridabad</option>
                            <option {{ (Request::get('lotteryType') =='2')? 'selected':''}} value="2">Ghaziabad</option>
                            <option {{ (Request::get('lotteryType') =='3')? 'selected':''}} value="3">Gali</option>
                            <option {{ (Request::get('lotteryType') =='4')? 'selected':''}} value="4">Disawar</option>
                        </select>
                    </div>
                    <div class="col-xs-1">
                        <label class="form-control-label" for="first_name">Lottery Date</label>
                    </div>
                    <div class="col-xs-2">
                        <input class="form-control" type="text" placeholder="Game Date"  readonly id= "lotteryDate" name="lotteryDate" value="{{ Request::get('lotteryDate')}}">

                    </div>

                    <div class="col-xs-2">
                        <!--<button class="btn btn-success btn-sm" type="reset">Reset</button>-->
                        <button name="show" value="show" class="btn btn-success btn-sm" type="submit">Show</button>
                    </div>
                    <div class="col-xs-3">
                      @if(Request::get('show'))
                        <span class="btn btn-primary" onClick="window.location.reload()"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Refresh Page</span>
                        <span class="btn btn-primary" id="save"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Save</span>
                      @endif
                    </div>

                </div>
            </div>
            </form>
            <p>&nbsp;</p>
        </div>
    </div>



    @if(Request::get('show'))

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-stack-overflow fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$totalBid}}</div>
                            <div>Total Bid</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-angle-double-up fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$maxJodiBid==''?0:$maxJodiBid}}</div>
                            <div>Max Jodi Bid</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-angle-double-down fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$minJodiBid==''?0:$minJodiBid}}</div>
                            <div>Min Jodi Bid</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-trophy fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="little-huge">{{$bidResult}}</div>
                            <div>Result</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->




    <div class="row">
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div style="font-size: 18px;padding: 5px;">

                        <strong>Game Date:</strong><span id="game_date">{{ date('d-M-Y', strtotime(str_replace('/','-',Request::get('lotteryDate'))))}} </span>
                        <strong>Game Type:</strong>
                        {{ (Request::get('lotteryType') =='1')?'Faridabad': '' }}
                        {{ (Request::get('lotteryType') =='2')?'Ghaziabad': '' }}
                        {{ (Request::get('lotteryType') =='3')?'Gali': '' }}
                        {{ (Request::get('lotteryType') =='4')?'Disawar': '' }} <span id="demo" style="font-weight:bold;"></span>
                    </div>
                    <div class="row show-grid">
                        <div class="col-md-2" style="width: 20%;">
                            <table style="width:100%;">
                                @php ($sum = 0)
                                @for ($i = 1; $i <= 10; $i++)
                                <tr>
                                    <td width="30%">{{$i}}</td><td width="30%">-</td>
                                    @if (array_key_exists($i, $result))
                                    <td  width="40%" align="center" style="border: 1px solid; background: {{$result[$i]->amount>0?'#5ee527':'#fffb74'}};">
                                        {{$result[$i]->amount}}
                                        @php ($sum = $sum + $result[$i]->amount)
                                    </td>
                                    @else
                                    <td  align="center" width="40%" style="border: 1px solid; background: #fffb74;">
                                        0
                                    </td>
                                    @endif
                                </tr>
                                @endfor
                                <tr><td align="center" width="30%"></td><td width="30%"></td><td  class="total" align="center" width="40%" class="total" >{{$sum}}</td></tr>
                            </table>

                        </div>
                        <div class="col-md-2" style="width: 20%;">
                            <table style="width:100%;">
                                @php ($sum = 0)
                                @for ($i = 11; $i <= 20; $i++)
                                <tr>
                                    <td width="30%">{{$i}}</td><td width="30%">-</td>
                                    @if (array_key_exists($i, $result))
                                    <td  align="center" width="40%" style="border: 1px solid; background: {{$result[$i]->amount>0?'#5ee527':''}};">
                                        {{$result[$i]->amount}}
                                        @php ($sum = $sum + $result[$i]->amount)
                                    </td>
                                    @else
                                    <td  align="center" width="40%" style="border: 1px solid; background: #fffb74;">
                                        0
                                    </td>
                                    @endif
                                </tr>
                                @endfor
                                <td width="30%"> </td><td width="30%"></td><td  width="40%" align="center" class="total" >{{$sum}}</td></tr>
                            </table>
                        </div>
                        <div class="col-md-2" style="width: 20%;">
                            <table style="width:100%;">
                                @php ($sum = 0)
                                @for ($i = 21; $i <= 30; $i++)
                                <tr>
                                    <td width="30%">{{$i}}</td><td width="30%">-</td>
                                    @if (array_key_exists($i, $result))
                                    <td  width="40%" align="center" style="border: 1px solid; background: {{$result[$i]->amount>0?'#5ee527':'#fffb74'}};">
                                        {{$result[$i]->amount}}
                                        @php ($sum = $sum + $result[$i]->amount)
                                    </td>
                                    @else
                                    <td  width="40%" align="center" style="border: 1px solid; background: #fffb74;">
                                        0
                                    </td>
                                    @endif
                                </tr>
                                @endfor
                                <td width="30%"> </td><td width="30%"></td><td  width="40%" align="center" class="total" >{{$sum}}</td></tr>
                            </table>
                        </div>
                        <div class="col-md-2" style="width: 20%;">
                            <table style="width:100%;">
                                @php ($sum = 0)
                                @for ($i = 31; $i <= 40; $i++)
                                <tr>
                                    <td align="center" width="30%">{{$i}}</td><td width="30%">-</td>
                                    @if (array_key_exists($i, $result))
                                    <td  width="40%" class="center" style="border: 1px solid; background: {{$result[$i]->amount>0?'#5ee527':'#fffb74'}};">
                                        {{$result[$i]->amount}}
                                        @php ($sum = $sum + $result[$i]->amount)
                                    </td>
                                    @else
                                    <td  width="40%" align="center" style="border: 1px solid; background: #fffb74;">
                                        0
                                    </td>
                                    @endif
                                </tr>
                                @endfor
                                <td width="30%"> </td><td width="30%"></td><td  width="40%" align="center" class="total" >{{$sum}}</td></tr>
                            </table>
                        </div>
                        <div class="col-md-2" style="width: 20%;">
                            <table style="width:100%;">
                                @php ($sum = 0)
                                @for ($i = 41; $i <= 50; $i++)
                                <tr>
                                    <td width="30%">{{$i}}</td><td width="30%">-</td>
                                    @if (array_key_exists($i, $result))
                                    <td  width="40%" align="center" style="border: 1px solid; background: {{$result[$i]->amount>0?'#5ee527':'#fffb74'}};">
                                        {{$result[$i]->amount}}
                                        @php ($sum = $sum + $result[$i]->amount)
                                    </td>
                                    @else
                                    <td  width="40%" align="center" style="border: 1px solid; background: #fffb74;">
                                        0
                                    </td>
                                    @endif
                                </tr>
                                @endfor
                                <td width="30%"> </td><td width="30%"></td><td  align="center" width="40%" class="total" >{{$sum}}</td></tr>
                            </table>
                        </div>
                    </div>

                    <div class="row show-grid">
                        <div class="col-md-2" style="width: 20%;">
                            <table style="width:100%;">
                                @php ($sum = 0)
                                @for ($i = 51; $i <= 60; $i++)
                                <tr>
                                    <td width="30%">{{$i}}</td><td width="30%">-</td>
                                    @if (array_key_exists($i, $result))
                                    <td  align="center" width="40%" style="border: 1px solid; background: {{$result[$i]->amount>0?'#5ee527':'#fffb74'}};">
                                        {{$result[$i]->amount}}
                                        @php ($sum = $sum + $result[$i]->amount)
                                    </td>
                                    @else
                                    <td  width="40%" align="center" style="border: 1px solid; background: #fffb74;">
                                        0
                                    </td>
                                    @endif
                                </tr>
                                @endfor
                                <td width="30%"> </td><td width="30%"></td><td  align="center" width="40%" class="total" >{{$sum}}</td></tr>
                            </table>
                        </div>
                        <div class="col-md-2" style="width: 20%;">
                            <table style="width:100%;">
                                @php ($sum = 0)
                                @for ($i = 61; $i <= 70; $i++)
                                <tr>
                                    <td width="30%">{{$i}}</td><td width="30%">-</td>
                                    @if (array_key_exists($i, $result))
                                    <td  width="40%" align="center" style="border: 1px solid; background: {{$result[$i]->amount>0?'#5ee527':'#fffb74'}};">
                                        {{$result[$i]->amount}}
                                        @php ($sum = $sum + $result[$i]->amount)
                                    </td>
                                    @else
                                    <td  width="40%" align="center" style="border: 1px solid; background: #fffb74;">
                                        0
                                    </td>
                                    @endif
                                </tr>
                                @endfor
                                <td width="30%"> </td><td width="30%"></td><td  width="40%" align="center" class="total" >{{$sum}}</td></tr>
                            </table>
                        </div>
                        <div class="col-md-2" style="width: 20%;">
                            <table style="width:100%;">
                                @php ($sum = 0)
                                @for ($i = 71; $i <= 80; $i++)
                                <tr>
                                    <td width="30%">{{$i}}</td><td width="30%">-</td>
                                    @if (array_key_exists($i, $result))
                                    <td  width="40%" align="center" style="border: 1px solid; background: {{$result[$i]->amount>0?'#5ee527':'#fffb74'}};">
                                        {{$result[$i]->amount}}
                                        @php ($sum = $sum + $result[$i]->amount)
                                    </td>
                                    @else
                                    <td  width="40%" align="center" style="border: 1px solid; background: #fffb74;">
                                        0
                                    </td>
                                    @endif
                                </tr>
                                @endfor
                                <td width="30%"> </td><td width="30%"></td><td  align="center" width="40%" class="total" >{{$sum}}</td></tr>
                            </table>
                        </div>
                        <div class="col-md-2" style="width: 20%;">
                            <table style="width:100%;">
                                @php ($sum = 0)
                                @for ($i = 81; $i <= 90; $i++)
                                <tr>
                                    <td width="30%">{{$i}}</td><td width="30%">-</td>
                                    @if (array_key_exists($i, $result))
                                    <td  width="40%" align="center" style="border: 1px solid; background: {{$result[$i]->amount>0?'#5ee527':'#fffb74'}};">
                                        {{$result[$i]->amount}}
                                        @php ($sum = $sum + $result[$i]->amount)
                                    </td>
                                    @else
                                    <td  width="40%" align="center" style="border: 1px solid; background: #fffb74;">
                                        0
                                    </td>
                                    @endif
                                </tr>
                                @endfor
                                <td width="30%"> </td><td width="30%"></td><td  width="40%" align="center" class="total" >{{$sum}}</td></tr>
                            </table>
                        </div>
                        <div class="col-md-2" style="width: 20%;">
                            <table style="width:100%;">
                                @php ($sum = 0)
                                @for ($i = 91; $i <= 99; $i++)
                                <tr>
                                    <td width="30%">{{$i}}</td><td width="30%">-</td>
                                    @if (array_key_exists($i, $result))
                                    <td  width="40%" align="center" style="border: 1px solid; background: {{$result[$i]->amount>0?'#5ee527':'#fffb74'}};">
                                        {{$result[$i]->amount}}
                                        @php ($sum = $sum + $result[$i]->amount)
                                    </td>
                                    @else
                                    <td  width="40%" align="center" style="border: 1px solid; background: #fffb74;">
                                        0
                                    </td>
                                    @endif
                                </tr>
                                @endfor
                                <tr>
                                    <td width="30%">00</td><td width="30%">-</td>
                                    @if (array_key_exists(0, $result))
                                    <td  width="40%" align="center" style="border: 1px solid; background: {{$result[0]->amount>0?'#5ee527':'#fffb74'}};">
                                        {{$result[0]->amount}}
                                        @php ($sum = $sum + $result[0]->amount)
                                    </td>
                                    @else
                                    <td  width="40%" align="center" style="border: 1px solid; background: #fffb74;">0</td>
                                    @endif

                                </tr>
                                <td width="30%"> </td><td width="30%"></td><td  align="center" width="40%" class="total" >{{$sum}}</td></tr>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 #fffb74; -->
        <div class="col-lg-3">

            <div class="panel panel-default">
                <div class="panel-body">


                    <div class="row show-grid andar-padding">
                        <div class="col-md-12">
                            <table style="width:100%;"  >
                                @php ($sum = 0)
                                @for ($i = 1; $i <= 9; $i++)
                                <tr>
                                    <td width="30%">{{$i}}</td>
                                    <td width="30%">-</td>
                                    @if (array_key_exists($i, $andarResult))
                                    <td  width="30%" align="center" style="border: 1px solid; background: {{$andarResult[$i]->amount>0?'#5ee527':'#fffb74'}};">
                                        {{$andarResult[$i]->amount}}
                                        @php ($sum = $sum + $andarResult[$i]->amount)
                                    </td>
                                    @else
                                    <td  width="50%" align="center" style="border: 1px solid; background: #fffb74;">
                                        0
                                    </td>
                                    @endif
                                    @if($i==1)
                                    <td class="center" width="10%" colspan="10">
                                        <span><strong> A</strong></span>
                                    </td>
                                    @endif
                                    @if($i==2)
                                    <td class="center red" width="10%" colspan="10">
                                        <span>&nbsp;Divide </span>
                                    </td>
                                    @endif
                                </tr>
                                @endfor
                                <tr>
                                    @if (array_key_exists(0, $andarResult))
                                    <td width="30%">0</td><td width="30%">-</td>
                                    <td  width="40%" align="center" style="border: 1px solid; background:  {{$andarResult[0]->amount>0?'#5ee527':'#fffb74'}};">
                                        {{$andarResult[0]->amount}}
                                        @php ($sum = $sum + $andarResult[0]->amount)
                                    </td>
                                    @else
                                    <td width="30%">0</td><td width="30%">-</td>
                                    <td  width="40%" align="center" style="border: 1px solid; background: #fffb74;">
                                        0
                                    </td>

                                    @endif

                                </tr>
                                <tr><td width="30%"> </td><td width="30%"></td><td  align="center" width="40%" class="total" >{{$sum}}</td></tr>
                            </table>
                        </div>
                    </div>

                    <div class="row show-grid">
                        <div class="col-md-12">
                            <table style="width:100%;">
                                @php ($sum = 0)
                                @for ($i = 1; $i <= 9; $i++)
                                <tr>
                                    <td width="30%">{{$i}}</td><td width="30%">-</td>
                                    @if (array_key_exists($i, $baharResult))
                                    <td  width="40%" align="center" style="border: 1px solid; background: {{$baharResult[$i]->amount>0?'#5ee527':'#fffb74'}};">
                                        {{$baharResult[$i]->amount}}
                                        @php ($sum = $sum + $baharResult[$i]->amount)
                                    </td>
                                    @else
                                    <td  width="40%" align="center" style="border: 1px solid; background: #fffb74;">
                                        0
                                    </td>
                                    @endif
                                    @if($i==1)
                                    <td class="center" width="10%" colspan="10">
                                        <span><strong> B</strong></span>
                                    </td>
                                    @endif
                                    @if($i==2)
                                    <td class="center red" width="10%" colspan="10">
                                        <span>&nbsp;Divide </span>
                                    </td>
                                    @endif
                                </tr>
                                @endfor
                                <tr><td width="30%">0</td><td width="30%">-</td>
                                    @if (array_key_exists(0, $baharResult))
                                    <td  width="40%" align="center" style="border: 1px solid; background:  {{$baharResult[0]->amount>0?'#5ee527':'#fffb74'}};">
                                        {{$baharResult[0]->amount}}
                                        @php ($sum = $sum + $baharResult[0]->amount)
                                        @else
                                    <td  width="40%" align="center" style="border: 1px solid; background: #fffb74;">
                                        0
                                    </td>
                                    @endif
                                </tr>
                                <tr><td width="30%"> </td><td width="30%"></td><td  align="center" width="40%" class="total" >{{$sum}}</td></tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    @endif
</div>

<script>
// Set the date we're counting down to
    var countDownDate = new Date("{{ date('M d, Y', strtotime(str_replace('/','-',Request::get('lotteryDate')).' + 1 day'))}} 12:00:00 PM").getTime();

// Update the count down every 1 second
    var x = setInterval(function () {

// Get todays date and time
        var now = new Date().getTime();

// Find the distance between now and the count down date
        var distance = countDownDate - now;

// Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
//seconds = sprintf("%02d", seconds);

// Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = "(Time Left: " + aZero(hours) + ":"
                + aZero(minutes) + ":" + aZero(seconds) + ")";

// If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "(Time Left: OVER)";
        }
    }, 1000);

    function aZero(n) {
        return n.toString().length == 1 ? n = '0' + n : n;
    }
</script>
@endsection
