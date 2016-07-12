@extends('layouts.general')

@section('title','Diagnostico')

@section('styles')
    <style>
        .sintoma{
            margin: 1.4em 0;
            height: 165px;
        }
        .img-thumbnail {
            width: 100px;
            height: 100px;
        }
        .botones{
            margin-top:200px;
        }
        .image
        {
            width: 250px;
            height: 200px;
        }
    </style>
    <link rel="stylesheet" href="{{asset('assets/css/sweetalert2.min.css')}}">
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Listado de Síntomas</h4>
                        </div>
                        <div class="content">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input type="text" id="search" value="" class="form-control" placeholder="Search...">
                            </div>
                            <div id="noAsignados" class="panel-body">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="botones col-md-2">
                    <button type="button" class="btn btn-wd btn-default btn-fill btn-move-left" onclick="asignar();">Mover
                        <span class="btn-label"><i class="ti-angle-right"></i></span></button>
                    <button type="button" class="btn btn-wd btn-default btn-fill btn-move-right" onclick="devolver();">
                        <span class="btn-label"><i class="ti-angle-left"></i></span>  Remover</button>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Sintomas Agregados</h4>
                        </div>
                        <div class="content">
                            <div id="asignados" class="panel-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Enfermedad(es)</h4>
                        </div>
                        <div id="enfermedades" class="panel-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modalDetalles" class="modal fade in">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" ><span id="name_disease"></span></h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                            <textarea name="description_disease" id="description_disease" class="form-control" rows="4"  readonly></textarea><br><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-4 col-md-4" id="image_disease">

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="text-center">
                        <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-menu-up"></span> Salir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modalTratamiento" class="modal fade in">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><span id="name_disease_treatment"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                            <iframe width="700" id="iframe" height="250" src="" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="row text-center">
                        <h5>Prescripción médica</h5>
                    </div>
                    <div class="row" id="medicamentos">
                        <div class="col-md-offset-1 col-md-10">
                            <p>Medicamento 1</p>
                            <p>Medicamento 2</p>
                            <p>Medicamento 3</p>
                            <p>Medicamento 4</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="text-center">
                        <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-menu-up"></span> Salir</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('diagnosis/js/index.js') }}"></script>
@endsection