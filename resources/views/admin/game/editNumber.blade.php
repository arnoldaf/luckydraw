@extends('admin.theme.default')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">  Game Number Management<small class="text-muted"> Edit Game Number</small> </h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        @include('admin.partials.form-status')
    </div>


    <div class="mt-4 mb-4"> 
        <div class="col">
            {!! Form::open(array('route' => ['update-game-number',$gamesNumber->id], 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
            {!! csrf_field() !!}

            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="first_name">Role</label>

                <div class="col-md-6">
                    <select class="custom-select form-control" name="game_id" id="game_id" disabled>
                        <option value="">Select Game</option>
                        @if ($games)
                        @foreach($games as $game)
                        <option value="{{ $game->id }}" {{ $gamesNumber->game_id == $game->id ? 'selected="selected"' : '' }}>{{ $game->name }}</option>
                        @endforeach
                        @endif
                    </select>

                </div><!--col-->
            </div><!--form-group-->
            <div class="form-group row">
                <label class="col-md-2 form-control-label required-field" for="game_number">Game Number</label>

                <div class="col-md-6">
                    {!! Form::text('game_number', $gamesNumber->number, array('id' => 'game_number', 'class' => 'form-control', 'placeholder' => 'Game Number', 'required'=>"true", 'autofocus'=> "" )) !!}
                </div>
            </div>




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
