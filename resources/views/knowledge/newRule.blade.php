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

        /* Hiding the checkbox, but allowing it to be focused */
        .badgebox
        {
            opacity: 0;
        }

        .badgebox + .badge
        {
            /* Move the check mark away when unchecked */
            text-indent: -999999px;
            /* Makes the badge's width stay the same checked and unchecked */
            width: 27px;
        }

        .badgebox:focus + .badge
        {
            /* Set something to make the badge looks focused */
            /* This really depends on the application, in my case it was: */

            /* Adding a light border */
            box-shadow: inset 0px 0px 5px;
            /* Taking the difference out of the padding */
        }

        .badgebox:checked + .badge
        {
            /* Move the check mark back when checked */
            text-indent: 0;
        }.form-group input[type="checkbox"] {
             display: none;
         }

        .form-group input[type="checkbox"] + .btn-group > label span {
            width: 20px;
        }

        .form-group input[type="checkbox"] + .btn-group > label span:first-child {
            display: none;
        }
        .form-group input[type="checkbox"] + .btn-group > label span:last-child {
            display: inline-block;
        }

        .form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
            display: inline-block;
        }
        .form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
            display: none;
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

                    <div class="card">
                        <div class="header">
                            <h4 class="title">Listado de enfermedades</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="[ form-group ]">
                                    <input type="checkbox" name="fancy-checkbox-default" id="fancy-checkbox-default" autocomplete="off" />
                                    <div class="[ btn-group ]">
                                        <label for="fancy-checkbox-default" class="[ btn btn-default ]">
                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                            <span> </span>
                                        </label>
                                        <label for="fancy-checkbox-default" class="[ btn btn-default active ]">
                                            Default Checkbox
                                        </label>
                                    </div>
                                </div>
                                <div class="[ form-group ]">
                                    <input type="checkbox" name="fancy-checkbox-default2" id="fancy-checkbox-default2" autocomplete="off" />
                                    <div class="[ btn-group ]">
                                        <label for="fancy-checkbox-default2" class="[ btn btn-default ]">
                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                            <span> </span>
                                        </label>
                                        <label for="fancy-checkbox-default2" class="[ btn btn-default active ]">
                                            Default Checkbox
                                        </label>
                                    </div>
                                </div>
                                <div class="[ form-group ]">
                                    <input type="checkbox" name="fancy-checkbox-default3" id="fancy-checkbox-default3" autocomplete="off" />
                                    <div class="[ btn-group ]">
                                        <label for="fancy-checkbox-default3" class="[ btn btn-default ]">
                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                            <span> </span>
                                        </label>
                                        <label for="fancy-checkbox-default3" class="[ btn btn-default active ]">
                                            Default Checkbox
                                        </label>
                                    </div>
                                </div>
                                <div class="[ form-group ]">
                                    <input type="checkbox" name="fancy-checkbox-default4" id="fancy-checkbox-default4" autocomplete="off" />
                                    <div class="[ btn-group ]">
                                        <label for="fancy-checkbox-defaul4t" class="[ btn btn-default ]">
                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                            <span> </span>
                                        </label>
                                        <label for="fancy-checkbox-default4" class="[ btn btn-default active ]">
                                            Default Checkbox
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="[ form-group ]">
                                    <input type="checkbox" name="fancy-checkbox-default" id="fancy-checkbox-default" autocomplete="off" />
                                    <div class="[ btn-group ]">
                                        <label for="fancy-checkbox-default" class="[ btn btn-default ]">
                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                            <span> </span>
                                        </label>
                                        <label for="fancy-checkbox-default" class="[ btn btn-default active ]">
                                            Default Checkbox
                                        </label>
                                    </div>
                                </div>
                                <div class="[ form-group ]">
                                    <input type="checkbox" name="fancy-checkbox-default2" id="fancy-checkbox-default2" autocomplete="off" />
                                    <div class="[ btn-group ]">
                                        <label for="fancy-checkbox-default2" class="[ btn btn-default ]">
                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                            <span> </span>
                                        </label>
                                        <label for="fancy-checkbox-default2" class="[ btn btn-default active ]">
                                            Default Checkbox
                                        </label>
                                    </div>
                                </div>
                                <div class="[ form-group ]">
                                    <input type="checkbox" name="fancy-checkbox-default3" id="fancy-checkbox-default3" autocomplete="off" />
                                    <div class="[ btn-group ]">
                                        <label for="fancy-checkbox-default3" class="[ btn btn-default ]">
                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                            <span> </span>
                                        </label>
                                        <label for="fancy-checkbox-default3" class="[ btn btn-default active ]">
                                            Default Checkbox
                                        </label>
                                    </div>
                                </div>
                                <div class="[ form-group ]">
                                    <input type="checkbox" name="fancy-checkbox-default4" id="fancy-checkbox-default4" autocomplete="off" />
                                    <div class="[ btn-group ]">
                                        <label for="fancy-checkbox-defaul4t" class="[ btn btn-default ]">
                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                            <span> </span>
                                        </label>
                                        <label for="fancy-checkbox-default4" class="[ btn btn-default active ]">
                                            Default Checkbox
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="[ form-group ]">
                                    <input type="checkbox" name="fancy-checkbox-default" id="fancy-checkbox-default" autocomplete="off" />
                                    <div class="[ btn-group ]">
                                        <label for="fancy-checkbox-default" class="[ btn btn-default ]">
                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                            <span> </span>
                                        </label>
                                        <label for="fancy-checkbox-default" class="[ btn btn-default active ]">
                                            Default Checkbox
                                        </label>
                                    </div>
                                </div>
                                <div class="[ form-group ]">
                                    <input type="checkbox" name="fancy-checkbox-default2" id="fancy-checkbox-default2" autocomplete="off" />
                                    <div class="[ btn-group ]">
                                        <label for="fancy-checkbox-default2" class="[ btn btn-default ]">
                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                            <span> </span>
                                        </label>
                                        <label for="fancy-checkbox-default2" class="[ btn btn-default active ]">
                                            Default Checkbox
                                        </label>
                                    </div>
                                </div>
                                <div class="[ form-group ]">
                                    <input type="checkbox" name="fancy-checkbox-default3" id="fancy-checkbox-default3" autocomplete="off" />
                                    <div class="[ btn-group ]">
                                        <label for="fancy-checkbox-default3" class="[ btn btn-default ]">
                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                            <span> </span>
                                        </label>
                                        <label for="fancy-checkbox-default3" class="[ btn btn-default active ]">
                                            Default Checkbox
                                        </label>
                                    </div>
                                </div>
                                <div class="[ form-group ]">
                                    <input type="checkbox" name="fancy-checkbox-default4" id="fancy-checkbox-default4" autocomplete="off" />
                                    <div class="[ btn-group ]">
                                        <label for="fancy-checkbox-defaul4t" class="[ btn btn-default ]">
                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                            <span> </span>
                                        </label>
                                        <label for="fancy-checkbox-default4" class="[ btn btn-default active ]">
                                            Default Checkbox
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="[ form-group ]">
                                    <input type="checkbox" name="fancy-checkbox-default" id="fancy-checkbox-default" autocomplete="off" />
                                    <div class="[ btn-group ]">
                                        <label for="fancy-checkbox-default" class="[ btn btn-default ]">
                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                            <span> </span>
                                        </label>
                                        <label for="fancy-checkbox-default" class="[ btn btn-default active ]">
                                            Default Checkbox
                                        </label>
                                    </div>
                                </div>
                                <div class="[ form-group ]">
                                    <input type="checkbox" name="fancy-checkbox-default2" id="fancy-checkbox-default2" autocomplete="off" />
                                    <div class="[ btn-group ]">
                                        <label for="fancy-checkbox-default2" class="[ btn btn-default ]">
                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                            <span> </span>
                                        </label>
                                        <label for="fancy-checkbox-default2" class="[ btn btn-default active ]">
                                            Default Checkbox
                                        </label>
                                    </div>
                                </div>
                                <div class="[ form-group ]">
                                    <input type="checkbox" name="fancy-checkbox-default3" id="fancy-checkbox-default3" autocomplete="off" />
                                    <div class="[ btn-group ]">
                                        <label for="fancy-checkbox-default3" class="[ btn btn-default ]">
                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                            <span> </span>
                                        </label>
                                        <label for="fancy-checkbox-default3" class="[ btn btn-default active ]">
                                            Default Checkbox
                                        </label>
                                    </div>
                                </div>
                                <div class="[ form-group ]">
                                    <input type="checkbox" name="fancy-checkbox-default4" id="fancy-checkbox-default4" autocomplete="off" />
                                    <div class="[ btn-group ]">
                                        <label for="fancy-checkbox-defaul4t" class="[ btn btn-default ]">
                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                            <span> </span>
                                        </label>
                                        <label for="fancy-checkbox-default4" class="[ btn btn-default active ]">
                                            Default Checkbox
                                        </label>
                                    </div>
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
    <script>
        $(document).ready(function() {
            $(".icons").remove();
        });
    </script>
@endsection