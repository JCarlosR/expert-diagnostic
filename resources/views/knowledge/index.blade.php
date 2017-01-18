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
                                            <a class="btn btn-primary" data-rules data-disease="{{ $disease->id }}">
                                                <i class="fa fa-eye"></i>Ver reglas
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $diseases->render() !!}
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="title">
                                    Reglas de conocimiento:
                                </h4><br><br>
                                <div class="input-group col-md-10">
                                    <table class="table table-hover table-condensed">
                                        <thead>
                                        <tr>
                                            <th>Regla</th>
                                            <th>Porcentaje</th>
                                            <th>Acción</th>
                                        </tr>
                                        </thead>
                                        <template id="template-rule">
                                            <tr>
                                                <td data-rule></td>
                                                <td data-percentage></td>
                                                <td>
                                                    <a data-factors class="btn btn-success">Ver factores</a>
                                                </td>
                                                <td>
                                                    <a data-recommendation class="btn btn-primary">Recomendaciones</a>
                                                </td>
                                                <td>
                                                    <a data-eliminar class="btn btn-danger">Eliminar</a>
                                                </td>
                                            </tr>
                                        </template>
                                        <tbody id="table-rules">
                                        {{-- Load with javascript --}}

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

    <div id="modalEliminar" class="modal fade in">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar regla</h4>
                </div>

                <form id="formEliminar" action="{{ url('eliminar/regla') }}" method="POST">
                    <div class="modal-body">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" />
                        <input type="hidden" name="enfermedad" />
                        <div class="form-group">
                            <label for="nombreEliminar">¿Desea eliminar la siguiente regla de conocimiento?</label>
                            <input type="text" readonly class="form-control" name="nombreEliminar"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group pull-left">
                            <button class="btn btn-danger pull-left" data-dismiss="modal"><span class="ti-close"></span> Cancelar</button>
                        </div>
                        <div class="btn-group pull-right">
                            <button id="accept" class="btn btn-primary"><span class="ti-check" aria-hidden="true"></span> Aceptar</button>
                        </div>
                    </div>
                </form>

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