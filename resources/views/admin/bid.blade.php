@extends('admin.theme.default')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">  Daily Bids<small class="text-muted"> Search Daily Bids</small> </h3>
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
            {!! Form::open(array('route' => 'search-bid', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
            <div class="form-group row">
                <label class="col-md-2 form-control-label required-field" for="game_name">Game Name</label>

                <div class="col-md-6">
                    <select class="custom-select form-control" name="game_id" id="game_id" required="" >
                        <option value="">Select Game</option>
                        @if ($games)
                        @foreach($games as $game)
                        <option value="{{ $game->id }}" >{{ $game->name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            


            <div class="form-group row">
                <label class="col-md-2 form-control-label required-field" for="max_amount">Date</label>

                <div class="col-md-6">
                    
                    <input class="form-control" type="text" autocomplete="off" name="reportrange" onkeydown="no_backspaces(event);" value="01/01/2018 - 01/15/2018" />
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
                            <b>Bid Details</b> <? if(isset($header)){ echo $header;} ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Game</th>
                                        <th>Game Category</th>
                                        <th>User</th>
                                        <th>Bid Number</th>
                                        <th>Bid Amount</th>
                                        <th>Game Date</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Game</th>
                                        <th>Game Category</th>
                                        <th>User</th>
                                        <th>Bid Number</th>
                                        <th>Bid Amount</th>
                                        <th>Game Date</th>
                                        <th>Date</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    @foreach($bids as $bid)
                                    <tr>
                                        <td>{{$bid->game_name}}</td>
                                        <td>{{$bid->bid_category}}</td>
                                        <td>{{$bid->user_name}}</td>
                                        <td>{{$bid->bid_number}}</td>
                                        <td>{{$bid->amount}}</td>
                                        <td>{{$bid->game_date}}</td>
                                        <td>{{$bid->date}}</td>
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
