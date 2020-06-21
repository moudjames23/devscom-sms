@extends('backend.base')
@section('content')
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $title }}</h3>
            </div>

            <!--Horizontal Form-->
            <!--===================================================-->

            {!! Form::open(['method' => 'PUT', 'class' => 'panel-body form-horizontal form-padding', 'url' => route('role.update', $role->id)]) !!}
            <div class="panel-body">
                <div class="panel-body">
                    <div class="col-sm-6 col-lg-offset-3">
                        @include('backend.roles._form')
                    </div>
                </div>
                <div class="panel-footer">
                    <h4>Affecter les permissions</h4>

                    <div class="row">
                        @php $lastType = ''; @endphp
                        @foreach($permissions as $permission)
                            @php $currentType = $permission->type @endphp

                            @if($lastType != $currentType)
                                @php $lastType = $currentType; @endphp

                                <div class="col-md-10">
                                    <h3> {{ $permission->type }} </h3>
                                </div>
                                
                            @endif

                            <div class="col-md-4">
                                <input type="checkbox" name="permissions[]"
                                    id="{{ $permission->permission }}"
                                    value="{{ $permission->id }} "
                            {{ in_array($permission->id, old('permission', $role->permissions->pluck('id')->toArray())) ? 'checked' : '' }}>
                                <label for="{{ $permission->permission }}" class="margin">
                                   <b> {{ $permission->label}}</b>
                                </label>
                            </div>
                        @endforeach
                    </div>
                   

                    <div class="text-right">
                        <button class="btn btn-success" type="submit">Enregistrer</button>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}
            <!--===================================================-->
            <!--End Horizontal Form-->

        </div>
    </div>
@endsection