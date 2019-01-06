@extends('admin.theme.default')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">User Profile (<span style="color:green;">{{$user->user_account}})</span> </h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            @include('admin.partials.form-status')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User Profile
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Nav tabs -->

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile" data-toggle="tab">User Profile</a>
                        </li>
                        <li><a href="#bid-history" data-toggle="tab">Bid History</a>
                        <li><a href="#trans-history" data-toggle="tab">Transaction History</a>
                        </li>
                        <li><a href="#downlinetree" data-toggle="tab">Tree</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">

                        @include('admin.partials.member-user-profile')
                        @include('admin.partials.member-bid-history')
                        @include('admin.partials.member-transaction-history')
                        @include('admin.partials.member-tree-list')

                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
</div>
@endsection
