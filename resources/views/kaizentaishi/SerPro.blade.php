@extends('kaizentaishi.layout')

@section('titulo')
    Nikken | Reto SER PRO
@endsection

@section('styles')
<style>
    .graph{
        color: #ffffff;
        background-color: #006b38;
    }

    .graph-body{
        color: #ffffff;
        background-color: #25b24a;
    }

    .cuatrimestres{
        margin: 5px;
    }

    .active{
        padding: 5px; 
        border: 3px solid #ffffff !important; 
        border-radius: 25px;
    }

    .cuat a{
        color: #ffffff;
    }

    .hide{
        display: none;
    }

    .submitRegist{
        width: 80%;
        margin: auto;
    }
</style>    
@endsection

@section('reto')
    Reto SER PRO
@endsection

@section('kaizen')
<div class="row layout-spacing">
    <div class="col-xl-4 col-lg-6 col-md-6 mb-3">
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
                                <img src="{{asset('retos/img/serpro.png')}}" width="75%" data-toggle="modal" data-target=".bd-example-modal-lg-img">
                            </a>
                            <div class="modal fade bd-example-modal-lg bd-example-modal-lg-img" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header graph text-center">
                                            <button type="button" class="close" style="color: #ffffff;" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body graph-body" style="background-color: #ffffff;">
                                            <div class="row">
                                                <div class="col-lg-12 text-center">
                                                    <img src="{{asset('retos/img/serpro.png')}}" width="100%">
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
    <div class="col-xl-4 col-lg-6 col-md-6 mb-3">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <div style="display: none">
                            @php
                                $nombre = "";
                                $codigo = "";
                                $email = "";
                                $rango = "";
                                $pais = "";
                                $bandera = "";
                            @endphp
                            @foreach($getname as $n)
                                @php
                                    $nombre = $n->Nombre;
                                    $codigo = $n->Sponsor;
                                    $email = $n->Email;
                                    $rango = $n->Rango;
                                @endphp
                            @endforeach
                            @switch($curRank)
                                @case(1)
                                    @php $rango = "Directo" @endphp
                                @case(3)
                                    @php $rango = "Ejecutivo" @endphp
                                    @break
                                @case(5)
                                    @php $rango = "Plata" @endphp
                                    @break
                                @case(6)
                                    @php $rango = "ORO" @endphp
                                    @break
                                @case(7)
                                    @php $rango = "Platino" @endphp
                                    @break
                                @case(8)
                                    @php $rango = "Diamante" @endphp
                                    @break
                                @case(9)
                                    @php $rango = "Diamante Real" @endphp
                                    @break
                            @endswitch
                        </div>
                        <h4 class="text-center">{{ $abiInfo[0]->AssociateName}}</h4>
                    </div>                 
                </div>
            </div>
            <div class="widget-content widget-content-area pl-3 pr-3">
                <div class="row">
                    <div class="form-group col-md-12 ">
                        <img src="{{asset('retos/img/ser_pro.png')}}" width="100%">
                    </div>
                    <div class="col-md-12">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="form-control-rounded-left input-group-text" id="inputGroup-sizing-sm">Código:</span>
                            </div>
                            <input type="text" class="form-control-rounded-right form-control" aria-label="Small" id="abiGralCode" value="{{ $associateid }}" aria-describedby="inputGroup-sizing-sm" readonly>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="form-control-rounded-left input-group-text" id="inputGroup-sizing-sm">Rango:</span>
                            </div>
                            <input type="text" class="form-control-rounded-right form-control" aria-label="Small" value="{{ $curRank }}" aria-describedby="inputGroup-sizing-sm" readonly>
                        </div>
                    </div>
                    @foreach($total as $n)
                        <?php $countOro = $n->Oro; $countPlata = $n->Plata;?>
                        <div class="col-md-6">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="form-control-rounded-left input-group-text" id="inputGroup-sizing-sm">Total Plata:</span>
                                </div>
                                <input type="text" class="form-control-rounded-right form-control" aria-label="Small" value="{{ $n->Plata }}" aria-describedby="inputGroup-sizing-sm" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="form-control-rounded-left input-group-text" id="inputGroup-sizing-sm">Total Oro:</span>
                                </div>
                                <input type="text" class="form-control-rounded-right form-control" aria-label="Small" value="{{ $n->Oro }}" aria-describedby="inputGroup-sizing-sm" readonly>
                            </div>
                        </div>
                    @endforeach
                    
                    <div class="col-md-12 text-center">
                        @php
                            $countOro = 0;
                            $countPlata=0;
                            $prOro = 0;
                            $prPlata=0;
                            $prOro1 = 0;
                            $msg = false;
                        @endphp
                        @foreach($total as $n)
                            <?php $countOro = $n->Oro; $countPlata = $n->Plata;?>
                            <button type="button" class="btn btn-gradient-primary btn-rounded  mb-4 mr-2" data-toggle="modal" data-target=".bd-example-modal-lg-G">
                                Ver grafica de avances
                                <i class="flaticon-view ml-1" style="font-size: 15px"></i>
                            </button>
                            <div class="modal fade bd-example-modal-lg bd-example-modal-lg-G" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header graph text-center">
                                            <center>
                                                <h5 id="myExtraLargeModalLabel">Avances de Rango 2019</h5>
                                            </center>
                                            <button type="button" class="close" style="color: #ffffff;" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body graph-body">
                                            <div class="row">
                                                @php
                                                    $message = "";
                                                    $msg = false;
                                                    if($msg == false){
                                                        if($countOro >= 4){
                                                            $prOro1 = 100;
                                                            $metodo = 1;
                                                            $type = "success";
                                                            $message = "Felicidades has ganado el reto";
                                                        }else{
                                                            $prOro1 = ($countOro / 4) * 100;
                                                            $message =  $message ."Opción 1: Te hacen falta ".(4-$countOro)." rango oro ";
                                                            $message =  $message . "para completar el reto";
                                                            $type = "warning";
                                                        }
                                                    }

                                                    if($msg == false){
                                                        $message =  $message ." u ";
                                                    }

                                                    if($countPlata >= 5){
                                                        if($countOro >= 2){
                                                            $type = "success";
                                                            $message = "Felicidades has alcanzado el reto";
                                                            $prPlata = 100;
                                                            $prOro = 100;
                                                            $metodo = 1;
                                                        }
                                                        else{
                                                            $metodo = 1;
                                                            $prOro = ($countOro/2)* 100;
                                                            $message = $message . "Opción 2: Te hacen falta ".(2-$countOro)." rango oro ";
                                                            $message =  $message . "para completar el reto";
                                                            $type = "warning";
                                                        }
                                                    }
                                                    else{
                                                        $metodo = 1;
                                                        $prPlata = ($countPlata/5)* 100;
                                                        $message = $message . "Opción 2: Te hacen falta ".(5-$countPlata)." rango plata " ;
                                                        $message = $message . "y ".(2-$countOro)." rango oro ";
                                                        $message =  $message . "para completar el reto";
                                                        $type = "warning";
                                                    }
                                                    echo "
                                                        <script>
                                                            function alerta(message, type){
                                                                swal({
                                                                    title: '',
                                                                    text:  message ,
                                                                    type: type,
                                                                    padding: '2em'
                                                                })
                                                            }
                                                            alerta('$message', '$type');
                                                        </script>
                                                    ";
                                                @endphp
                                                <div class="col-lg-6 pt-4">
                                                    <img src="{{asset('retos/img/plata_lg.png')}}" width="25%">
                                                    <br><br>
                                                    @php
                                                        echo "<h3 style='margin-right: 1%;'>".$prPlata."% PLATA | TOTAL: " . $countPlata . "</h3>";
                                                    @endphp
                                                </div>
                                                <div class="col-lg-6 pt-4">
                                                    <img src="{{asset('retos/img/oro_lg.png')}}" width="25%">
                                                    <br><br>
                                                    @php
                                                        if($prOro > $prOro1 ){
                                                            echo "<h3 style='margin-right: 1%;'>".$prOro."% ORO | TOTAL: " . $countOro . "</h3>";
                                                        }
                                                        else{
                                                            echo "<h3 style='margin-right: 1%;'>".$prOro1."% ORO | TOTAL: " . $countOro . "</h3>";
                                                        }
                                                    @endphp 
                                                    <br>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="row cuat">
                                                        <div class="col-lg-4">
                                                            <a href="javascript:void(0)" onclick="showTrimestre1()">
                                                                <h5 class="cuatrimestres 41">1er Cuatrimestre</h5>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <a href="javascript:void(0)" onclick="showTrimestre2()">
                                                                <h5 class="cuatrimestres 42">2do Cuatrimestre</h5>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <a href="javascript:void(0)" onclick="showTrimestre3()">
                                                                <h5 class="cuatrimestres 43">3er Cuatrimestre</h5>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-center" id="trimestre1">
                                                    <div class="table-responsive">
                                                        <table class="table mb-4" id="tbCuatrimestre">
                                                            <thead>
                                                                <tr>
                                                                    <th style="color:white">ID. Asesor</th>
                                                                    <th style="color:white" class="mes1">Enero</th>
                                                                    <th style="color:white" class="mes2">Febrero</th>
                                                                    <th style="color:white" class="mes3">Marzo</th>
                                                                    <th style="color:white" class="mes4">Abril</th>
                                                                    <th style="color:white" class="mes5">Mayo</th>
                                                                    <th style="color:white" class="mes6">Junio</th>
                                                                    <th style="color:white" class="mes7">Julio</th>
                                                                    <th style="color:white" class="mes8">Agosto</th>
                                                                    <th style="color:white" class="mes9">Septiembre</th>
                                                                    <th style="color:white" class="mes10">Octubre</th>
                                                                    <th style="color:white" class="mes11">Noviembre</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($detail as $reg)
                                                                    <tr>
                                                                        <td class="">
                                                                            <div class="d-flex">
                                                                                <div class="usr-img-frame mr-2 rounded-circle">
                                                                                    <img alt="admin-profile" class="img-fluid rounded-circle" src="https://icon-library.net/images/free-avatar-icon/free-avatar-icon-10.jpg">
                                                                                </div>
                                                                                <p class="align-self-center mb-0">{{$reg->Associateid}}</p>
                                                                            </div>
                                                                        </td>
                                                                        <?php  
                                                                            $color="";

                                                                            for ($i = 1; $i < 12; $i++) {
                                                                                $m = "";

                                                                                if(strlen($i) == 1){
                                                                                    $m = 0 . $i;
                                                                                }

                                                                                if($reg->FechaPlata >= 0){
                                                                                    if($reg->FechaPlata == "2019-".$m."-28" || $reg->FechaPlata == "2019-".$m."-30" || $reg->FechaPlata == "2019-".$m."-31"){
                                                                                        $color ="plata";
                                                                                    }
                                                                                }

                                                                                if($reg->FechaOro >= 0){ 
                                                                                    if($reg->FechaOro == "2019-".$m."-28" || $reg->FechaOro == "2019-".$m."-30" || $reg->FechaOro == "2019-".$m."-31"){
                                                                                        $color ="oro";
                                                                                    }
                                                                                }

                                                                                if($color == "plata"){
                                                                                    echo "<td class='mes" . $i ."'><img src='http://services.nikken.com.mx/retos/img/plata.png'></td>";
                                                                                }

                                                                                if($color == "oro"){
                                                                                    echo "<td class='mes" . $i ."'><img src='http://services.nikken.com.mx/retos/img/oro.png'></td>";
                                                                                }

                                                                                if($color == ""){
                                                                                    echo "<td class='mes" . $i ."'> - </td>";
                                                                                }
                                                                            }
                                                                        ?>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-center" id="trimestre2">
                                                    <div class="table-responsive" id="tbCuatrimestre">
                                                        <table class="table mb-4">
                                                            <thead>
                                                                <tr>
                                                                    <th style="color:white">ID. Asesor</th>
                                                                    <th style="color:white" class="mes1">Enero</th>
                                                                    <th style="color:white" class="mes2">Febrero</th>
                                                                    <th style="color:white" class="mes3">Marzo</th>
                                                                    <th style="color:white" class="mes4">Abril</th>
                                                                    <th style="color:white" class="mes5">Mayo</th>
                                                                    <th style="color:white" class="mes6">Junio</th>
                                                                    <th style="color:white" class="mes7">Julio</th>
                                                                    <th style="color:white" class="mes8">Agosto</th>
                                                                    <th style="color:white" class="mes9">Septiembre</th>
                                                                    <th style="color:white" class="mes10">Octubre</th>
                                                                    <th style="color:white" class="mes11">Noviembre</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($detail as $reg)
                                                                    <tr>
                                                                        <td class="">
                                                                            <div class="d-flex">
                                                                                <div class="usr-img-frame mr-2 rounded-circle">
                                                                                    <img alt="admin-profile" class="img-fluid rounded-circle" src="https://icon-library.net/images/free-avatar-icon/free-avatar-icon-10.jpg">
                                                                                </div>
                                                                                <p class="align-self-center mb-0">{{$reg->Associateid}}</p>
                                                                            </div>
                                                                        </td>
                                                                        <?php
                                                                            $color="";
                                                                            for ($i = 1; $i < 12; $i++) {
                                                                                $m = "";

                                                                                if(strlen($i) ==1){
                                                                                    $m = 0 . $i;
                                                                                }

                                                                                if($reg->FechaPlata >= 0){
                                                                                    if($reg->FechaPlata >= 0){
                                                                                        if($reg->FechaPlata == "2019-".$m."-28" || $reg->FechaPlata == "2019-".$m."-30" || $reg->FechaPlata == "2019-".$m."-31"){
                                                                                            $color ="plata";
                                                                                        }
                                                                                    }
                                                                                }

                                                                                if($reg->FechaOro >= 0){
                                                                                    if($reg->FechaOro == "2019-".$m."-28" || $reg->FechaOro == "2019-".$m."-30" || $reg->FechaOro == "2019-".$m."-31"){
                                                                                        $color ="oro";
                                                                                    }
                                                                                }

                                                                                if($color =="plata"){
                                                                                    echo "<td class='mes" . $i ."'><img src='http://services.nikken.com.mx/retos/img/plata.png'></td>";
                                                                                }if($color=="oro"){
                                                                                    echo "<td class='mes" . $i ."'><img src='http://services.nikken.com.mx/retos/img/oro.png'></td>";
                                                                                }if($color==""){
                                                                                    echo "<td class='mes" . $i ."'> - </td>";
                                                                                }
                                                                            }
                                                                        ?>
                                                                        
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-center" id="trimestre3">
                                                    <div class="table-responsive" id="tbCuatrimestre">
                                                        <table class="table mb-4">
                                                            <thead>
                                                                <tr>
                                                                    <th style="color:white">ID. Asesor</th>
                                                                    <th style="color:white" class="mes1">Enero</th>
                                                                    <th style="color:white" class="mes2">Febrero</th>
                                                                    <th style="color:white" class="mes3">Marzo</th>
                                                                    <th style="color:white" class="mes4">Abril</th>
                                                                    <th style="color:white" class="mes5">Mayo</th>
                                                                    <th style="color:white" class="mes6">Junio</th>
                                                                    <th style="color:white" class="mes7">Julio</th>
                                                                    <th style="color:white" class="mes8">Agosto</th>
                                                                    <th style="color:white" class="mes9">Septiembre</th>
                                                                    <th style="color:white" class="mes10">Octubre</th>
                                                                    <th style="color:white" class="mes11">Noviembre</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($detail as $reg)
                                                                    <tr>
                                                                        <td class="">
                                                                            <div class="d-flex">
                                                                                <div class="usr-img-frame mr-2 rounded-circle">
                                                                                    <img alt="admin-profile" class="img-fluid rounded-circle" src="https://icon-library.net/images/free-avatar-icon/free-avatar-icon-10.jpg">
                                                                                </div>
                                                                                <p class="align-self-center mb-0">{{$reg->Associateid}}</p>
                                                                            </div>
                                                                        </td>
                                                                        <?php
                                                                            $color="";
                                                                            for ($i = 1; $i < 12; $i++) {
                                                                                $m = "";
                                                                                if(strlen($i) ==1){
                                                                                    $m = 0 . $i;
                                                                                }
                                                                                if($reg->FechaPlata >= 0){
                                                                                    if($reg->FechaPlata == "2019-".$m."-28" || $reg->FechaPlata == "2019-".$m."-30" || $reg->FechaPlata == "2019-".$m."-31"){
                                                                                        $color ="plata";
                                                                                    }
                                                                                }

                                                                                if($reg->FechaOro >= 0){
                                                                                    if($reg->FechaOro == "2019-".$m."-28" || $reg->FechaOro == "2019-".$m."-30" || $reg->FechaOro == "2019-".$m."-31"){
                                                                                        $color ="oro";
                                                                                    }
                                                                                }
                                                                                
                                                                                if($color =="plata"){
                                                                                    echo "<td class='mes" . $i ."'><img src='http://services.nikken.com.mx/retos/img/plata.png'></td>";
                                                                                }if($color=="oro"){
                                                                                    echo "<td class='mes" . $i ."'><img src='http://services.nikken.com.mx/retos/img/oro.png'></td>";
                                                                                }if($color==""){
                                                                                    echo "<td class='mes" . $i ."'> - </td>";
                                                                                }
                                                                            }
                                                                        ?>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-10 col-md-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                    @if ($accesToRegist == "si")
                        <h4>Registrate al Reto Ser Pro</h4>
                    @elseif($accesToRegist == "registrado")
                        <h4>Ya registrado a Reto Ser Pro</h4>
                    @else
                        <h4>Ya eres mayor a rango plata</h4>
                    @endif
                </div>
            </div>
            <div class="widget-content widget-content-area">
                @if ($accesToRegist == "si")
                    <div class="col-md-12">
                        <form method="POST" id="registClub" enctype="multipart/form-data">
                            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="form-control-rounded-left input-group-text" id="inputGroup-sizing-sm">Código:</span>
                                </div>
                                <input type="text" name="abiCode" id="abiCode" class="form-control-rounded-right form-control" aria-label="Small" value="{{ $associateid }}" aria-describedby="inputGroup-sizing-sm" readonly>
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="form-control-rounded-left input-group-text" id="inputGroup-sizing-sm">Fecha de registro:</span>
                                </div>
                                <input type="text" name="dateReg" id="dateReg" class="form-control-rounded-right form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required readonly value="{{ Date('Y-m-d') }}">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="form-control-rounded-left input-group-text" id="inputGroup-sizing-sm">Nombre:</span>
                                </div>
                                <input type="text" name="dateReg" id="dateReg" class="form-control-rounded-right form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required readonly value="{{ trim($abiInfo[0]->AssociateName, " ") }}">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="form-control-rounded-left input-group-text" id="inputGroup-sizing-sm">Rango:</span>
                                </div>
                                <input type="text" name="rank" id="rank" class="form-control-rounded-right form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required readonly value="{{ $curRank }}">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="form-control-rounded-left input-group-text" id="inputGroup-sizing-sm">Sponsor:</span>
                                </div>
                                <select class="form-control form-control-rounded-right form-control-sm selectpicker js-example-basic-single" id="sponsor" name="sponsor">
                                    <option selected disabled value="">Seleccione...</option>
                                </select>
                            </div>
                            <div class="input-group input-group-sm mb-2">
                                <button type="button" class="btn btn-gradient-warning btn-rounded submitRegist" onclick="submitReg()">
                                    Registrar
                                    <i class="flaticon-send ml-1"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                @elseif($accesToRegist == "registrado")
                    <div class="row">
                        <div class="col-md-3 col-sm-4"></div>
                        <div class="col-md-6 col-sm-4 text-center">
                            <img src="{{ asset('retos/img/registred.svg') }}" width="100%">
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-3 col-sm-4"></div>
                        <div class="col-md-6 col-sm-4 text-center">
                            <img src="{{ asset('retos/img/info.png') }}" width="100%">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

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
@endforeach

<div class="row layout-spacing">
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <div class="table-responsive mb-4">
                    <table id="zero-config" class="table table-striped table-hover table-bordered sticky-thead" style="width:100%">
                        <thead>
                            <tr>
                                <th style="color: gray">Id Asociado</th>
                                <th style="color: gray">Nombre</th>
                                <th style="color: gray" class="hide">Email</th>
                                <th style="color: gray" class="hide">Teléfono</th>
                                <th style="color: gray">País</th>
                                <th style="color: gray">Plata</th>
                                <th style="color: gray">Oro</th>
                                <th style="color: gray">Rango Alcanzado</th>
                                <th style="color: gray">Fecha Avance</th>
                                <th style="color: gray">Fecha Registro Estrategia</th>
                                <th style="color: gray">Profundidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detail as $reg)
                                <tr role="row">
                                    <td>{{$reg->Associateid}}</td>
                                    <td>{{$reg->Nombre}}</td>
                                    <td class="hide">{{$reg->Email}}</td>
                                    <td class="hide">{{$reg->Telefono}}</td>
                                    <td class="text-center">
                                        @switch($reg->Pais)
                                            @case('LAT')
                                                @php $pais = "México"; $bandera = "mexico.png"; @endphp
                                                @break
                                            @case('COL')
                                                @php $pais = "Colombia"; $bandera = "colombia.png"; @endphp
                                                @break
                                            @case('CRI')
                                                @php $pais = "Costa Rica"; $bandera = "costarica.png"; @endphp
                                                @break
                                            @case('PAN')
                                                @php $pais = "Panamá"; $bandera = "panama.png"; @endphp
                                                @break
                                            @case('ECU')
                                                @php $pais = "Ecuador"; $bandera = "ecuador.png"; @endphp
                                                @break
                                            @case('PER')
                                                @php $pais = "Perú"; $bandera = "peru.png"; @endphp
                                                @break
                                            @case('SLV')
                                                @php $pais = "El Salvador"; $bandera = "salvador.png"; @endphp
                                                @break
                                            @case('GTM')
                                                @php $pais = "Guatemala"; $bandera = "guatemala.png"; @endphp
                                                @break
                                        @endswitch
                                        <img src="{{asset("retos/img/$bandera")}}" width="20px"><br>
                                        {{ $pais }}
                                    </td>
                                    <td class="text-center">
                                        @if($reg->plata > 0)
                                            <span class="flaticon-fill-tick" style="font-size: 20px"></span>
                                            <span class="hide">Cumple</span>
                                        @else
                                            <span class="flaticon-close-fill" style="font-size: 20px"></span>
                                            <span class="hide">No Cumple</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($reg->Oro > 0)
                                            <span class="flaticon-fill-tick" style="font-size: 20px"></span>
                                            <span class="hide">Cumple</span>
                                        @else
                                            <span class="flaticon-close-fill" style="font-size: 20px"></span>
                                            <span class="hide">No Cumple</span>
                                        @endif
                                    </td>
                                    <td> 
                                        <?php 
                                            if ( $reg->Rango_Alcanzado == "1"){
                                                echo "DIR"; 
                                            }if ( $reg->Rango_Alcanzado == "2"){
                                                echo "SUP"; 
                                            }if ( $reg->Rango_Alcanzado == "3"){
                                                echo "EXE"; 
                                            }if ( $reg->Rango_Alcanzado == "4"){
                                                echo "BRC"; 
                                            }if ( $reg->Rango_Alcanzado == "5"){
                                                echo "PLA"; 
                                            }if ( $reg->Rango_Alcanzado == "6"){
                                                echo "ORO"; 
                                            }if ( $reg->Rango_Alcanzado == "7"){
                                                echo "PLO"; 
                                            }if ( $reg->Rango_Alcanzado == "8"){
                                                echo "DIA"; 
                                            }if ( $reg->Rango_Alcanzado == "9"){
                                                echo "DRL"; 
                                            }
                                        ?>
                                    </td>
                                    <td>{{$reg->FechaAvance}}</td>
                                    <td>{{$reg->Fecha_RegistroEstrategia}}</td>
                                    <td>{{$reg->Profundidad}}</td>
                                </tr>
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

@if ($staff == 'Y')
    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                            <h3>Ganadores del reto SER PRO </h3>
                        </div>                 
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4">
                        <table id="detail1" class="table table-bordered table-hover" style="font-size:11px;">
                            <thead>
                                <tr>
                                    <th style="color: gray">Sponsor</th>
                                    <th style="color: gray">Plata</th>
                                    <th style="color: gray">Oro</th>
                                    <th style="color: gray">Nombre</th>
                                    <th style="color: gray">Email</th>
                                    <th style="color: gray">Rango</th>
                                    <th style="color: gray">País</th>
                                </tr>
                            </thead>
                            @if(!count($winners))
                            <tbody>
                                <tr role="row" class="odd" style="color:black;">
                                    <td colspan="7" class="center_text"> No se encontraron Resultados</td>
                                </tr>
                            </tbody>
                            @endif
                            <tbody>
                                @foreach($winners as $win)
                                    @php
                                        $pais = "";
                                        $bandera = "";
                                        $nombre = "";
                                    @endphp
                                    <?php $pais_ = str_replace(' ', '', $win->Pais); ?>
                                    <?php $nombre = str_replace('"', '', $win->Nombre); ?>
                                    @switch($pais_)
                                        @case('LAT')
                                            @php $pais = 'México' @endphp
                                            @php $bandera = 'mexico.png' @endphp
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
                                
                                    <tr role="row" class="even" style="color:black;">
                                        <td>{{ $win->Sponsor }}</td>
                                        <td>{{ $win->Plata }}</td>
                                        <td>{{ $win->Oro }}</td>
                                        <td>{{ strtoupper($nombre) }}</td>
                                        <td>{{ $win->Email }}</td>
                                        <td> 
                                            <?php 
                                                if ( $win->Rango == "1"){
                                                    echo "DIR"; 
                                                }if ( $win->Rango == "2"){
                                                    echo "SUP"; 
                                                }if ( $win->Rango == "3"){
                                                    echo "EXE"; 
                                                }if ( $win->Rango == "4"){
                                                    echo "BRC"; 
                                                }if ( $win->Rango == "5"){
                                                    echo "PLA"; 
                                                }if ( $win->Rango == "6"){
                                                    echo "ORO"; 
                                                }if ( $win->Rango == "7"){
                                                    echo "PLO"; 
                                                }if ( $win->Rango == "8"){
                                                    echo "DIA"; 
                                                }if ( $win->Rango == "9"){
                                                    echo "DRL"; 
                                                }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <img src="{{asset("retos/img/$bandera")}}" width="15px">
                                            {{ $pais }}
                                        </td>
                                    </tr>
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
@endif

@endsection

@section('scripts')
<script src="{{ asset('retos/main.js') }}"></script>
@endsection