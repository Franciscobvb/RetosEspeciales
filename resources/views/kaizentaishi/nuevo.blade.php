@extends('kaizentaishi.layout')

@section('reto')
    Club Viajeros
@endsection

@section('titulo')
    Nikken | Club Viajeros
@endsection

@section('styles')
    <style>
        #user-profile-card-5.card .card-top-section {
            position: relative;
            background: #fff url('../retos/img/kiai_logo.png') no-repeat center center;
            background-size: auto;
            background-size: cover;
            padding: 90px 40px;
            border-bottom-left-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
        }

        .submitRegist{
            width: 80%;
            margin: auto;
        }

        .blur-bg {
            width: 100%;
            height: 100%;
            position: absolute;
            filter: blur(8px);
            background-image: url("{{ asset('retos/img/inscrito.png') }}");
            background-size: auto;
            background-size: cover;
        }
    </style>
@endsection

@section('retos')
    @php
        $rangos = ['DIR', 'DIRECTO', 'EJECUTIVO', 'PLATA', 'ORO', 'PLATINO', 'DIAMANTE', 'DIAMANTE REAL'];
    @endphp
    <div class="row layout-spacing">
        <div class="col-lg-4 col-md-6 mb-2">
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
        <div class="col-lg-4 col-md-6 mb-2">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                        @foreach($getname as $n)
                            <h4>{{ $n->AssociateName }}</h4>
                        @endforeach
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <img src="{{ asset('retos/img/kiai_logo.png') }}" width="100%">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="form-control-rounded-left input-group-text" id="inputGroup-sizing-sm">Código:</span>
                                </div>
                                <input type="text" class="form-control-rounded-right form-control" aria-label="Small" value="{{ $associateid }}" aria-describedby="inputGroup-sizing-sm" readonly>
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="form-control-rounded-left input-group-text" id="inputGroup-sizing-sm">Rango:&nbsp; </span>
                                </div>
                                <input type="text" class="form-control-rounded-right form-control" aria-label="Small" value="{{ $rangos[6] }}" aria-describedby="inputGroup-sizing-sm" readonly>
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="form-control-rounded-left input-group-text" id="inputGroup-sizing-sm">Código:</span>
                                </div>
                                <input type="text" class="form-control-rounded-right form-control" aria-label="Small" value="{{ $associateid }}" aria-describedby="inputGroup-sizing-sm" readonly>
                            </div>
                            <div class="input-group input-group-sm mb-1">
                                <div class="input-group-prepend">
                                    <span class="form-control-rounded-left input-group-text" id="inputGroup-sizing-sm">Código:</span>
                                </div>
                                <input type="text" class="form-control-rounded-right form-control" aria-label="Small"  aria-describedby="inputGroup-sizing-sm" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                        @if ($registred == true)
                            <h4>Ya registrado a Club Viajeros</h4>
                        @else
                            <h4>Registrate al Club Viajeros</h4>
                        @endif
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    @if ($registred == true)
                    <div class="row">
                        <div class="col-md-3 col-sm-4"></div>
                        <div class="col-md-6 col-sm-4 text-center">
                            <img src="{{ asset('retos/img/registred.svg') }}" width="100%">
                        </div>
                    </div>
                    @else
                        <div class="col-md-12">
                            <form method="POST" id="registClub" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="form-control-rounded-left input-group-text" id="inputGroup-sizing-sm">Código:</span>
                                    </div>
                                    <input type="text" name="abiCode" id="abiCode" class="form-control-rounded-right form-control" aria-label="Small" value="{{ $associateid }}" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="form-control-rounded-left input-group-text" id="inputGroup-sizing-sm">Nombre:</span>
                                    </div>
                                    <input type="text" name="abiName" id="abiName" class="form-control-rounded-right form-control" aria-label="Small" value="{{ trim($getname[0]->AssociateName, " ") }}" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="form-control-rounded-left input-group-text" id="inputGroup-sizing-sm">Sponsor:</span>
                                    </div>
                                    <select class="form-control form-control-rounded-right form-control-sm selectpicker js-example-basic-single">
                                        <option selected disabled>Seleccione...</option>
                                        <option>One</option>
                                        <option>Two</option>
                                        <option>Three</option>
                                    </select>
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="form-control-rounded-left input-group-text" id="inputGroup-sizing-sm">Código:</span>
                                    </div>
                                    <input type="text" class="form-control-rounded-right form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required>
                                </div>
                                <div class="input-group input-group-sm mb-2">
                                    <button class="btn btn-gradient-warning btn-rounded submitRegist">
                                        Registrarme
                                        <i class="flaticon-send ml-1"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <div class="row" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>HTML5 Export</h4>
                        </div>                 
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4">
                        <table id="zero-config" class="table table-striped table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                    <th>Extn.</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < 150; $i++)
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td>5421</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2011/07/25</td>
                                        <td>$170,750</td>
                                        <td>8422</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
