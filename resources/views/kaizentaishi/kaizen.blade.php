<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>Reto Kaizen </title>
        <link rel="shortcut icon" href="https://nikkenlatam.com/favicon.ico" type="image/x-icon">
        <link rel="icon" href="https://nikkenlatam.com/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" sizes="144x144" href="https://nikkenlatam.com/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="114x114" href="https://nikkenlatam.com/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="72x72" href="https://nikkenlatam.com/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" href="https://nikkenlatam.com/apple-touch-icon.png">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <link href="{{asset('retos/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('retos/css/plugins.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{asset('retos/plugins/table/datatable/datatables.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('retos/plugins/table/datatable/custom_dt_zero_config.css')}}">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">

        <script src="{{asset('retos/js/libs/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('retos/bootstrap/js/popper.min.js')}}"></script>
        <script src="{{asset('retos/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('retos/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
        <script src="{{asset('retos/js/custom.js')}}"></script>

        <script src="{{asset('retos/plugins/sweetalerts/promise-polyfill.js')}}"></script>
        <link href="{{asset('retos/plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('retos/plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('retos/css/ui-kit/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />
        
        <script src="{{asset('retos/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
        <script src="{{asset('retos/plugins/sweetalerts/custom-sweetalert.js')}}"></script>

        <script src="{{asset('retos/plugins/table/datatable/datatables.js')}}"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
        <style>
            .form-control {
                border: 1px solid #ccc;
                color: #888ea8;
                font-size: 15px;
            }
            code { color: #3862f5; }
            .form-control:disabled, .form-control[readonly] { background-color: #f1f3f9; border-color: #f1f3f1; }
            .btn-primary.disabled, .btn-primary:disabled { background-color: #3862f5; border-color: #3862f5; }
            label { color: #3b3f5c; margin-bottom: 14px; }
            .form-control::-webkit-input-placeholder { color: #888ea8; font-size: 15px; }
            .form-control::-ms-input-placeholder { color: #888ea8; font-size: 15px; }
            .form-control::-moz-placeholder { color: #888ea8; font-size: 15px; }
            .form-control:focus { border-color: #3862f5; }
            .input-group-text {
                background-color: #f3f4f7;
                border-color: #e9ecef;
                color: #6156ce;
            }
            select.form-control {
                display: inline-block;
                width: 100%;
                height: calc(2.25rem + 2px);
                vertical-align: middle;
                background: #fff url(assets/img/arrow-down.png) no-repeat right .75rem center;
                background-size: 13px 14px;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
            }
            select.form-control::-ms-expand { display: none; }
        </style>
    </head>
    <body class="default-sidebar">
        <header class="tabMobileView header navbar fixed-top d-lg-none">
            <div class="nav-toggle">
                    <a href="javascript:void(0);" class="nav-link sidebarCollapse" data-placement="bottom">
                        <i class="flaticon-menu-line-2"></i>
                    </a>
                <a href="" class=""> <img src="http://services.nikken.com.mx/img/icons/logo_nikken_white.png" class="img-fluid" alt="logo"></a>
            </div>
            <ul class="nav navbar-nav">
                <li class="nav-item d-lg-none"> 
                    <form class="form-inline justify-content-end" role="search">
                        <input type="text" class="form-control search-form-control mr-3">
                    </form>
                </li>
            </ul>
        </header>

        <div style="display: none">
            @php
                $num = 1;
                $vpfinal = 0;
                $frontales = 0;
                $nofrontales = 0;
                $nombre = "";
                $pais = "";
                $vandera = "";
                $rango = "";
                $VpAcumulado = "";
                $VgpAcumulado = "";
                $incorporados = 0;
            @endphp
            @foreach ($response as $row)
                @php
                    $num++;
                    $vpfinal = $vpfinal + $row->Vp;
                @endphp
                @if ($row->lvel == 1)
                    @php $frontales++; @endphp
                @else
                    @php $nofrontales++; @endphp
                @endif
            @endforeach
            @foreach ($sponsor as $data)
                {{ $nombre = $data->Nombre }}
                @switch($data->Pais)
                    @case('LAT')
                        {{ $pais = 'México' }}
                        @break
                    @case('LAT')
                        {{ $pais = 'México' }}
                        @break
                    @case('LAT')
                        {{ $pais = 'México' }}
                        @break
                    @case('LAT')
                        {{ $pais = 'México' }}
                        @break
                    @case('LAT')
                        {{ $pais = 'México' }}
                        @break
                @endswitch
                @switch($data->Rango)
                    @case(1)
                        {{ $rango = "Directo" }}
                        @break
                    @case(3)
                        {{ $rango = "Ejecutivo" }}
                        @break
                    @case(5)
                        {{ $rango = "Plata" }}
                        @break
                    @case(6)
                        {{ $rango = "ORO" }}
                        @break
                    @case(7)
                        {{ $rango = "Platino" }}
                        @break
                    @case(8)
                        {{ $rango = "Diamante" }}
                        @break
                    @case(9)
                        {{ $rango = "Diamante Real" }}
                        @break
                @endswitch
                {{ $rango }}
                {{ $VpAcumulado = $data->VpAcumulado }}
                {{ $VgpAcumulado = $data->VgpAcumulado }}
            @endforeach
        </div>

        <div class="main-container" id="container">
            <div class="sidebar-wrapper sidebar-theme" style="margin-top: -170px !important">
                <nav id="sidebar" style="background: #181722 !important;">
                   <ul class="navbar-nav theme-brand flex-row  d-none d-lg-flex">
                       <li class="nav-item theme-text">
                           <a href="" class="nav-link" style="color: white !important;"> Retos Especiales </a>
                       </li>
                   </ul>
                   <ul class="menu-categories" id="accordionExample">
                       <li class="menu">
                           <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                           </a>
                       </li>
                       <li class="menu">
                       <a href="http://services.nikken.com.mx/kiai/{{ $associateid }}">
                               <div class="">
                                   <i class="flaticon-bar-chart-2" style="color: white !important;"> </i>
                                   <span style="color: white !important;">Reto Kiai</span>
                               </div>
                           </a>
                       </li>
                       <li class="menu">
                           <a href="http://services.nikken.com.mx/serpro/{{ $associateid }}-Y">
                               <div class="">
                                   <i class="flaticon-bar-chart-2" style="color: white !important;"></i>
                                   <span style="color: white !important;">Reto Ser Pro</span>
                               </div>
                           </a>
                       </li>
                       <li class="menu">
                           <a href="http://keizentaishi.test/kaizen/{{ $associateid }}">
                               <div class="">
                                   <i class="flaticon-bar-chart-2" style="color: white !important;"></i>
                                   <span style="color: white !important;">Reto Kaizen</span>
                               </div>
                           </a>
                       </li>
                       <li class="menu">
                           <a href="http://keizentaishi.test/taishi/{{ $associateid }}" >
                               <div class="">
                                   <i class="flaticon-bar-chart-2" style="color: white !important;"></i>
                                   <span  style="color: white !important;">Reto Taishi</span>
                               </div>
                           </a>
                       </li>
                   </ul>
               </nav>
            </div>
            
            <div id="content" class="main-content">
                <div class="container">
                    <div class="main-container" id="container">
                        <div id="content" class="main-content">
                            <div class="container">
                                <div class="row layout-spacing">
                                    <div class="col-lg-12">
                                        <div class="statbox widget box box-shadow">
                                            <div class="widget-header">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h4>{{ $nombre }}</h4>
                                                    </div>                 
                                                </div>
                                            </div>
                                            <div class="widget-content widget-content-area">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group col-md-12">
                                                            <img src="{{asset('retos/img/kaizen_logo.png')}}" width="100%">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group col-md-12">
                                                            <p>Pais.</p>
                                                            <input id="" type="text" name="" value="{{ $pais }}" class="form-control-rounded form-control" required="" readonly>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <p>Rango.</p>
                                                            <input id="" type="text" name="" value="{{ $rango }}" class="form-control-rounded form-control" required="" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group col-md-12">
                                                            <p>VP Acumulado.</p>
                                                            <input id="" type="text" name="" value="{{ $VpAcumulado }}" class="form-control-rounded form-control" required="" readonly>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <p>VGP Acumulado.</p>
                                                            <input id="vgpFinalTxt" type="text" name="vgpFinalTxt" value="{{$VgpAcumulado }}" class="form-control-rounded form-control" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group col-md-12">
                                                            <p>Incoporados Frontales:</p>
                                                            <input id="incdosFrontales" type="text" name="incdosFrontales" value="{{$frontales}}" class="form-control-rounded form-control" readonly>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <p>Incorporados de Grupo Personal.</p>
                                                            <input id="indosGP" type="text" name="indosGP" value="{{$nofrontales}}" class="form-control-rounded form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="row layout-spacing">
                                    <div class="col-lg-12">
                                        <div class="statbox widget box box-shadow">
                                            <div class="widget-content widget-content-area">
                                                <div class="table-responsive mb-4">
                                                    <table id="zero-config" class="table table-striped table-hover table-bordered sticky-thead" style="width:100%">
                                                        <thead>
                                                            @php
                                                                $num = 1;
                                                                $vpfinal = 0;
                                                                $rango = "";
                                                            @endphp
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Codigo Asociado</th>
                                                                <th>Nombre</th>
                                                                <th>Pais</th>
                                                                <th>Rango</th>
                                                                <th>Telefono</th>
                                                                <th>Correo</th>
                                                                <th>VP</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($response as $row)
                                                                <span style="display: none">
                                                                    @switch($row->RangoA)
                                                                        @case(1)
                                                                            {{ $rango = "Directo" }}
                                                                            @break
                                                                        @case(3)
                                                                            {{ $rango = "Ejecutivo" }}
                                                                            @break
                                                                        @case(5)
                                                                            {{ $rango = "Plata" }}
                                                                            @break
                                                                        @case(6)
                                                                            {{ $rango = "ORO" }}
                                                                            @break
                                                                        @case(7)
                                                                            {{ $rango = "Platino" }}
                                                                            @break
                                                                        @case(8)
                                                                            {{ $rango = "Diamante" }}
                                                                            @break
                                                                        @case(9)
                                                                            {{ $rango = "Diamante Real" }}
                                                                            @break
                                                                    @endswitch
                                                                </span>
                                                                <tr>
                                                                    <td class="text-primary">@php  echo $num; @endphp</td>
                                                                    <td>{{$row->associateid}}</td>
                                                                    <td>{{$row->Nombre}}</td>
                                                                    <td>{{$row->Pais}}</td>
                                                                    <td>{{$rango}}</td>
                                                                    <td>{{$row->Telefono}}</td>
                                                                    <td>{{$row->Email}}</td>
                                                                    <td>{{$row->Vp}}</td>
                                                                </tr>
                                                                @php
                                                                    $num++;
                                                                    $vpfinal = $vpfinal + $row->Vp;
                                                                @endphp
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr class="table-dark">
                                                                <th colspan="7">Volumen Grupal Personal</th>
                                                                <th><span id="vpFinalLabel">@php  echo $vpfinal; @endphp</span></th>
                                                            </tr>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Codigo Asociado</th>
                                                                <th>Nombre</th>
                                                                <th>Pais</th>
                                                                <th>Rango</th>
                                                                <th>Telefono</th>
                                                                <th>Correo</th>
                                                                <th>VP</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="display: none">
            {{ $incorporados = $frontales + $nofrontales }}
            <input type="text" id="associateid" value="{{ $associateid }}">
            <script>
                var URLactual = window.location;
                function updateKaizen(){
                    var associateid = $('#associateid').val();
                    var data = { sponsorid: associateid }
                    $.ajax({
                        type: 'GET',
                        url: URLactual + '/updatekaizen',
                        data: data,
                        success: function(Response) {
                            if(Response == ''){
                                swal({
                                    title: '',
                                    text: "Aun no cumples el reto Kaizen",
                                    type: 'error',
                                    padding: '2em'
                                })
                            }
                            else{
                                swal({
                                    title: 'Felicidades!',
                                    text: "Has cunplido el reto Kaizen!",
                                    type: 'success',
                                    padding: '2em'
                                })
                            }
                        }
                    });
                }
                updateKaizen();
            </script>
        </div>

        <footer class="footer-section theme-footer">
            <div class="footer-section-1  sidebar-theme">
            </div>
            <div class="footer-section-2 container-fluid">
                <div class="row">
                    <div id="toggle-grid" class="col-xl-7 col-md-6 col-sm-6 col-12 text-sm-left text-center">
                        
                    </div>
                    <div class="col-xl-5 col-md-6 col-sm-6 col-12">
                        <ul class="list-inline mb-0 d-flex justify-content-sm-end justify-content-center mr-sm-3 ml-sm-0 mx-3">
                            <li class="list-inline-item  mr-3">
                                <p class="bottom-footer">&#xA9; 2019 <a target="_blank" href="https://nikkenlatam.com/oficina-virtual/mexico/">Nikken Latam</a></p>
                            </li>
                            <li class="list-inline-item align-self-center">
                                <div class="scrollTop"><i class="flaticon-up-arrow-fill-1"></i></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </body>
    <script>
        $(function() {
            $('#zero-config').DataTable({
    
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [
                    { extend: 'excel', className: 'btn btn-fill btn-fill-dark btn-rounded mb-4 mr-3', text:"<img src='{{ asset('retos/img/excel.png') }}' width='15px'></img> Exportar a Excel",}
                ]
            });
            $('#vgpFinalTxt').text($('#vpFinalLabel').text());
        });
    </script>
</html>