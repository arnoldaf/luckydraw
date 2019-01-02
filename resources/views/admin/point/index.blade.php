@extends('admin.theme.default')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">  Transaction History
                <small class="text-muted"> Search Transaction</small> <em ><h5 class="text-right">Current Admin Balance: <? echo $adminLastBalance;?> </h5></em></h3>
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
            {!! Form::open(array('route' => 'search-admin-points', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
            <div class="form-group row">
                <label class="col-md-2 float-sm-right form-control-label" for="first_name">User ID</label>

                <div class="col-md-4">
                    <input class="form-control" type="text" value="{{ Request::get('userid')}}" name="userid" id="userid" placeholder="User ID" maxlength="191" autofocus="">

                </div><!--col-->
            </div><!--form-group-->

            <div class="form-group row">
                <label class="col-md-2 float-sm-right form-control-label" for="first_name">Name</label>

                <div class="col-md-4">
                    <input class="form-control" type="text" name="name" value="{{ Request::get('name')}}"  id="name" placeholder="Name"  maxlength="191" autofocus="">

                </div><!--col-->
            </div><!--form-group-->

            <div class="form-group row">
                <label class="col-md-2 float-sm-right form-control-label" for="first_name">Status</label>

                <div class="col-md-4">
                    <select class="custom-select form-control" name="status" required="required" id="status">
                        <option value="" {{ (Request::get('status') =='')? 'selected':''}} >Select</option>
                        <option value="0" {{ (Request::get('status') ==0)? 'selected':''}}>Pending</option>
                        <option value="1" {{ (Request::get('status') == 1)? 'selected':''}}>Complete</option>
                        <option value="2" {{ (Request::get('status') ==2)? 'selected':''}}>Reject</option>
                    </select>

                </div><!--col-->
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label required-field" for="max_amount">Date</label>

                <div class="col-md-4">
                    <input class="form-control" type="text" autocomplete="off" required="required" name="reportrange" onkeydown="no_backspaces(event);" value="01/01/2018 - 01/15/2018" />
                </div>
            </div>


            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="active"></label>
                <div class="col-md-6">
                    <button class="btn btn-success btn-sm" type="reset">Reset</button>
                    <button class="btn btn-success btn-sm " type="submit">Search</button>
                </div><!--col-->
            </div><!--form-group-->
             {!! Form::close() !!}

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Transaction History Details</b> <? if(isset($header)){ echo $header;} ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Request Date Time</th>
                                        <th>From User</th>
                                        <th>From User Balance</th>
                                        <th>To User</th>
                                        <th>Amount</th>
                                        <th>Transfer Date Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Request Date Time</th>
                                        <th>From User</th>
                                        <th>From User Balance</th>
                                        <th>To User</th>
                                        <th>Amount</th>
                                        <th>Transfer Date Time</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    @foreach($transactions as $comm)
                                    <tr>
                                        <td>{{$comm->created_at}}</td>
                                        <td>{{$comm->from_user_account}}</td>
                                        <td>{{$comm->from_user_balance}}</td>
                                        <td>{{$comm->to_user_account}}</td>
                                        <td>{{$comm->amount}}</td>
                                        <td>{{$comm->updated_at}}</td>
                                        <?
                                        if ($comm->status==0){
                                        $status='Pending';
                                        }elseif($comm->status==1){
                                        $status='Complete';
                                        }else {
                                        $status='Reject';
                                        }
                                        ?>
                                        <td>{{$status }}</td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
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
