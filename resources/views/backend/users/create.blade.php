@extends('backend.base')
@section('content')
    <div class="col-sm-6 col-lg-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Nouvel utilisateur</h3>
            </div>

            <!--Horizontal Form-->
            <!--===================================================-->

            {!! Form::open(['method' => 'POST', 'class' => 'panel-body form-horizontal form-padding', 'url' => route('user.store')]) !!}
            <div class="panel-body">
                <div class="panel-body">
                    @include('backend.users._form')
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-success" type="submit">Ajouter</button>
                </div>
            </div>

            {!! Form::close() !!}
            <!--===================================================-->
            <!--End Horizontal Form-->

        </div>
    </div>
@endsection