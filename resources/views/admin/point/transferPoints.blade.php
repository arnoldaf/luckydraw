@extends('admin.theme.default')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">  Points Transfer
                <small class="text-muted"> Fund Transfer</small> <h5 class="text-right">Current Admin Balance: <em><b style="color: red"><? echo $adminLastBalance;?> </b></em></h5></h3>
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
            {!! Form::open(array('route' => ['pointTransferRequest'], 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
            {!! csrf_field() !!}
            <div class="form-group row">
                <label class="col-md-2 float-sm-right form-control-label" for="first_name">Account No</label>

                <div class="col-md-4">
                    <input class="form-control" type="text" value="" name="user_account" id="user_account" placeholder="Account No" required maxlength="191" autofocus="">

                </div><!--col-->
            </div><!--form-group-->

            <div class="form-group row">
                <label class="col-md-2 float-sm-right form-control-label" for="first_name">Pin</label>

                <div class="col-md-4">
                    <input class="form-control" type="password" name="pin"   id="pin" placeholder="Pin" maxlength="191" required autofocus="">

                </div><!--col-->
            </div><!--form-group-->

            <div class="form-group row">
                <label class="col-md-2 float-sm-right form-control-label" for="first_name">Amount</label>

                <div class="col-md-4">
                    <input class="form-control" type="text" name="amount"  id="amount" placeholder="Amount" required maxlength="191" autofocus="">

                </div><!--col-->
            </div><!--form-group-->


            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="active"></label>
                <div class="col-md-6">
                    <button class="btn btn-success btn-sm" type="reset">Reset</button>
                    <button class="btn btn-success btn-sm " type="submit">Transfer</button>
                </div><!--col-->
            </div><!--form-group-->


            {!! Form::close() !!}

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Transfer Points Details</b> <? if(isset($header)){ echo $header;} ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Request Date Time</th>
                                        <th>To User</th>
                                        <th>To User Name</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Request Date Time</th>
                                        <th>To User</th>
                                        <th>To User Name</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    @foreach($transactions as $comm)
                                    <tr>
                                        <td>{{$comm->created_at}}</td>
                                        <td>{{$comm->to_user_account}}</td>
                                        <td>{{$comm->to_user_name}}</td>
                                        <td>{{$comm->amount}}</td>
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
