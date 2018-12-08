@extends('layouts.member-out')

@section('title', 'Play Game')
<!-- Program Intro -->
@section('content')
    <div class="quote-icon"><img src="{!! asset('member/images/icon_logo2.png')!!}" alt="" /></div>
    <div class="parallax">
        <article class="">
            <div class="container">
                <section id="form-section">


                    <div id="managepoints">
                        <div class="jodi-section">
                            <div id="checkerStatus" class="checker__status"><h3> Manage Points:  <input type="radio"> GK Points  <input type="radio"> Multiplayer points  </h3>
                            </div>
                        </div>
                        <div class="threeboxes">
                            <div class="one_third boxes lastcolumn">
                                <div class="greybox">
                                    <h3>Receivables</h3> <a href="#" class="refresh-bt">  <i class="fa fa-refresh" aria-hidden="true"></i> Refresh </a>
                                </div>
                                <div class="score-table">
                                    <table class="table table-striped ">
                                        <thead>
                                        <tr>
                                            <th class="one"><h3>Select</h3></th>
                                            <th class="four"><h3> Account</h3></th>
                                            <th class="three"><h3>Amount </h3></th>
                                            <th class="two"><h3>Date</h3></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($receivables as $rcv)
                                        <tr class="evenrow">
                                            <td class="one"><input type="checkbox" name="" value="{{$rcv->id}}"></td>
                                            <td class="four" >{{$rcv->user_account}}</td>
                                            <td class="three">{{$rcv->amount}}</td>
                                            <td class="two">{{$rcv->created_at}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                        <thead>
                                        <tr class="points-all">
                                            <td >
                                                <div class="half-box blackbg" style="width:40%;"><input type="checkbox" name=""> Select All</div>

                                                <div class="half-box blackbg" style="width:60%;">
                                                    <a href="javascript:void(0)" id="reset_checker"  class="buttons-points">
                                                        <i class="fa fa-credit-card" aria-hidden="true"></i> Receive
                                                    </a>
                                                    <a href="javascript:void(0)" id="reset_checker"  class="buttons-points">
                                                        <i class="fa fa-times" aria-hidden="true"></i> Reject
                                                    </a>
                                                </div>

                                            </td>

                                        </tr>

                                        </thead>

                                    </table>
                                </div>

                            </div>

                            <div class="one_third boxes lastcolumn">
                                <div class="greybox">
                                    <h3>Transferable</h3> <a href="#" class="refresh-bt"> Point Transfer </a>
                                </div>
                                <div class="score-table">
                                    <table class="table table-striped ">
                                        <thead>
                                        <tr>
                                            <th class="one"><h3>Select</h3></th>
                                            <th class="two"><h3>From Member ID</h3></th>
                                            <th class="three"><h3>Amount </h3></th>
                                            <th class="four"><h3>Type</h3></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="evenrow">
                                            <td class="one"><input type="checkbox" name=""></td>
                                            <td class="two" >Dishawar</td>
                                            <td class="three">44</td>
                                            <td class="four">1000</td>
                                        </tr>

                                        <tr class="oddrow">
                                            <td class="one"><input type="checkbox" name=""></td>
                                            <td class="two" >Dishawar</td>
                                            <td class="three">44</td>
                                            <td class="four">1000</td>
                                        </tr>
                                        <tr class="evenrow">
                                            <td class="one"><input type="checkbox" name=""></td>
                                            <td class="two" >Dishawar</td>
                                            <td class="three">44</td>
                                            <td class="four">1000</td>
                                        </tr>

                                        <tr class="oddrow">
                                            <td class="one"><input type="checkbox" name=""></td>
                                            <td class="two" >Dishawar</td>
                                            <td class="three">44</td>
                                            <td class="four">1000</td>
                                        </tr>
                                        <tr class="evenrow">
                                            <td class="one"><input type="checkbox" name=""></td>
                                            <td class="two" >Dishawar</td>
                                            <td class="three">44</td>
                                            <td class="four">1000</td>
                                        </tr>

                                        <tr class="oddrow">
                                            <td class="one"><input type="checkbox" name=""></td>
                                            <td class="two" >Dishawar</td>
                                            <td class="three">44</td>
                                            <td class="four">1000</td>
                                        </tr>
                                        <tr class="evenrow">
                                            <td class="one"><input type="checkbox" name=""></td>
                                            <td class="two" >Dishawar</td>
                                            <td class="three">44</td>
                                            <td class="four">1000</td>
                                        </tr>

                                        <tr class="oddrow">
                                            <td class="one"><input type="checkbox" name=""></td>
                                            <td class="two" >Dishawar</td>
                                            <td class="three">44</td>
                                            <td class="four">1000</td>
                                        </tr>   <tr class="evenrow">
                                            <td class="one"><input type="checkbox" name=""></td>
                                            <td class="two" >Dishawar</td>
                                            <td class="three">44</td>
                                            <td class="four">1000</td>
                                        </tr>

                                        <tr class="oddrow">
                                            <td class="one"><input type="checkbox" name=""></td>
                                            <td class="two" >Dishawar</td>
                                            <td class="three">44</td>
                                            <td class="four">1000</td>
                                        </tr>
                                        <tr class="evenrow">
                                            <td class="one"><input type="checkbox" name=""></td>
                                            <td class="two" >Dishawar</td>
                                            <td class="three">44</td>
                                            <td class="four">1000</td>
                                        </tr>

                                        <tr class="oddrow">
                                            <td class="one"><input type="checkbox" name=""></td>
                                            <td class="two" >Dishawar</td>
                                            <td class="three">44</td>
                                            <td class="four">1000</td>
                                        </tr>
                                        </tbody>
                                        <thead>
                                        <tr class="points-all">
                                            <td >
                                                <div class="half-box blackbg" style="width:40%;"><input type="checkbox" name=""> Select All</div>

                                                <div class="half-box blackbg" style="width:60%;">

                                                    <a href="javascript:void(0)" id="reset_checker"  class="buttons-points">
                                                        <i class="fa fa-times" aria-hidden="true"></i> Cancel
                                                    </a> <a href="#" class="refresh-bt"> Close </a>
                                                </div>

                                            </td>

                                        </tr>

                                        </thead>

                                    </table>
                                </div>

                            </div>

                            <div class="one_third boxes lastcolumn">
                                <div class="greybox">
                                    <h3>Point Transfer</h3>
                                </div>
                                <div id="contact_Form">

                                    <form method="post" name="point_transfer" id="contact_form_points">
                                        <div class="error-msg alert hidden">  </div>
                                        @csrf

                                        <div class="formline">
                                            <label for="acc-num">To Account Number:</label>
                                            <!-- <p> Please enter your first name</p> -->
                                            <input id="acc-num" name="user_account" maxlength="12" type="text" placeholder="To Account Number" required />
                                        </div>
                                        <div class="formline">
                                            <label for="pin">Your Pin:</label>
                                            <!-- <p> Please enter your last name</p> -->
                                            <input id="pin" name="pin" type="password" maxlength="8" placeholder="Your Pin" required />
                                        </div>
                                        <div class="formline">
                                            <label for="amount">Amount:</label>
                                            <!-- <p> Please enter your last name</p> -->
                                            <input id="amount" name="amount" type="text" maxlength="8" placeholder="Amount" required />
                                        </div>


                                        <div class="formline">
                                            <input type="submit" value="Transfer" class="buttons-points" />
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            </div>
        </article>
    </div>
@endsection
<style>
    .alert { height: 20px; padding: 5px; color: #fff;}
    .alert-danger {background-color: #d4202b}
    .alert-success {background-color: #00ff00}
</style>