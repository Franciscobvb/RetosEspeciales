@extends('kaizentaishi.layout')

@section('titulo')
    Nikken | {{ $NombreReto }}
@endsection

@section('styles')

@endsection

@section('reto')
    {{ $NombreReto }}
@endsection

@section('kaizen')
<div class="row layout-spacing">
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">

                </div>
            </div>
            <div class="widget-content widget-content-area text-center">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group col-md-12 text text-center">
                                <a href="javascript:void(0)">
                                    <img src="{{asset('retos/img/' . $info)}}" width="75%" data-toggle="modal" data-target=".bd-example-modal-lg-img">
                                </a>
                                <div class="modal fade bd-example-modal-lg bd-example-modal-lg-img" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header graph text-center" style="background-color: red;">
                                                <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body graph-body" style="background-color: #ffffff;">
                                                <div class="row">
                                                    <div class="col-lg-12 text-center">
                                                        <img src="{{asset('retos/img/' . $info)}}" width="100%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group col-md-12">
                            <img src="{{asset('retos/img/alert.png')}}" width="15%">
                            <b>
                                <h2>
                                    {{ $mensaje }}
                                </h2>
                            </b>
                            <button class="btn btn-gradient-warning btn-rounded mb-4 mr-2" onclick="window.history.back();">Regresar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection