@extends('layouts.general')

@section('title','Asignar síntomas')

@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .table
        {
            margin-left: 30px;
        }
        .marco
        {
            background-color: #95e9fe !important;
        }
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

        .typeahead,
        .tt-query,
        .tt-hint {
            line-height: 30px;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            outline: none;
        }
        .typeahead:focus {
            border: 1px solid #0097cf;
        }
        .tt-query {
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }
        .tt-hint {
            color: #bdbdbd;
        }
        .tt-menu {
            margin: 12px 0;
            padding: 8px 0;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.2);
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            border-radius: 4px;
            -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
            -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
            box-shadow: 0 5px 10px rgba(0,0,0,.2);
            color: #000;
        }
        .tt-suggestion {
            padding: 3px 20px;
            line-height: 24px;
        }
        .tt-suggestion:hover {
            cursor: pointer;
            color: #fff;
            background-color: #0097cf;
        }
        .tt-suggestion.tt-cursor {
            color: #fff;
            background-color: #0097cf;
        }
        .tt-suggestion p {
            margin: 0;
        }

    </style>
    <link rel="stylesheet" href="{{asset('assets/css/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/footable.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/typeahead.css')}}">
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 separator">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Asignar reglas para {{ $disease->name }}</h4>
                        </div>
                        <br>
                        <br>
                        <input type="hidden" id="enfermedad" value="{{ $disease->id }}">
                        <div class="row">
                            <div class="col-md-4">

                                <label class="control-label col-md-3" for="sintoma">
                                    Síntomas:
                                </label><br><br>
                                <div class="input-group col-md-9" style="margin-left: 10px">
                                    <div class="col-md-10"><input id="sintoma" name="sintoma" class="marco typeahead form-control" type="text"></div>
                                    <div class="col-md-2"><button class="btn btn-success" id="symptom"><i class="fa fa-check"></i></button></div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <label class="control-label col-md-3" for="antecedente">
                                    Antecedentes:
                                </label><br><br>
                                <div class="input-group col-md-9">
                                    <div class="col-md-10"><input id="antecedente" name="antecedente" class="marco typeahead form-control" type="text"></div>
                                    <div class="col-md-2"><a class="btn btn-success" id="antecedent"><i class="fa fa-check"></i></a></div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <label class="control-label col-md-12" for="otro">
                                    Otros factores:
                                </label><br><br>
                                <div class="input-group col-md-9">
                                    <div class="col-md-10"><input id="otro" name="otro" class="marco typeahead form-control" type="text"></div>
                                    <div class="col-md-2"><a class="btn btn-success" id="other"><i class="fa fa-check"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <label class="control-label col-md-3" for="factores">
                                    Factores:
                                </label><br><br>
                                <div class="input-group col-md-10">
                                    <table class="table table-hover table-condensed">
                                        <thead>
                                        <tr>
                                            <th>Factor</th>
                                            <th>Acción</th>
                                        </tr>
                                        </thead>
                                        <template id="template-factor">
                                            <tr>
                                                <td data-factor></td>
                                                <td>
                                                    <a data-delete class="btn btn-danger">Quitar</a>
                                                </td>
                                            </tr>
                                        </template>
                                        <tbody id="table-factors">
                                        {{-- Load with javascript --}}

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label col-md-3" for="peso">
                                    Peso:
                                </label><br><br>
                                <div class="input-group col-md-9">
                                    <input id="peso" name="peso" class="marco form-control" type="number" step="1" min="0" max="100">
                                </div>
                                <button class="btn btn-success" id="addRecomendations" >Agregar recomendaciones</button>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <button id="btn-new" class="btn btn-primary">Nueva regla</button>
                            </div>
                            <div class="col-md-4 text-center">
                                <button id="btn-save" data-url="{{ url('guardar/regla') }}" class="btn btn-success">Guardar regla</button>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="{{ url('/conocimiento') }}" class="btn btn-danger">Volver</a>
                            </div>
                        </div>
                        {{--<div class="row">
                            <div class="col-md-5">
                                <label class="control-label col-md-3" for="factores">
                                    Recomendaciones:
                                </label><br><br>
                                <div class="input-group col-md-12">
                                    <div class="col-md-12"><input id="antecedente" name="antecedente" class="marco typeahead form-control" type="text"></div>
                                    <div class="col-md-12 col-md-offset-5"><a class="btn btn-success"><i class="fa fa-check"></i></a></div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="input-group col-md-10">
                                    <table class="table table-hover table-condensed">
                                        <thead>
                                        <tr>
                                            <th>Recomendación</th>
                                            <th>Acción</th>
                                        </tr>
                                        </thead>
                                        <template id="template-factor">
                                            <tr>
                                                <td data-recomendacion></td>
                                                <td>
                                                    <button data-eliminar type="button" class="btn btn-danger">Quitar</button>
                                                </td>
                                            </tr>
                                        </template>
                                        <tbody id="table-items">
                                        --}}{{-- Load with javascript --}}{{--
                                        <tr>
                                            <td data-factor>asascasc</td>
                                            <td>
                                                <button data-delete type="button" class="btn btn-danger">Quitar</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-factor>asascasc</td>
                                            <td>
                                                <button data-delete type="button" class="btn btn-danger">Quitar</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-factor>asascasc</td>
                                            <td>
                                                <button data-delete type="button" class="btn btn-danger">Quitar</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>--}}
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

    <div id="modalRecomendation" class="modal fade in">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"> Asignar recomendaciones</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <label class="control-label col-md-3" for="sintoma">Recomendación:</label>
                            <div class="input-group col-md-9">
                                <div class="col-md-10"><input id="recomendations" class="marco typeahead form-control" type="text"></div>
                                <div class="col-md-2"><button class="btn btn-success" id="addRecomendationTable"><i class="fa fa-check"></i></button></div>
                            </div>
                        </div>

                        <div class="col-md-10 col-md-offset-1 table-responsive">
                            <table class="table table-striped condensed">
                                <thead>
                                    <tr>
                                        <th><b>Nombre</b></th>
                                        <th><b>Acción</b></th>
                                    </tr>
                                </thead>
                                <tbody id="recomendationData">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="text-center">
                        <button class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-menu-up"></span> Salir</button>
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
    <script src="{{ asset('knowledge/js/recomendation.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".icons").remove();
        });
    </script>
    <script src="{{ asset('assets/js/typeahead.bundle.js') }}"></script>
    <script>
        var substringMatcher = function(strs) {
            return function findMatches(q, cb) {
                var matches, substringRegex;
                // an array that will be populated with substring matches
                matches = [];
                // regex used to determine if a string contains the substring `q`
                substrRegex = new RegExp(q, 'i');
                // iterate through the pool of strings and for any string that
                // contains the substring `q`, add it to the `matches` array
                $.each(strs, function(i, str) {
                    if (substrRegex.test(str)) {
                        matches.push(str);
                    }
                });
                cb(matches);
            };
        };
        var symptoms = {!! $symptoms !!};
        $('#sintoma').typeahead(
                {
                    hint: true,
                    highlight: true,
                    minLength: 1
                },
                {
                    name: 'symptoms',
                    source: substringMatcher(symptoms)
                }
        );
        var antecedents = {!! $antecedents !!};
        $('#antecedente').typeahead(
                {
                    hint: true,
                    highlight: true,
                    minLength: 1
                },
                {
                    name: 'antecedents',
                    source: substringMatcher(antecedents)
                }
        );
        var others = {!! $others !!};
        $('#otro').typeahead(
                {
                    hint: true,
                    highlight: true,
                    minLength: 1
                },
                {
                    name: 'others',
                    source: substringMatcher(others)
                }
        );
    </script>
@endsection