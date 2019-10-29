<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Ser Pro </title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('css/pages/helpdesk.css')}}" rel="stylesheet" type="text/css" />
     <!-- BEGIN PAGE LEVEL STYLES -->
     <link href="{{asset('plugins/popup/magnific-popup.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/popup/style.css')}}" rel="stylesheet" type="text/css" />

</head>
<body>
    <!-- Tab Mobile View Header -->
    <header class="tabMobileView header navbar fixed-top d-lg-none">
        <div class="nav-toggle">
                <a href="javascript:void(0);" class="nav-link sidebarCollapse" data-placement="bottom">
                    <i class="flaticon-menu-line-2"></i>
                </a>
            <a href="" class=""> <img src="{{asset('img/icons/logo_nikken_white.png')}}" class="img-fluid" alt="logo"></a>
        </div>
        <ul class="nav navbar-nav">
            <li class="nav-item d-lg-none"> 
                <form class="form-inline justify-content-end" role="search">
                    <input type="text" class="form-control search-form-control mr-3">
                </form>
            </li>
        </ul>
    </header>
    <!-- Tab Mobile View Header -->

    <!--  BEGIN NAVBAR  -->
    <header class="header navbar fixed-top navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse d-none d-lg-block" data-placement="bottom"><i class="flaticon-menu-line-2"></i></a>
        
       
    </header>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        

        <!--  BEGIN SIDEBAR  -->

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
                    <a href="http://services.nikken.com.mx/kiai/{{$code}}">
                            <div class="">
                                <i class="flaticon-bar-chart-2" style="color: white !important;"> </i>
                                <span style="color: white !important;">Reto Kiai</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="http://services.nikken.com.mx/serpro/{{$code}}-{{$staff}}">
                            <div class="">
                                <i class="flaticon-bar-chart-2" style="color: white !important;"></i>
                                <span style="color: white !important;">Reto Ser Pro</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="http://services.nikken.com.mx/kaizen/{{$code}}">
                            <div class="">
                                <i class="flaticon-bar-chart-2" style="color: white !important;"></i>
                                <span style="color: white !important;">Reto Kaizen</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="http://services.nikken.com.mx/taishi/{{$code}}" >
                            <div class="">
                                <i class="flaticon-bar-chart-2" style="color: white !important;"></i>
                                <span  style="color: white !important;">Reto Taishi</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>

        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT PART  -->
      <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="card mb-3" style="max-width: 954px;margin-left: 3%;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{asset('img/pro.jpg')}}" style="margin-top: 13%;margin-left: 7%;width: 93%;" class="card-img"/>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body" style="margin-left:10%;">
                                    @foreach($name as $n)
                                        <h5 class="card-title"><b>{{$n->Nombre}}</b></h5>
                                        <p class="card-text">{{$n->Sponsor}}</p>
                                        <?php 
                                            if ( $n->Rango == "1"){
                                                echo "<p class='card-text'>Directo</p>"; 
                                            }if (  $n->Rango == "2" ){
                                                echo "<p class='card-text'>Superio</p>"; 
                                            }if (  $n->Rango == "3"){
                                                echo "<p class='card-text'>Ejecutivo</p>"; 
                                            }if (  $n->Rango == "4"){
                                                echo "<p class='card-text'>Bronce</p>"; 
                                            }if (  $n->Rango == "5"){ 
                                                echo "<p class='card-text'>Plata</p>"; 
                                            }if (  $n->Rango == "6"){
                                                echo "<p class='card-text'>Oro</p>"; 
                                            }if (  $n->Rango == "7"){
                                                echo "<p class='card-text'>Platino</p>"; 
                                            }if (  $n->Rango == "8"){
                                                echo "<p class='card-text'>Diamante</p>"; 
                                            }if (  $n->Rango == "9"){
                                                echo "<p class='card-text'>Diamante Real</p>"; 
                                            }
                                        ?>
                                        <p class="card-text">{{$n->Email}}</p>
                                        <p class="card-text">
                                            <?php $pais = str_replace(' ', '', $n->Pais);?>
                                            <img style="width:7%;    margin-right: 3%;" src= "https://services.nikken.com.mx/img/country/{{$pais}}.png"/>{{$n->Pais}}
                                        </p>
                                        
                                    @endforeach
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="container">
                    <div class="card-body">
                        <div class="row"> 
                            <div class="col-lg-12">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-content widget-content-area">                  
                                        <div class="helpdesk layout-spacing">
                                            <div class="crumbs">
                                                <ul id="breadcrumbs" class="breadcrumb">
                                                    <?php $countOro = 0; $countPlata=0; 
                                                        $prOro = 0; $prPlata=0; 
                                                        $prOro1 = 0; 
                                                        $msg = false; ?>
                                                    @foreach($total as $n)
                                                        <?php $countOro = $n->Oro; $countPlata = $n->Plata;?>
                                                        <h3 style="color: black;font-style: oblique;" >Total Plata  - <b>{{$n->Plata}}</b>      Total Oro - <b>{{$n->Oro}}</b></h3>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div id="msgAlert" style="background-color: #7dc6ecc2;padding: 16px;color: white;border: 1px solid;border-color: blue;font-size: 14px;">
                                                <p>
                                                    <img src= "https://services.nikken.com.mx/img/icons/info.png" style="width:30px;" />
                                                    <?php 
                                                        $message = "";
                                                        if($countPlata >= 5){
                                                            if($countOro >=2){
                                                                $msg = true;
                                                                $message = "Felicidades has alcanzado el reto";
                                                                $prPlata = 100;
                                                                $prOro = 100;
                                                                $metodo = 1;
                                                            }else{
                                                                $metodo = 1;
                                                                $prOro = ($countOro/2)* 100;
                                                                $message = "Te hacen falta ".(2-$countOro)." Rango oro ";
                                                            }
                                                        }else{
                                                            $metodo = 1;
                                                            $prPlata = ($countPlata/5)* 100;
                                                            $message = "Te hacen falta ".(5-$countPlata)." Rango plata " ;
                                                        }
                                                        if($msg == false){
                                                            $message =  $message ." ó ";
                                                        }
                                                        if($msg == false){
                                                            if($countOro >= 4){
                                                                $prOro1 = 100;
                                                                $metodo = 1;
                                                                $message = "Felicidades has ganado el reto";
                                                            }else{
                                                                $prOro1 = ($countOro / 4) * 100;
                                                                $message =  $message ."Te hacen falta ".(4-$countOro)." Rango oro ";
                                                                $message =  $message . "para completar el reto";
                                                            }
                                                        
                                                        }

                                                        echo $message;
                                                    ?>
                                                
                                                </p>
                                            </div>
                                            <div>
                                                <div style="margin-left: 75%;margin-top: -7%;">
                                                    <a class="btn btn-success ml-2 mb-4 mt-2  popup-with-form" href="#test-form1">Ver grafica de avances</a>
                                                </div>
                                                <!-- form itself -->
                                                <form id="test-form1" class="white-popup-block mfp-hide">
                                                    <h2>Avances de Rango 2019</h2>
                                                    <p><a class="popup-modal-dismiss" style="text-decoration:underline;margin-left: 94%;" href="#">Cerrar</a></p>
                                                    <div class="form-row mb-12" style="overflow-x: auto;overflow-y: auto;">
                                                    <div class="widget-content widget-content-area" style="width:100%">
                                                        <table style="width: 83%;border-collapse: separate;border-spacing: 32px 2px;">
                                                            <tr>
                                                                <td><p style="font-weight: bolder;color: black;">Rango Plata</p></td>
                                                                <td style="width:20%;padding: 15px 7%;background-image: linear-gradient(#004dfff2, #00ffd08c); font-weight: bolder;color: black;"><?php echo "<h2 style='margin-right: 1%;'>".$prPlata."%</h2>"; ?></td>
                                                                
                                                                <td><p style="font-weight: bolder;color: black;">Rango Oro</p></td>
                                                                <td style="width:20%;padding: 15px 7%;background-image: linear-gradient(#fffc00f2, #ffd4008c);     font-weight: bolder;color: black;">
                                                                    <?php if($prOro > $prOro1 ){echo "<h2 style='margin-right: 1%;'>".$prOro."%</h2>";}else{echo "<h2 style='margin-right: 1%;'>".$prOro1."%</h2>";}  ?>
                                                                </td>
                                       
                                                                <td><p style="font-weight: bolder;color: black;">Sin Avance</p></td>
                                                                <td style="width:20%;padding: 15px 7%;background-image: linear-gradient(#bfbfbff2, #cacaca8c);"></td>
                                                                <td colspan ="2"> <p style="font-weight: bolder;color: black;">Total Plata  - <b>{{$n->Plata}}</b>      Total Oro - <b>{{$n->Oro}}</b></a></p> </td>
                                                            <tr>
                                                            
                                                        </table>
                                                        <div class="table-responsive mb-4">
                                                        <table style="width:100%;border-collapse: separate;border-spacing: 0px 10px;">
                                                            <tr>
                                                                <td></td>
                                                                <td><b>Enero</b></td>
                                                                <td><b>Febrero</b></td>
                                                                <td><b>Marzo</b></td>
                                                                <td><b>Abril</b></td>
                                                                <td><b>Mayo</b></td>
                                                                <td><b>Junio</b></td>
                                                                <td><b>Julio</b></td>
                                                                <td><b>Agosto</b></td>
                                                                <td><b>Septiembre</b></td>
                                                            </tr>
                                                            @if(count($query)==0)
                                                                <tr>
                                                                    <td colspan ="10"> No se encontraron resultados</td>
                                                                </tr>
                                                            @endif
                                                            @foreach($query as $reg)
                                                                <tr>
                                                                    <td><b>{{$reg->Associateid}}</b></td>
                                                                    <?php  $color="";
                                                                    for ($i = 1; $i < 10; $i++) {
                                                                        $m = "";
                                                                        if(strlen($i) ==1){
                                                                            $m = 0 . $i;
                                                                        }
                                                                        if($reg->FechaPlata != 0){    
                                                                            if($reg->FechaPlata == "2019-".$m."-01"){
                                                                                $color ="b";
                                                                            }
                                                                        }
                                                                        if($reg->FechaOro != 0){    
                                                                            if($reg->FechaOro == "2019-".$m."-01"){
                                                                                $color ="y";
                                                                            }
                                                                        }
                                                                        if($color =="b"){
                                                                            echo "<td style='padding: 15px 7%;background-image: linear-gradient(#004dfff2, #00ffd08c); cursor:pointer;' data-toggle='tooltip' data-placement='top' title='Plata'></td>";
                                                                        }if($color=="y"){
                                                                            echo "<td style='padding: 15px 7%;background-image: linear-gradient(#fffc00f2, #ffd4008c); cursor:pointer;' data-toggle='tooltip' data-placement='top' title='Oro'></td>";
                                                                        }if($color==""){
                                                                            echo "<td style='padding: 15px 7%;background-image: linear-gradient(#bfbfbff2, #cacaca8c); cursor:pointer;' data-toggle='tooltip' data-placement='top' title='Sin Avance'></td>";
                                                                        }
                                                                    }?>
                                                                    
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="table-responsive mb-4">
                                                <table id="detail" class="table table-bordered table-hover" style="font-size:11px;">
                                                    <thead style="background-color: green;text-align: center;">
                                                        <tr>
                                                            <th style="color:white">Associate Id</th>
                                                            <th style="color:white">Nombre</th>
                                                            <th style="color:white">Email</th>
                                                            <th style="color:white">Telefono</th>
                                                            <th style="color:white">País</th>
                                                            <th style="color:white">Plata</th>
                                                            <th style="color:white">Oro</th>
                                                            <th style="color:white">Rango Alcanzado</th>
                                                            <th style="color:white">Fecha Avance</th>
                                                            <th style="color:white">Fecha Registro Estrategia</th>
                                                            <th style="color:white">Profundidad</th>
                                                        </tr>
                                                    </thead>
                                                    @if(!count($query))
                                                    <tbody>
                                                        <tr role="row" class="odd" style="color:black;">
                                                            <td colspan="11" class="center_text"> No se encontraron Resultados</td>
                                                        </tr>
                                                    </tbody>
                                                    @endif
                                                    <tbody>
                                                        @foreach($query as $reg)
                                                            <tr role="row" class="even" style="color:black;">
                                                                
                                                                <td> 
                                                                    {{$reg->Associateid}}
                                                                </td>
                                                                <td>
                                                                    {{$reg->Nombre}}
                                                                </td>
                                                                <td>
                                                                    {{$reg->Email}}
                                                                </td>
                                                                <td>
                                                                    {{$reg->Telefono}}
                                                                </td>
                                                                <td>
                                                                    <img style="width:85%" src="https://services.nikken.com.mx/img/country/{{$reg->Pais}}.png"/>
                                                                    {{$reg->Pais}}
                                                                </td>
                                                                <td>
                                                                    @if($reg->plata > 0)
                                                                        <img class="image_country_w-95" src= "https://services.nikken.com.mx/img/check.png" style="width:30px;"/>
                                                                        <p style="font-size: 0;">Cumple</p>
                                                                    @else
                                                                        <img class="image_country_w-95" src= "https://services.nikken.com.mx/img/error.png" style="width:30px;"/>
                                                                        <p style="font-size: 0;">No Cumple</p>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($reg->Oro > 0)
                                                                        <img class="image_country_w-95" src= "https://services.nikken.com.mx/img/check.png" style="width:30px;"/>
                                                                        <p style="font-size: 0;">Cumple</p>
                                                                    @else
                                                                        <img class="image_country_w-95" src= "https://services.nikken.com.mx/img/error.png" style="width:30px;"/>
                                                                        <p style="font-size: 0;">No Cumple</p>
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
                                                                <td>
                                                                    {{$reg->FechaAvance}}
                                                                </td>
                                                                <td>
                                                                    {{$reg->Fecha_RegistroEstrategia}}
                                                                </td>
                                                                <td>
                                                                    {{$reg->Profundidad}}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                            @if($staff == 'Y')
                                            <div class="col-md-12 mb-5">
                                                <div class="tab-content mb-5" id="pills-tabContent">
                                                    <div class="tab-pane fade show active" id="pills-statistics" role="tabpanel" aria-labelledby="pills-statistics-tab">
                                                        <div class="accordion" id="hd-statistics">                       
                                                            <div class="card" style="background-image: linear-gradient(135deg, #198d2799 0%, #008000 100%);color: white;cursor: pointer;">
                                                                <div class="card-header" id="hd-statistics-0">
                                                                    <div class="mb-0">
                                                                        <div data-toggle="collapse" data-target="#collapse-hd-statistics-0" aria-expanded="true" aria-controls="collapse-hd-statistics-0">
                                                                            Ganadores del reto SER PRO
                                                                        </diV>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                                        
                                            <div id="collapse-hd-statistics-0" class="collapse hide" aria-labelledby="hd-statistics-0" data-parent="#hd-statistics">
                                                  <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="statbox widget box box-shadow">
                                                                <div class="col-lg-12">
                                                                    <div class="statbox widget box box-shadow">
                                                                        <div class="widget-content widget-content-area">
                                                                            <div class="table-responsive mb-5">
                                                                                <table id="detail1" class="table table-bordered table-hover" style="font-size:11px;">
                                                                                    <thead style="background-color: green;text-align: center;">
                                                                                        <tr>
                                                                                            <th style="color:white">Sponsor</th>
                                                                                            <th style="color:white">Plata</th>
                                                                                            <th style="color:white">Oro</th>
                                                                                            <th style="color:white">Nombre</th>
                                                                                            <th style="color:white">Email</th>
                                                                                            <th style="color:white">Rango</th>
                                                                                            <th style="color:white">Pais</th>
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
                                                                                            <tr role="row" class="even" style="color:black;">
                                                                                                
                                                                                                <td> 
                                                                                                    {{$win->Sponsor}}
                                                                                                </td>
                                                                                                <td>
                                                                                                    {{$win->Plata}}
                                                                                                </td>
                                                                                                <td>
                                                                                                    {{$win->Oro}}
                                                                                                </td>
                                                                                                <td>
                                                                                                    {{$win->Nombre}}
                                                                                                </td>
                                                                                                <td>
                                                                                                    {{$win->Email}}
                                                                                                </td>
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
                                                                                                <td>
                                                                                                    <?php $pais_ = str_replace(' ', '', $win->Pais);?>
                                                                                                    <img style="width:25%" src= "https://services.nikken.com.mx/img/country/{{$pais_}}.png"/>
                                                                                                    {{$win->Pais}}
                                                                                                </td>
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
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </diV>
                                </div>
                            </div>
                        </diV>
                    </div>
                </div>
                
            </div>
        </div>
        <!--  END CONTENT PART  -->

    </div>
    
    <!--  BEGIN FOOTER  -->
    <footer class="footer-section theme-footer">

        <div class="footer-section-1  sidebar-theme">
            
        </div>
    </footer>
    <!--  END FOOTER  -->

    <!--  BEGIN CONTROL SIDEBAR  -->
   
    <!--  END CONTROL SIDEBAR  -->

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
     <script src="{{ asset('assets/NikkenChallengeP/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    
   <script src="{{ asset('assets/NikkenChallengeP/bootstrap/js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('assets/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('plugins/popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('plugins/popup/custom-maginfic-popup.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
      <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{ asset('plugins/charts/sparklines/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
     <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
     <script src="{{ asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/table/datatable/button-ext/jszip.min.js') }}"></script>    
    <script src="{{ asset('plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>

     <script>
        $(document).ready(function() {
            setTimeout(function() {
                $("#msgAlert").fadeOut(1500);
            },6000);
            $('#detail').DataTable( {
                
                dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5 mb-md-0 mb-5"i><"col-md-7"p>>> >',
                buttons: {
                    buttons: [
                        { extend: 'excel', className: 'button_excel' }
                    ]
                },
                "bFilter":false,
                "paginate": true,
                "iDisplayLength": 5
            } );
            $('#detail1').DataTable( {
                
                dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5 mb-md-0 mb-5"i><"col-md-7"p>>> >',
                buttons: {
                    buttons: [
                        { extend: 'excel', className: 'button_excel' }
                    ]
                },
                "bFilter":false,
                "paginate": true,
                "iDisplayLength": 5
            } );
        });
    </script>
    <!-- END GLOBAL MANDATORY STYLES -->    
</body>
</html>