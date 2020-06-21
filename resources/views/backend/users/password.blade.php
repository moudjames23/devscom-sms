@extends('backend.base')
@section('content')
    <div class="col-sm-6 col-lg-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Mise à jour</h3>
            </div>

            <!--Horizontal Form-->
            <!--===================================================-->

            {!! Form::open(['method' => 'PUT', 'class' => 'panel-body form-horizontal form-padding', 'url' => route('password.update')]) !!}
            <div class="panel-body">
                <div class="panel-body">
                    <div class="form-group">

                        <input type="hidden" value="{{ $user->id }}" name="user_id"/>

                        <label class="col-sm-3 control-label" for="password"><b>Mot de passe</b></label>

                        <div class="col-sm-9">
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Taper votre mot de passe'])!!}
                            {!! $errors->first('password', '<small class="help-block ">:message</small>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="password_confirmation"><b>Confirmation</b></label>

                        <div class="col-sm-9">
                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Retaper votre mot de passe'])!!}
                            {!! $errors->first('password_confirmation', '<small class="help-block ">:message</small>') !!}
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-success" type="submit">Enregistrer</button>
                </div>
            </div>

            {!! Form::close() !!}
            <!--===================================================-->
            <!--End Horizontal Form-->

        </div>
    </div>

@endsection