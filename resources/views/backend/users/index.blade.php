@extends('backend.base',['title' => 'Utilisateur'])

@section('css')
    <link href="{{asset('backend/nifty/plugins/datatables/media/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('backend/nifty/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css')}}" rel="stylesheet">
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
            <h3 class="panel-title" style="display: inline;">Liste des utilisateurs</h3>

            @can('create', App\User::class)
                <a href="{{route('user.create')}}" class="btn btn-primary">Ajouter</a>
            @endcan

        </div>

        <div class="panel-body">
            <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nom & Prénom</th>
                    <th>email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Date d'ajout</th>
                    <th class="min-tablet">Action</th>
                </tr>
                </thead>
                <tbody>
                @if($users->isNotEmpty())
                    @foreach($users as $user)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$user->full_name }}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->nom}}</td>
                            <td>
                                @if($user->id != Auth::user()->id)
                                    <form id="{{ 'verification'.$user->id }}"
                                          action="{{route('user.disable', $user->id)}}" method="POST">
                                        @csrf
                                        @if($user->status)
                                            <input class="demo-sw-checked" onchange="this.form.submit()" checked=""
                                                   style="display: none;" data-switchery="true" type="checkbox"/>
                                        @else
                                            <input class="demo-sw-checked" onchange="this.form.submit()"
                                                   style="display: none;"
                                                   data-switchery="true" type="checkbox"/>
                                        @endif
                                    </form>
                                @endif
                            </td>
                            <td>{{Date::make($user->created_at)->format('d F Y')}}</td>
                            <td>
                                <form method="POST" action="{{ route('user.destroy', ['id' => $user->id]) }}"
                                      onsubmit="return confirm('Voulez-vous vraiment supprimé cet utilisateur')">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                    @can('edit', App\User::class)
                                        <a href="{{route('user.edit', ['id' => $user->id]) }}" class="btn btn-warning btn-icon btn-circle"
                                           class="btn btn-warning btn-xs">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </a>
                                    @endcan

                                    @can('delete', App\User::class)
                                        <button type="submit" class="btn btn-danger btn-xs"> Supprimer
                                        </button>
                                    @endcan


                                </form>
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

@section('javascript')
    <script>

        var elems = Array.prototype.slice.call(document.querySelectorAll('.demo-sw-checked'));

        elems.forEach(function (html) {
            var switchery = new Switchery(html);
        });


    </script>
@endsection