@extends('backend.base')
@section('content')
    <div class="col-sm-8 col-lg-offset-2">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $title }}</h3>
            </div>

            <!--Horizontal Form-->
            <!--===================================================-->

            {!! Form::open(['method' => 'POST', 'class' => 'panel-body form-horizontal form-padding', 'url' => route('message.store')]) !!}
            <div class="panel-body">
                <div class="panel-body">
                    @include('backend.messages._form')
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-success" type="submit">Envoyer</button>
                </div>
            </div>

            {!! Form::close() !!}
            <!--===================================================-->
            <!--End Horizontal Form-->

        </div>
    </div>
@endsection