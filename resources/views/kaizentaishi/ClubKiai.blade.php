@extends('kaizentaishi.layout')

@section('reto')
    Club Kiai
@endsection

@section('titulo')
    Nikken | Club Kiai
@endsection

@section('kiai')
    <div class="row layout-spacing">
        <div class="col-lg-12">
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
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                @if($s->Validacion == 'T')
                                    <h4>Trimestre No. {{$s->NoTrimestre}}</h4>
                                @else
                                    <h4>Trimestre No. {{$s->NoTrimestre}}</h4>
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
                                <button type="button" class="btn btn-primary btn-rounded  mb-4 mr-2" data-toggle="modal" data-target=".bd-example-modal-xl-{{$index}}">Ver ganadores de mi red</button>

                                <div class="modal fade bd-example-modal-xl bd-example-modal-xl-{{$index}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myExtraLargeModalLabel">Mis Ganadores Kiai</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive mb-4">
                                                    <table id="alter_pagination{{$index}}" class="table table-bordered table-hover" style="font-size:11px;">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Associate Id</th>
                                                                <th>Sponsor Id</th>
                                                                <th>Nivel</th>
                                                                <th><p style="width: 420px;margin-left: 34%;">Associate Name</p></th>
                                                                <th>País</th>
                                                                <th>Rango</th>
                                                                <th>Telefono</th>
                                                                <th>Email</th>
                                                                <th>Vp</th>
                                                                <th>Vgp</th>
                                                                <th>Vp Acumulado</th>
                                                                <th>Vgp Acumulado</th>
                                                                <th>No. Trimestre</th>
                                                                <th>Kiai Trimestre</th>
                                                                <th>Periodo</th>
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
                                                            @if($gen->NoTrimestre == $s->NoTrimestre)
                                                                <tr role="row" class="even" style="color:black;">
                                                                    <td>{{$gen->associateid}}</td>
                                                                    <td>{{$gen->sponsorid}}</td>
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
                                                                    <td>{{$gen->Pais}}</td>
                                                                    <td>{{$gen->Rango}}
                                                                    </td>
                                                                    <td>{{$gen->Telefono}}
                                                                    </td>
                                                                    <td>{{$gen->Email}}
                                                                    </td>
                                                                    <td>{{number_format($gen->Vp,2)}}
                                                                    </td>
                                                                    <td>{{number_format($gen->VGP,2)}}
                                                                    </td>
                                                                    <td>{{number_format($gen->VpAcumulado,2)}}
                                                                    </td>
                                                                    <td>{{number_format($gen->VGPacumulado,2)}}
                                                                    </td>
                                                                    <td>{{$gen->NoTrimestre}}
                                                                    </td>
                                                                    <td>
                                                                        @if($gen->KiaiTrimestre == 'YES')
                                                                            <img class="image_country_w-95" src= "https://services.nikken.com.mx/img/icons/check.png" style="width:40%;margin-left:40%"/>
                                                                        @else
                                                                            <img class="image_country_w-95" src= "https://services.nikken.com.mx/img/icons/error.png" style="width:40%;margin-left:40%"/>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        {{$gen->Periodo}}
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                        
                                                    </table>
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
                                                    <th class="text-center">Associate Id</th>
                                                    <th>Sponsor Id</th>
                                                    <th>Nivel</th>
                                                    <th>Associate Name</th>
                                                    <th>País</th>
                                                    <th>Rango</th>
                                                    <th>Telefono</th>
                                                    <th>Email</th>
                                                    <th>Vp</th>
                                                    <th>Vgp</th>
                                                    <th>Vp Acumulado</th>
                                                    <th>Vgp Acumulado</th>
                                                    <th>No. Trimestre</th>
                                                    <th>Kiai Trimestre</th>
                                                    <th>Periodo</th>
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
                                                @if($reg->NoTrimestre == $s->NoTrimestre)
                                                
                                                    <tr role="row" class="even" style="color:black;">
                                                        <td>
                                                            {{$reg->Associateid}}
                                                        </td>
                                                        <td> 
                                                            {{$reg->Sponsorid}}
                                                        </td>
                                                        <td>
                                                            {{$reg->Nivel}}
                                                        </td>
                                                        <td>
                                                            {{$reg->AssociateName}}
                                                        </td>
                                                        <td>
                                                            {{$reg->Pais}}
                                                        </td>
                                                        <td>
                                                            {{$reg->Rango}}
                                                        </td>
                                                        <td>
                                                            {{$reg->Telefono}}
                                                        </td>
                                                        <td>
                                                            {{$reg->Email}}
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
                                                        <td>
                                                            {{$reg->NoTrimestre}}
                                                        </td>
                                                        <td class="text-center">
                                                            @if($reg->KiaiTrimestre == 'YES')
                                                                <span class="flaticon-fill-tick" style="font-size: 20px"></span>
                                                            @else
                                                                <span class="flaticon-close-fill" style="font-size: 20px"></span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{$reg->Periodo}}
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <h5>
                                            <span class="flaticon-left-arrow-12"></span>
                                            Desliza para ver tu genealogia
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
                ]
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
