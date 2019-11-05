@extends('kaizentaishi.layout')

@section('reto')
    Club Kiai
@endsection

@section('titulo')
    Nikken | Club Kiai
@endsection

@section('styles')

@endsection

@section('kiai')
    <div class="row layout-spacing">
        <div class="col-lg-3">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">            
                    </div>
                </div>
                <div class="widget-content widget-content-area text-center">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-12">
                                <a href="javascript:void(0)">
                                    <img src="{{asset('retos/img/ClubKiai.png')}}" width="75%" data-toggle="modal" data-target=".bd-example-modal-lg-img">
                                </a>
                                <div class="modal fade bd-example-modal-lg bd-example-modal-lg-img" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header graph text-center" style="background-color: #3baa35;">
                                                <button type="button" class="close" style="color: #ffffff;" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body graph-body">
                                                <div class="row">
                                                    <div class="col-lg-12 text-center" id="trimestre1">
                                                        <img src="{{asset('retos/img/ClubKiai.png')}}" width="100%">
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
        </div>
        <div class="col-lg-9">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            @foreach($getname as $n)
                            <h4>{{$n->AssociateName}}</h4>
                            @endforeach
                        </div>                 
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group col-md-12">
                                <img src="{{asset('retos/img/kiai_logo.png')}}" width="100%">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group col-md-12">
                                <p>Código:</p>
                                <input id="" type="text" name="" value="{{ $associateid }}" class="form-control-rounded form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach($summary as $index=>$s)
        <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header text-center" style="background-color: #3aaa35;">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                @if($s->Validacion == 'T')
                                    <h4 style="color:white">
                                        Trimestre No. {{$s->NoTrimestre}}
                                        <span class="flaticon-fill-tick" style="padding-left: 20px;"></span> Cumple
                                    </h4>
                                @else
                                    <h4 style="color:white">
                                        Trimestre No. {{$s->NoTrimestre}}
                                        <span class=" flaticon-close-fill" style="padding-left: 20px;"></span> No Cumple
                                    </h4>
                                @endif 
                            </div>                 
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="row">
                            <div class="col-md-3 col-3">
                                <p class="mt-2">Resumen del trimestre </p>
                            </div>
                            <div class="col-md-9 col-9">
                                <button type="button" class="btn btn-primary btn-rounded  mb-4 mr-2" data-toggle="modal" data-target=".bd-example-modal-xl-{{$index}}">
                                    Ver estatus de mi red
                                </button>

                                <div class="modal fade bd-example-modal-xl bd-example-modal-xl-{{$index}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myExtraLargeModalLabel">Ver estatus de mi red</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive mb-4">
                                                    <table id="alter_pagination{{$index}}" class="table table-bordered table-hover" style="font-size:11px;">
                                                        <thead>
                                                            <tr>
                                                                <th style="color: gray" class="text-center">Id Asociado</th>
                                                                <th style="color: gray">Nivel</th>
                                                                <th style="color: gray"><p style="width: 420px;margin-left: 34%;">Nombre Asociado</p></th>
                                                                <th style="color: gray">País</th>
                                                                <th style="color: gray">Rango</th>
                                                                <th style="color: gray">VP Acumulado</th>
                                                                <th style="color: gray">VGP Acumulado</th>
                                                                <th style="color: gray">No. Trimestre</th>
                                                                <th style="color: gray">Kiai Trimestre</th>
                                                            </tr>
                                                        </thead>
                                                        @if(!count($detail))
                                                            <tbody>
                                                                <tr role="row" class="odd" style="color:black;">
                                                                    <td colspan="15" class="center_text"> No se encontraron Resultados</td>
                                                                </tr>
                                                            </tbody>
                                                        @endif
                                                        <tbody>
                                                        @foreach($genealogy as $gen)
                                                            @php
                                                                $pais = "";
                                                                $bandera = "";
                                                            @endphp
                                                            @switch($gen->Pais)
                                                                @case('LAT')
                                                                    @php $pais = 'México' @endphp
                                                                    @php $bandera = 'mexico.png '@endphp
                                                                    @break
                                                                @case('COL')
                                                                    @php $pais = 'Colombia' @endphp
                                                                    @php $bandera = 'colombia.png' @endphp
                                                                    @break
                                                                @case('CRI')
                                                                    @php $pais = 'Costa Rica' @endphp
                                                                    @php $bandera = 'costarica.png' @endphp
                                                                    @break
                                                                @case('PAN')
                                                                    @php $pais = 'Panamá' @endphp
                                                                    @php $bandera = 'panama.png' @endphp
                                                                    @break
                                                                @case('ECU')
                                                                    @php $pais = 'Ecuador' @endphp
                                                                    @php $bandera = 'ecuador.png' @endphp
                                                                    @break
                                                                @case('PER')
                                                                    @php $pais = 'Perú' @endphp
                                                                    @php $bandera = 'peru.png' @endphp
                                                                    @break
                                                                @case('SLV')
                                                                    @php $pais = 'El Salvador' @endphp
                                                                    @php $bandera = 'salvador.png' @endphp
                                                                    @break
                                                                @case('GTM')
                                                                    @php $pais = 'Guatemala'@endphp
                                                                    @php $bandera = 'guatemala.png' @endphp
                                                                    @break
                                                            @endswitch
                                                            @if($gen->NoTrimestre == $s->NoTrimestre)
                                                                @if ( $gen->Periodo == 201903 || $gen->Periodo == 201906 || $gen->Periodo == 201909)
                                                                    <tr role="row" class="even" style="color:black;">
                                                                        <td>{{$gen->associateid}}</td>
                                                                        <td>{{$gen->nivel}}</td>
                                                                        <td>
                                                                            <p>
                                                                                <?php $points =""; ?>
                                                                                @for ($i = 0; $i < $gen->nivel; $i++)
                                                                                <?php $points .= '.';?>
                                                                                @endfor
                                                                                {{$points.=$gen->AssociateName}}
                                                                            </p>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <img src="{{asset("retos/img/$bandera")}}" width="15px">
                                                                            {{$pais}}
                                                                        </td>
                                                                        <td>{{$gen->Rango}}</td>
                                                                        <td>{{number_format($gen->VpAcumulado,2)}}</td>
                                                                        <td>{{number_format($gen->VGPacumulado,2)}}</td>
                                                                        <td>{{$gen->NoTrimestre}}</td>
                                                                        <td class="text-center">
                                                                            @if($gen->KiaiTrimestre == 'YES')
                                                                                <span class="flaticon-fill-tick" style="font-size: 20px"></span>
                                                                                <span style="display: none">Cumple</span>
                                                                            @else
                                                                                <span class="flaticon-close-fill" style="font-size: 20px"></span>
                                                                                <span style="display: none">No Cumple</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                        
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 text-center">
                                                        <h5>
                                                            <span class="flaticon-left-arrow-12"></span>
                                                            Desliza para ver tu Genealogía
                                                            <span class="flaticon-arrow-left"></span>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="widget-content widget-content-area">
                                    <div class="table-responsive mb-4">
                                        <table id="individual-col-search{{$index}}" class="table table-striped table-bordered table-hover" style="font-size:11px;">
                                            <thead>
                                                <tr>
                                                    <th style="color: gray">Periodo</th>
                                                    <th style="color: gray">Nombre Asociado</th>
                                                    <th style="color: gray">País</th>
                                                    <th style="color: gray">Rango</th>
                                                    <th style="color: gray">VP</th>
                                                    <th style="color: gray">VGP</th>
                                                    <th style="color: gray">VP Acumulado</th>
                                                    <th style="color: gray">VGP Acumulado</th>
                                                    <th style="color: gray">Kiai Trimestre</th>
                                                </tr>
                                            </thead>
                                            @if(!count($detail))
                                            <tbody>
                                                <<tr role="row" class="odd" style="color:black;">
                                                    <td colspan="15" class="center_text"> No se encontraron Resultados</td>
                                                </tr>
                                            </tbody>
                                            @endif
                                            <tbody>
                                            @foreach($detail as $reg)
                                                @php
                                                    $pais = "";
                                                    $bandera = "";
                                                @endphp
                                                @switch($reg->Pais)
                                                    @case('LAT')
                                                        @php $pais = 'México' @endphp
                                                        @php $bandera = 'mexico.png '@endphp
                                                        @break
                                                    @case('COL')
                                                        @php $pais = 'Colombia' @endphp
                                                        @php $bandera = 'colombia.png' @endphp
                                                        @break
                                                    @case('CRI')
                                                        @php $pais = 'Costa Rica' @endphp
                                                        @php $bandera = 'costarica.png' @endphp
                                                        @break
                                                    @case('PAN')
                                                        @php $pais = 'Panamá' @endphp
                                                        @php $bandera = 'panama.png' @endphp
                                                        @break
                                                    @case('ECU')
                                                        @php $pais = 'Ecuador' @endphp
                                                        @php $bandera = 'ecuador.png' @endphp
                                                        @break
                                                    @case('PER')
                                                        @php $pais = 'Perú' @endphp
                                                        @php $bandera = 'peru.png' @endphp
                                                        @break
                                                    @case('SLV')
                                                        @php $pais = 'El Salvador' @endphp
                                                        @php $bandera = 'salvador.png' @endphp
                                                        @break
                                                    @case('GTM')
                                                        @php $pais = 'Guatemala'@endphp
                                                        @php $bandera = 'guatemala.png' @endphp
                                                        @break
                                                @endswitch
                                                @if($reg->NoTrimestre == $s->NoTrimestre)
                                                    <tr role="row" class="even" style="color:black;">
                                                        <td>
                                                            {{$reg->Periodo}}
                                                        </td>
                                                        <td>
                                                            {{$reg->AssociateName}}
                                                        </td>
                                                        <td class="text-center">
                                                            <img src="{{asset("retos/img/$bandera")}}" width="15px">
                                                            {{$pais}}
                                                        </td>
                                                        <td>
                                                            {{$reg->Rango}}
                                                        </td>
                                                        <td>
                                                            {{number_format($reg->Vp,2)}}
                                                        </td>
                                                        <td>
                                                            {{number_format($reg->VGP,2)}}
                                                        </td>
                                                        <td>
                                                            {{number_format($reg->VpAcumulado,2)}}
                                                        </td>
                                                        <td>
                                                            {{number_format($reg->VGPacumulado,2)}}
                                                        </td>
                                                        <td class="text-center">
                                                            @if($reg->KiaiTrimestre == 'YES')
                                                                <span class="flaticon-fill-tick" style="font-size: 20px"></span>
                                                                <span style="display: none">Cumple</span>
                                                            @else
                                                                <span class="flaticon-close-fill" style="font-size: 20px"></span>
                                                                <span style="display: none">No Cumple</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row" style="display: none">
                                    <div class="col-lg-12 text-center">
                                        <h5>
                                            <span class="flaticon-left-arrow-12"></span>
                                            Desliza para ver tu Genealogía
                                            <span class="flaticon-arrow-left"></span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('scripts')
@foreach($summary as $index=>$s)
    <script>
        $(document).ready(function() {
            $('#individual-col-search{{$index}}').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [
                    { extend: 'excel', className: 'btn btn-fill btn-fill-dark btn-rounded mb-4 mr-3', text:"<img src='{{ asset('retos/img/excel.png') }}' width='15px'></img> Exportar a Excel",}
                ],
                "searching": false,
                "bPaginate": false,
            });

            $('#alter_pagination{{$index}}').DataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [
                    { extend: 'excel', className: 'btn btn-fill btn-fill-dark btn-rounded mb-4 mr-3', text:"<img src='{{ asset('retos/img/excel.png') }}' width='15px'></img> Exportar a Excel",}
                ]
            });
        });
    </script>
@endforeach
@endsection
