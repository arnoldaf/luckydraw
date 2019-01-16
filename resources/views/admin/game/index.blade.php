@extends('admin.theme.default')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">  Game Management<small class="text-muted"> Create Game</small> </h3>
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
            {!! Form::open(array('route' => ['addGame'], 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
            {!! csrf_field() !!}
            <div class="form-group row">
                <label class="col-md-2 form-control-label required-field" for="game_name">Game Name</label>

                <div class="col-md-6">
                    {!! Form::text('game_name', NULL, array('id' => 'game_name', 'class' => 'form-control', 'placeholder' => 'Game Name', 'required'=>"true", 'autofocus'=> "" )) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="win_percentage">Win Multiplier</label>

                <div class="col-md-6">
                    {!! Form::text('win_percentage', NULL, array('id' => 'win_percentage', 'class' => 'form-control', 'placeholder' => 'Win Multiplier', 'required'=>"true",   'autofocus'=> "" )) !!}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="win_percentage_ab">Win Multiplier A/B</label>

                <div class="col-md-6">
                    {!! Form::text('win_percentage_ab', NULL, array('id' => 'win_percentage_ab', 'class' => 'form-control', 'placeholder' => 'Win Multiplier A/B', 'required'=>"true", 'autofocus'=> "" )) !!}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label required-field" for="min_amount">Min Amount</label>

                <div class="col-md-6">
                    {!! Form::text('min_amount', NULL, array('id' => 'min_amount', 'class' => 'form-control', 'placeholder' => 'Min Amount',  'autofocus'=> "" , 'required'=> "" )) !!}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label required-field" for="max_amount">Max Amount</label>

                <div class="col-md-6">
                    {!! Form::text('max_amount', NULL, array('id' => 'max_amount', 'class' => 'form-control', 'placeholder' => 'Max Amount',  'autofocus'=> "" , 'required'=> "" )) !!}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="active">Active</label>

                <div class="col-md-6">
                    <label class="switch switch-3d switch-primary">
                        <input class="switch-input" type="checkbox" name="status" id="active" value="1" checked="">
                        <span class="switch-label"></span>
                        <span class="switch-handle"></span>
                    </label>
                </div><!--col-->
            </div><!--form-group-->
            
             <div class="form-group row">
                <label class="col-md-2 form-control-label" for="active">Is Stop</label>

                <div class="col-md-6">
                    <label class="switch switch-3d switch-primary">
                        <input class="switch-input" type="checkbox" name="is_stop" id="active" value="1" checked="">
                        <span class="switch-label"></span>
                        <span class="switch-handle"></span>
                    </label>
                </div><!--col-->
            </div><!--form-group-->

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="active"></label>
                <div class="col-md-6">
                    <button class="btn btn-success btn-sm" type="reset">Reset</button>
                    <button class="btn btn-success btn-sm " type="submit">Create</button>
                </div><!--col-->
            </div><!--form-group-->
            {!! Form::close() !!}    

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Games
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Game Name</th>
                                        <th>Win Multiplier</th>
                                        <th>Win Multiplier A/B</th>
                                        <th>Min Amount</th>
                                        <th>Max Amount</th>
                                        <th>Status</th>
                                        <th>Is Stop</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Game Name</th>
                                        <th>Win Multiplier</th>
                                        <th>Win Multiplier A/B</th>
                                        <th>Min Amount</th>
                                        <th>Max Amount</th>
                                        <th>Status</th>
                                        <th>Is Stop</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                   // print_r($games->name);
                                   // echo $games['name'];
                                   // die;
                                    ?>
                                    @foreach($games as $game)
                                    <tr>
                                        <td>{{$game['name']}}</td>
                                        <td>{{$game['jodi']}}</td>
                                        <td>{{$game['ab']}}</td>
                                        <td>{{$game['min_amount']}}</td>
                                        <td>{{$game['max_amount']}}</td>
                                        <td>{{$game['status']== 0 ? 'Deactive': 'Active' }}</td>
                                        <td>{{$game['is_stop']== 0 ? 'Off': 'On' }}</td>
                                        <td align="center" class="center">
                                            <a href="{{ URL::to('admin/game/' . $game['id'] ) }}"><i class="fa fa-cog fa-fw"></i></a>
                                        </td>
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
