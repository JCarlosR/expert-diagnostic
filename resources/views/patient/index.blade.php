
@extends('layouts.general')

@section('title', 'Pacientes')

@section('styles')
    <style>
        .margen
        {
            margin-top:11px;
        }
        .no-resize
        {
            resize: none;
        }
        .inside:focus{
            border: 1px solid #0097cf;
        }
        img
        {
            height: 40px;
            width: 40px;
        }
    </style>
    <link rel="stylesheet" href="{{asset('assets/css/footable.bootstrap.min.css')}}">
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" id="btnNew" class="btn btn-info btn-fill btn-wd">Nuevo paciente</button>
                    <br>
                    <br>
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Listado de pacientes</h4>
                        </div>

                        @if( $errors->count() > 0 )
                            <div class="col-sm-12">
                                <div class="alert alert-danger" role="alert">
                                    <strong>Lo sentimos! </strong>Por favor revise los siguientes errores.
                                    @foreach($errors->all() as $message)
                                        <p>{{$message}}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endif



                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped mytable">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Direccion</th>
                                        <th data-hide="all" data-breakpoints="all">Ciudad</th>
                                        <th data-hide="all" data-breakpoints="all">País</th>
                                        <th data-type="html">Imagen</th>
                                        <th data-hide="all" data-breakpoints="all">Fecha de nacimiento</th>
                                        <th data-hide="all" data-breakpoints="all">Comentario</th>
                                        <th data-type="html">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($patients as $patient)
                                    <tr>
                                        <td>{{ $patient->name }}</td>
                                        <td>{{ $patient->surname }}</td>
                                        <td>{{ $patient->address }}</td>
                                        <td>{{ $patient->city }}</td>
                                        <td>{{ $patient->country }}</td>
                                        <td><img src="{{ asset('patient/images') }}/{{ $patient->image }} " class="image"></td>
                                        <td>{{ $patient->birthdate }}</td>
                                        <td>{{ $patient->comment }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-id="{{ $patient->id }}"
                                                    data-name="{{ $patient->name }}"
                                                    data-surname="{{ $patient->surname }}"
                                                    data-address="{{ $patient->address }}"
                                                    data-city="{{ $patient->city }}"
                                                    data-country="{{ $patient->country }}"
                                                    data-image="{{ $patient->image }}"
                                                    data-birthdate="{{ $patient->birthdate }}"
                                                    data-comment="{{ $patient->comment }}"><i class="fa fa-pencil" data-backdrop="false"></i></button>
                                            <button type="button"  class="btn btn-danger" data-delete="{{ $patient->id }}" data-name="{{ $patient->name }}" data-surname="{{ $patient->surname }}" data-backdrop="false"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $patients->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modalNuevo" class="modal fade in">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Nuevo paciente</h4>
                </div>


                <form id="formRegistrar" action="{{ url('/pacientes/registrar') }}" class="form-horizontal form-label-left"  method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Nombres <span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" id="name" name="name" required="required" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="surname">Apellidos <span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" id="surname" name="surname" class="form-control inside" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="address">Dirección <span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" id="address" name="address" class="form-control inside" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="city">Ciudad <span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" id="city" name="city" class="form-control inside" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="country">País <span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" id="country" name="country" class="form-control inside" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3"  for="image">Nueva Imagen</label>
                            <div class="col-md-5">
                                <input type="file" name="image" class="form-control inside" accept="image/*">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="comment">Comentario </label>
                            <div class="col-md-8">
                                <input type="text" id="comment" name="comment" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="birthdate">Fecha de nacimiento <span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="date" id="birthdate" name="birthdate" class="form-control inside" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-danger" data-dismiss="modal"><span class="ti-close"></span> Cancelar</button>
                        <button class="btn btn-primary"><span class="ti-save" aria-hidden="true"></span> Guardar paciente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalEditar" class="modal fade in">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar paciente</h4>
                </div>


                <form id="formEditar" action="{{ url('/pacientes/modificar') }}" class="form-horizontal form-label-left"  method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" />

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Nombres <span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" id="name" name="name" required="required" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="surname">Apellidos <span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" id="surname" name="surname" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="address">Dirección <span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" id="address" name="address" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="city">Ciudad <span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" id="city" name="city" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="country">País <span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" id="country" name="country" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3"  for="image">Nueva Imagen</label>
                            <div class="col-md-5">
                                <input type="file" name="image" class="form-control inside" accept="image/*">
                            </div>
                            <label class="control-label col-md-2" for="last-name">Imagen anterior</label>
                            <div class="col-md-2" id="newImage">
                                <input type="hidden" name="oldImage">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="comment">Comentario <span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" id="comment" name="comment" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="birthdate">Fecha de nacimiento <span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="date" id="birthdate" name="birthdate" class="form-control inside">
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-danger" data-dismiss="modal"><span class="ti-close"></span> Cancelar</button>
                        <button class="btn btn-primary"><span class="ti-save" aria-hidden="true"></span> Guardar paciente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalEliminar" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar paciente</h4>
                </div>
                <form id="formEliminar" action="{{ url('pacientes/eliminar') }}" method="POST">
                    <div class="modal-body">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" />
                        <div class="form-group">
                            <label for="nombreEliminar">¿Desea eliminar el siguiente paciente?</label>
                            <input type="text" readonly class="form-control" name="nombreEliminar"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group pull-left">
                            <button class="btn btn-danger pull-left" data-dismiss="modal"><span class="ti-close"></span> Cancelar</button>
                        </div>
                        <div class="btn-group pull-right">
                            <button class="btn btn-primary"><span class="ti-check" aria-hidden="true"></span> Aceptar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ asset('assets/js/footable.min.js') }}"></script>
    <script src="{{ asset('patient/js/patient.js') }}"></script>
@endsection