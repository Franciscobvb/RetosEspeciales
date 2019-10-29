@extends('kaizentaishi.layout')

@section('titulo')
    Nikken | Taishi
@endsection

@section('reto')
    Taishi
@endsection

@section('kaizenphp1')
<div style="display: none">
    @php
        $num = 1;
        $vpfinal = 0;
        $frontales = 0;
        $nofrontales = 0;
        $nombre = "";
        $pais = "";
        $bandera = "";
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
                {{ $bandera = 'mexico.png' }}
                @break
            @case('COL')
                {{ $pais = 'Colombia' }}
                {{ $bandera = 'colombia.png' }}
                @break
            @case('CRI')
                {{ $pais = 'Costa Rica' }}
                {{ $bandera = 'costarica.png' }}
                @break
            @case('PAN')
                {{ $pais = 'Panamá' }}
                {{ $bandera = 'panama.png' }}
                @break
            @case('ECU')
                {{ $pais = 'Ecuador' }}
                {{ $bandera = 'ecuador.png' }}
                @break
            @case('PER')
                {{ $pais = 'Perú' }}
                {{ $bandera = 'peru.png' }}
                @break
            @case('SLV')
                {{ $pais = 'El Salvador' }}
                {{ $bandera = 'salvador.png' }}
                @break
            @case('GTM')
                {{ $pais = 'Guatemala' }}
                {{ $bandera = 'guatemala.png' }}
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
@endsection

@section('kaizen')
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
                            <img src="{{asset('retos/img/taishi_logo.png')}}" width="100%">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group col-md-12">
                            <p>Pais.</p>
                            <div class="input-group">
                                <input id="" type="text" name="" value="{{ $pais }}" class="form-control-rounded-left form-control" readonly>
                                <div class="input-group-append">
                                    <span class="form-control-rounded-right input-group-text" id="basic-addon1">
                                        <img src="{{asset('retos/img/' . $bandera)}}" width="20px">
                                    </span>
                                </div>
                            </div>
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
@endsection

@section('kaizenphp2')
<div style="display: none">
    {{ $incorporados = $frontales + $nofrontales }}
    <input type="text" id="associateid" value="{{ $associateid }}">
    <script>
        var URLactual = window.location;
        function updateTaishi(){
            var associateid = $('#associateid').val();
            var data = { sponsorid: associateid }
            $.ajax({
                type: 'GET',
                url: URLactual + '/updatetaishi',
                data: data,
                success: function(Response) {
                    if(Response == ''){
                        swal({
                            title: '',
                            text: "Aun no cumples el reto Taishi",
                            type: 'error',
                            padding: '2em'
                        })
                    }
                    else{
                        swal({
                            title: 'Felicidades!',
                            text: "Has cumplido el reto Taishi!",
                            type: 'success',
                            padding: '2em'
                        })
                    }
                }
            });
        }
        updateTaishi();
    </script>
</div>
@endsection