@extends('backend.base')

@section('css')
    <link href="{{asset('backend/nifty/plugins/datatables/media/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('backend/nifty/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css')}}"
          rel="stylesheet">
    <link href="{{asset('backend/css/lightbox.min.css')}}" rel="stylesheet">
@stop

@section('js')
    <script src="{{asset('backend/nifty/plugins/datatables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/nifty/plugins/datatables/media/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('backend/nifty/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/nifty/js/demo/tables-datatables.js')}}"></script>

    <script src="{{asset('backend/js/lightbox-plus-jquery.min.js')}}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-base">

                    <!--Nav Tabs-->
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#demo-lft-tab-1">Utilisateurs </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#demo-lft-tab-2">Permissions</a>
                        </li>


                    </ul>

                    <div class="tab-content">
                        <div id="demo-lft-tab-1" class="tab-pane fade active in">

                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title" style="display: inline;">Utilisateurs</h3>
                                </div>

                                <div class="panel-body">
                                    <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0"
                                           width="100%">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nom & Prénom</th>
                                            <th>Email</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($users->isNotEmpty())
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{$loop->index+1}}</td>

                                                    <td>
                                                        <a href="{{ route('user.show', $user->id) }}">
                                                            {{ $user->full_name }}
                                                        </a>
                                                    </td>

                                                    <td>
                                                        {{ $user->email}}

                                                    </td>

                                                </tr>


                                            @endforeach
                                        @else
                                            <p class="alert alert-danger">Aucune information disponible pour le
                                                moment!</p>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>


                        <div id="demo-lft-tab-2" class="tab-pane fade">

                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title" style="display: inline;">Permissions</h3>
                                </div>

                                <div class="panel-body">
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
                                                   value="{{ $permission->id }} " checked>
                                            <label for="{{ $permission->permission }}" class="margin">
                                                <b> {{ $permission->label}}</b>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>


                            </div>
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection