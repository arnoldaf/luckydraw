@extends('admin.theme.default')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">  Game Management<small class="text-muted"> Edit Game</small> </h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        @include('admin.partials.form-status')
    </div>


    <div class="mt-4 mb-4"> 
        <div class="col">
            {!! Form::open(array('route' => ['update-game',$game->id], 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
            {!! csrf_field() !!}
            <div class="form-group row">
                <label class="col-md-2 form-control-label required-field" for="game_name">Game Name</label>

                <div class="col-md-6">
                    {!! Form::text('game_name', $game->name, array('id' => 'game_name', 'class' => 'form-control', 'placeholder' => 'Game Name', 'required'=>"true", 'autofocus'=> "" )) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="win_percentage">Win Multiplier</label>

                <div class="col-md-6">
                    {!! Form::text('win_percentage', $gameJodi->multiply, array('id' => 'win_percentage', 'class' => 'form-control', 'placeholder' => 'Win Multiplier',  'autofocus'=> "" )) !!}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="win_percentage_ab">Win Multiplier A/B</label>

                <div class="col-md-6">
                    {!! Form::text('win_percentage_ab', $gameAB->multiply, array('id' => 'win_percentage_ab', 'class' => 'form-control', 'placeholder' => 'Win Multiplier A/B', 'autofocus'=> "" )) !!}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label required-field" for="min_amount">Min Amount</label>

                <div class="col-md-6">
                    {!! Form::text('min_amount', $game->min_amount, array('id' => 'min_amount', 'class' => 'form-control', 'placeholder' => 'Min Amount',  'autofocus'=> "" , 'required'=> "" )) !!}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label required-field" for="max_amount">Max Amount</label>

                <div class="col-md-6">
                    {!! Form::text('max_amount', $game->max_amount, array('id' => 'max_amount', 'class' => 'form-control', 'placeholder' => 'Max Amount',  'autofocus'=> "" , 'required'=> "" )) !!}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="active">Active</label>

                <div class="col-md-6">
                    <label class="switch switch-3d switch-primary">
                        <input class="switch-input" type="checkbox" name="status" id="active" value="1" {{$game->status?'checked="true"':''}}>
                        <span class="switch-label"></span>
                        <span class="switch-handle"></span>
                    </label>
                </div><!--col-->
            </div><!--form-group-->

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="active"></label>
                <div class="col-md-6">
                    <button class="btn btn-success btn-sm " type="submit">Update</button>
                </div><!--col-->
            </div><!--form-group-->
            {!! Form::close() !!}    

        </div><!--col-->
    </div><!--row-->


</div>
@endsection
