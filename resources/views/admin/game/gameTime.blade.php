@extends('admin.theme.default')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">  Game Time Management<small class="text-muted"> Create Game Time</small> </h3>
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
            {!! Form::open(array('route' => ['addGameTime'], 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
            {!! csrf_field() !!}
            <div class="form-group row">
                <label class="col-md-2 form-control-label required-field" for="game_id">Game Name</label>

                <div class="col-md-6">
                    <select class="custom-select form-control" name="game_id" id="game_id" required="required">
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
                <label class="col-md-2 form-control-label" for="game_date">Game Date</label>

                <div class="col-md-6">
                    {!! Form::date('game_date', NULL, array('id' => 'game_date', 'class' => 'form-control', 'placeholder' => 'Game Date', 'required'=>"true",   'autofocus'=> "" )) !!}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="start_time">Start Time</label>

                <div class="col-md-6">
                    {!! Form::time('start_time', NULL, array('id' => 'start_time', 'class' => 'form-control', 'placeholder' => 'Start Time', 'required'=>"true",   'autofocus'=> "" )) !!}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="end_time">End Time</label>

                <div class="col-md-6">
                    {!! Form::time('end_time', NULL, array('id' => 'end_time', 'class' => 'form-control', 'placeholder' => 'End Time', 'required'=>"true",   'autofocus'=> "" )) !!}
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
                            Games Time
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Game Name</th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Game Name</th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                      @foreach($times as $game)
                                    <tr>
                                        <td>{{$game->name}}</td>
                                        <td>{{$game->game_date}}</td>
                                        <td>{{$game->start_time}}</td>
                                        <td>{{$game->end_time}}</td>
                                        <td align="center" class="center">
                                            <a href="{{ URL::to('admin/game-times/' . $game->id ) }}"><i class="fa fa-cog fa-fw"></i></a>
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
