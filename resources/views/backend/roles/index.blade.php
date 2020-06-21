@extends('backend.base')

@section('css')
    <link href="{{asset('backend/nifty/plugins/datatables/media/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('backend/nifty/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css')}}"
          rel="stylesheet">

    <!--Animate.css [ OPTIONAL ]-->
    <link href="{{ asset('backend/plugins/animate-css/animate.min.css') }}" rel="stylesheet">
@stop

@section('js')
    <script src="{{asset('backend/nifty/plugins/datatables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/nifty/plugins/datatables/media/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('backend/nifty/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/nifty/js/demo/tables-datatables.js')}}"></script>


@endsection
@section('content')


    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title" style="display: inline;">{{ $title }}</h3>
           
            @can('create', App\Role::class)
                <a href="{{ route('role.create') }}" class="btn btn-primary">Ajouter</a>
            @endcan
                
            
        </div>

        <div class="panel-body">
            <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nom</th>
                    <th>Utilisateurs</th>
                    <th>Permissions</th>
                    <th class="min-tablet">Action</th>
                </tr>
                </thead>
                <tbody>
                @if($roles->isNotEmpty())
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td><a href="{{ route('role.show', $role->id) }}">{{$role->nom}}</a></td>
                            <td>{{ count($role->users) }}</td>
                            <td>{{ count($role->permissions) }}</td>
                            <td>
                                
                                @can('show', App\Role::class)
                                    <a href="{{ route('role.show', $role->id) }}"
                                    class="btn btn-info btn-icon btn-circle">
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
                                @endcan

                                @can('edit', App\Role::class)
                                    <a href="{{route('role.edit', ['id' => $role->id]) }}"
                                    class="btn btn-warning btn-icon btn-circle">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                @endcan

                                @can('delete', App\Role::class)

                                @if(!count($role->users))
                                    <a data-id="{{$role->id}}" id="deleterole{{$role->id}}" name="delete"
                                    href="" class="btn btn-danger btn-icon btn-circle deleterole">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </a>
                                @endif
                                
                                @endcan
                                
                                   
                                

                            </td>

                        </tr>



                    @endforeach
                @else
                    <p class="alert alert-danger">Aucune information disponible pour le moment!</p>
                @endif
                </tbody>
            </table>
        </div>


    </div>




@endsection

