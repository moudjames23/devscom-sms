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
@stop
@section('content')

    <div class="panel">
        <div class="panel-heading">
             <h3 class="panel-title" style="display: inline;">Liste des parrainages de l'agent <b>{{ $user->nom }}</b></h3>

         </div>

        <div class="panel-body">
            <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Carte Electeur</th>
                    <th>Carte CEDEAO</th>
                    <th>Circonscription</th>
                    <th>Date Ajout</th>
                </tr>
                </thead>
                <tbody>
                @if($parrainages->isNotEmpty())
                    @foreach($parrainages as $parrainage)
                        <tr>

                            <td>{{$parrainage->nom}}</td>
                            <td>{{$parrainage->prenom}}</td>
                            <td>{{$parrainage->electeur}}</td>
                            <td>{{$parrainage->cedeao}}</td>
                            <td>{{$parrainage->circonscription}}</td>
                            <td> {{ Date::make($parrainage->created_at)->format('d F Y')  }} </td>

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

