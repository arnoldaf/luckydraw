@extends('layouts.member-out')

@section('title', 'Play Game')
<!-- Program Intro -->
@section('content')
<div id="section-holdem" class="programinfo">
    <div class="container">

        <div id="texas" class="two_third_contact lastcolumn">


            <div class="clear"></div>
            <h3 class="title_tab">Bid History</h3>
            <p class="desc_tab">Tournaments included in the Asia Weekly MTT Challenge run from Sunday-Friday every week at the times listed below.</p>
            <div id="tablewrapper" >
                <div id="tableheader">
                    <div class="search">
                        <select id="columns" onchange="sorter.search('query')"></select>
                        <input type="text" id="query" onkeyup="sorter.search('query')" />
                    </div>
                    <span class="details">
                        <div>Records <span id="startrecord"></span>-<span id="endrecord"></span> of <span id="totalrecords"></span></div>
                        <div class="btn-reset"><a class="button blue" href="javascript:sorter.reset()">reset</a></div>
                    </span>
                </div>
                <section>
                    <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable">
                        <thead>
                            <tr>
                                <th><h3>Trans ID</h3></th>
                        <th><h3>Booking Date</h3></th>

                        <th><h3>Game Date</h3></th>
                        <th><h3>Game</h3></th>
                        <th><h3>Number</h3></th>
                        <th><h3>Type</h3></th>
                    <th><h3>Amount</h3></th>
                    <th><h3>Result</h3></th>
                    <th><h3>Win</h3></th>
                    <th><h3>Result Date</h3></th>
                        </tr>


                        </thead>
                        <tbody>
                             @foreach($bids as $bid)
                           
                            <tr>
                                <td>{{$bid->id}}</td>
                                <td>{{$bid->created_at}}</td>
                                <td>{{$bid->game_date}}</td>
                                <td>{{$bid->game_name}}</td>
                                <td>{{$bid->bid_number}}</td>
                                <td>{{$bid->bid_category}}</td>
                                <td>{{$bid->amount}}</td>
                                <td></td>
                                <td></td>
                                <td></td>

                               
                            </tr>
                            
                             @endforeach 



                        </tbody>
                    </table>
                </section>
                <div id="tablefooter">
                    <div id="tablenav">
                        <div>
                            <img src="{!! asset('member/images/tabsresp/first.gif')!!}" width="16" height="16" alt="First Page" onclick="sorter.move(-1, true)" />
                            <img src="{!! asset('member/images/tabsresp/previous.gif')!!}" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
                            <img src="{!! asset('member/images/tabsresp/next.gif')!!}" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
                            <img src="{!! asset('member/images/tabsresp/last.gif')!!}" width="16" height="16" alt="Last Page" onclick="sorter.move(1, true)" />
                        </div>
                        <div>
                            <select  id="pagedropdown"></select>
                        </div>
                        <div class="btn-reset"><a class="button blue" href="javascript:sorter.showall()">view all</a>
                        </div>
                    </div>
                    <div id="tablelocation">
                        <div>
                            <select onchange="sorter.size(this.value)">
                                <option value="5">5</option>
                                <option value="10" selected="selected">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="page txt-txt">Page <span id="currentpage"></span> of <span id="totalpages"></span></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="g-hr type_short"><span class="g-hr-h"><i class="fa fa-dot-circle-o"></i></span></div>

        </div>
    </div>



</div> 




@endsection

<link rel="stylesheet" href="{!! asset('member/css/tabsresp/styleResp.css')!!}" />