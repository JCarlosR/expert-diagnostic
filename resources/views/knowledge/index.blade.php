@extends('layouts.general')

@section('title','Asignar síntomas')

@section('styles')
    <style>
        .separator
        {
            margin-top: 15px;
        }
        .margen
        {
            margin-top:30px;
        }
        .no-resize
        {
            resize: none;
        }
        .in-input
        {
            border: 1px solid rgba(102, 97, 91, 0.35) !important;
        }
        .inside:focus{
            border: 1px solid #0097cf !important;
        }
        .image
        {
            height: 40px;
            width: 40px;
        }
        .sintoma{
            margin: 1.4em 0;
            height: 180px;
        }
    </style>
    <link rel="stylesheet" href="{{asset('assets/css/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/footable.bootstrap.min.css')}}">
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 separator">
                    <br>
                    <br>
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Listado de enfermedades</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped mytable">
                                <thead>
                                    <tr>
                                        <th> Enfermedad</th>
                                        <th> Acciones </th>
                                    </tr>
                                </thead>
                                <tbody id="tabla">
                                @foreach($diseases as $disease)
                                    <tr>
                                        <td>{{ $disease->name }}</td>
                                        <td>
                                            <a type="button" class="btn btn-danger" href="{{url('asignar/reglas/'.$disease->id)}}">
                                                <i class="fa fa-eye"></i>Agregar regla
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $diseases->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modalAsignarMed" class="modal fade in">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="titulo" class="modal-title">Asignar medicamentos para la enfermedad <label id="diseaseMed"></label></h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" data-diseasemed="" id="enfermedadMed">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Listado de Medicamentos</h4>
                                </div>
                                <div class="content">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                        <input type="text" id="search" value="" class="form-control" placeholder="Search...">
                                    </div>
                                    <div id="noAsignadosMed" class="panel-body">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="botones col-md-2">
                            <button type="button" class="btn btn-wd btn-default btn-fill btn-move-left" onclick="asignarMed();">Mover
                                <span class="btn-label"><i class="ti-angle-right"></i></span></button>
                            <br>
                            <br>
                            <button type="button" class="btn btn-wd btn-default btn-fill btn-move-right" onclick="devolverMed();">
                                <span class="btn-label"><i class="ti-angle-left"></i></span>  Remover</button>
                        </div>
                        <div class="col-md-5">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Medicamentos Agregados</h4>
                                </div>
                                <div class="content">
                                    <div id="asignadosMed" class="panel-body">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modalAsignar" class="modal fade in">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="titulo" class="modal-title">Asignar síntomas para la enfermedad <label id="disease"></label></h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" data-disease="" id="enfermedad">
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
                            <br>
                            <br>
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
                </div>
            </div>
        </div>
    </div>

    <div id="modalWatch" class="modal fade in">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" name=""><span name="title"></span> </h4>
                </div>
                <div class="modal-body">
                    <iframe width="854" id="iframe" height="480" src="" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="modal-footer">
                    <div class="form-group text-center">
                        <button class="btn btn-primary" id="exit" ><span class="glyphicon glyphicon-menu-up"></span> Salir</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/footable.min.js') }} "></script>
    <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/search.js') }} "></script>
    <script src="{{ asset('knowledge/js/index.js') }}"></script>
@endsection