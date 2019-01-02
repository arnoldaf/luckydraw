@extends('admin.theme.default')


@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">  Points Receive<small class="text-muted"> <b>Current Admin Balance: Rs  <? echo $adminLastBalance;?> </b></small> </h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('admin.partials.form-status')
            </div>
        </div>
    </div>

    <div class="mt-4 mb-4">
        <div class="col">
           
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <b>Received Points Details</b> <? if(isset($header)){ echo $header;} ?>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                             {!! Form::open(array('route' => ['pointReceiveRequest'], 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
                             {!! csrf_field() !!}
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Date</th>
                                            <th>From User ID</th>
                                            <th>From User Name</th>
                                            <th>From User Balance</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="7">
                                    <div class="half-box blackbg" ><input type="checkbox" name="" class="select-all"> Select All
                                        <a href="javascript:void(0)" id="reset_checker"  data-status="accept" class="buttons-points receive-points">
                                            <i class="fa fa-credit-card" aria-hidden="true"></i> Receive
                                        </a>
                                        <a href="javascript:void(0)" id="reset_checker" data-status="reject" class="buttons-points reject-points">
                                            <i class="fa fa-times" aria-hidden="true"></i> Reject
                                        </a>

                                        <div id="pinVerify" style="display:none">
                                            <!--<form action="tbd" id="pinVerifyForm" method="post">-->
                                                <div class="formline">
                                                    <label for="userPin">Your Pin:</label>
                                                    <input id="userPin" name="pin" type="password" maxlength="8" placeholder="Your Pin" required />
                                                    <input type="hidden" name="status" class="status" value="">
                                                    
                                                    <input type="submit" value="Verify" class="buttons-points request-update" style="color:#000"/>
                                                </div>
                                           <!-- </form>-->
                                        </div>
                                    </div>
                                    </th>
                                    
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                        @foreach($transactions as $comm)
                                        <tr>
                                            <td><input type="checkbox" name="ids" class="transactionId" value="{{$comm->id}}"></td>
                                            <td>{{$comm->updated_at}}</td>
                                            <td>{{$comm->from_user_account}}</td>
                                            <td>{{$comm->from_user_name}}</td>
                                            <td>{{$comm->from_user_balance}}</td>
                                            <td>{{$comm->amount}}</td>
                                            <td>{{$comm->status==0?'Pending':'Completed' }}</td>
                                        </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                              {!! Form::close() !!}    

                                <!-- /.table-responsive -->
                            </div>


                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>

                    <!-- /.col-lg-12 -->
                </div>
           
            <div class="row">Updated today at {{date('Y-m-d H:i:s')}}</div>

        </div><!--col-->
    </div><!--row-->


</div>
@endsection
<script>
    $("#checkall").click(function () {
        if ($("#checkall").is(':checked')) {
            $(".checkboxes").each(function () {
                $(this).prop("checked", true);
            });
        } else {
            $(".checkboxes").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
</script>   

<style>
    .alert { height: 20px; padding: 5px; color: #fff;}
    .alert-danger {background-color: #d4202b}
    .alert-success {background-color: #00ff00}
    #pinVerifyForm {margin: 5px; border: 1px solid; padding: 5px;}
</style>

