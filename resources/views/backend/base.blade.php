<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title .' | ' .config('app.name') }}</title>
    {{--section pour ajouter les fichiers ou code css--}}


    <link href="{{asset('backend/nifty/plugins/switchery/switchery.min.css')}}" rel="stylesheet">

    <link href="{{ asset('backend/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') }}" rel="stylesheet">

    {{--<link href="{{ asset('backend/plugins/switchery/switchery.min.css"') }}" rel="stylesheet">--}}
    <link href="{{ asset('backend/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('backend/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('backend/plugins/chosen/chosen.min.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('backend/plugins/noUiSlider/nouislider.min.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('backend/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="{{ asset('backend/css/sweetalert.css') }}" rel="stylesheet">

    <link href="{{ asset('backend/css/animate.css') }}" rel="stylesheet">

    <link href="{{ asset('backend/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    @yield('css')
    {{--include de l'entete--}}
    @include('Partials.head')


    {{--section pour ajouter les fichiers ou code js--}}

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>

    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

    <!-- daterangepicker -->
    <script type="text/javascript" src="{{ asset('backend/js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/daterangepicker.js') }}"></script>

    <script src="{{ asset('backend/js/sweetalert.min.js') }}"></script>

    {{--<script src="{{ asset('backend/js/demo/nifty-demo.min.js') }}"></script>--}}
    {{--<script src="{{ asset('backend/plugins/switchery/switchery.min.js') }}"></script>--}}
    <script src="{{ asset('backend/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    {{--<script src="{{ asset('backend/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>--}}
    <script src="{{ asset('backend/plugins/chosen/chosen.jquery.min.js') }}"></script>
    {{--<script src="{{ asset('backend/plugins/noUiSlider/nouislider.min.js') }}"></script>--}}
    <script src="{{ asset('backend/plugins/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('backend/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

    <script src="{{asset('backend/nifty/plugins/switchery/switchery.min.js')}}"></script>


    <script>
        $(function(){
            //$('#participant').chosen({width:'100%'});
            $('.select-research').chosen({width:'100%'});

            $('.dynamic_form').on('click', 'a', function(event){
                event.preventDefault();

                var index = +$(this).attr('data-content');
                console.log('Index: ' +index);
                $('.div-'+index).remove();

                compteur--;


            });

            $('.date-input').datepicker({
                format: "yyyy-mm-dd",
                autoclose:true,
                todayHighlight: true
            });

        });
    </script>

    @yield('js')
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    @include('Partials.header')
    <div class="boxed">
        <div id="content-container">
            @include('Partials.title')
            <div id="page-content">
                @yield('content')
            </div>
        </div>
        @include('Partials.sidebar')
    </div>
    @include('Partials.footer')
</div>
@include('flashy::message')
@yield('javascript')
</body>
</html>
