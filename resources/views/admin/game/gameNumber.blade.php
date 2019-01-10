@extends('admin.theme.default')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">  Result Declaration </h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    
    <div class="row">
        <div class="col-lg-6">
            @include('admin.partials.form-status')
        </div>
    </div>

    <div class="mt-4 mb-4">
        <div class="col">
            {!! Form::open(array('route' => ['addGameNumber'], 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
            {!! csrf_field() !!}
            <div class="form-group row">
                <label class="col-md-2 form-control-label required-field" for="game_id">Game Name</label>

                <div class="col-md-4">
                    <select class="custom-select form-control" name="game_id" id="game_id" required="required">
                                <option value="">Select Game</option>
                                @if ($games)
                                    @foreach($games as $game)
                                        <option value="{{ $game->id }}" {{old('game_id') ==$game->id ?'selected':'' }} >{{ $game->name }}</option>
                                    @endforeach
                                @endif
                     </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label required-field" for="game_number">Game Number</label>

                <div class="col-md-4">
                    {!! Form::text('game_number',  Request::get('game_number'), array('id' => 'game_number', 'class' => 'form-control', 'placeholder' => 'Game Number', 'required'=>"true",  "min"=>"0", "max"=>"99", "onkeypress"=>"isNumberValidation(event)",  'autofocus'=> "" )) !!}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 form-control-label required-field" for="game_date">Game Date</label>

                <div class="col-md-4">
                    <input value="{{ old('game_date') }}" required="true" class="form-control" name="game_date" placeholder="Game Date" type="text" readonly id= "lotteryDate" name="lotteryDate">
                </div>
            </div>
           
            <div class="form-group row">
                <label class="col-md-2 form-control-label" for="active"></label>
                <div class="col-md-6">
                    <button class="btn btn-success btn-sm" type="reset">Reset</button>
                    <button class="btn btn-success btn-sm " type="submit">Declare</button>
                </div><!--col-->
            </div><!--form-group-->
            {!! Form::close() !!}    

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Games Number
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Game Name</th>
                                        <th>Game Date</th>
                                        <th>Declare Date</th>
                                        <th>Number</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="center">Game Name</th>
                                        <th class="center">Game Date</th>
                                        <th class="center">Declare Date</th>
                                        <th class="center">Number</th>
                                        <th class="center">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                      @foreach($number as $game)
                                    <tr> 
                                        <td class="center">{{$game->name}}</td>
                                        <td class="center">{{date('d M Y', strtotime($game->declare_date))}}</td>
                                        <td class="center">{{date('d M Y h:i:s A', strtotime($game->created_at))}}</td>
                                        <td class="center">{{$game->number}}</td>
                                        <td class="center">
                                            <?php if($game->status==0) { ?>
                                            {!! Form::open(array('route' => ['game-number-result',$game->game_id], 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
                                            {!! csrf_field() !!}
                                           <a title="Edit Number" href="{{ URL::to('admin/game-number/' . $game->id ) }}"><i class="fa fa-edit fa-fw"></i></a> 
                                           <button class="btn btn-success btn-sm " type="submit">Run Payout</button>
                                             {!! Form::close() !!}  
                                            <? } else echo '<button type="button" class="btn btn-info">Result Declared</button>';?>
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


<script>
    
     function isNumberValidation(evt) {
           console.log(evt);
           return false;
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
            }
            return true;
            }
</script>    
