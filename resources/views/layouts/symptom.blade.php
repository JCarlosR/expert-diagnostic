@extends('layouts.general')

@section('symptom','class="active"')

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
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" id="btnNew" class="btn btn-info btn-fill btn-wd">Nuevo Sintoma</button>
                    <br>
                    <br>
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Listado de Sintomas</h4>
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
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th data-type="html">Imagen</th>
                                    <th data-type="html">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sintomas as $sintoma)
                                    <tr>
                                        <td>{{ $sintoma->id }}</td>
                                        <td>{{ $sintoma->name }}</td>
                                        <td>{{ $sintoma->descripcion }}</td>
                                        <td><img src="{{ asset('symptoms/images') }}/{{ $sintoma->imagen }} " class="image"></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-id="{{ $sintoma->id }}" data-name="{{ $sintoma->name }}"
                                                    data-description="{{ $sintoma->descripcion }}" data-image="{{ $sintoma->imagen }}"><i class="fa fa-pencil" data-backdrop="false"></i></button>
                                            <button type="button"  class="btn btn-danger" data-delete="{{ $sintoma->id }}" data-name="{{ $sintoma->name }}" data-description="{{ $sintoma->descripcion }}" data-backdrop="false"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $sintomas->render() !!}
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
                    <h4 class="modal-title">Nuevo Síntoma</h4>
                </div>


                <form id="formRegistrar" action="{{ url('/symptom/registrar') }}" class="form-horizontal form-label-left"  method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Nombre <span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" id="rgtName" name="name" required="required" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="description">Descripcion <span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" id="description" name="description" required="required" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3"  for="image">Nueva Imagen</label>
                            <div class="col-md-5">
                                <input type="file" name="image" class="form-control inside" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-danger" data-dismiss="modal"><span class="ti-close"></span> Cancelar</button>
                        <button class="btn btn-primary"><span class="ti-save" aria-hidden="true"></span> Guardar Síntoma</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalEditar" class="modal fade in">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar sintomas</h4>
                </div>


                <form id="formEditar" action="{{ url('/symptom/modificar') }}" class="form-horizontal form-label-left"  method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" />

                        <div class="form-group">
                                <input type="text" id="edtName" name="name" required="required" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="description">Descripcion <span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" id="description" name="description" required="required" class="form-control inside">
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


                    <div class="form-group text-center">
                        <button class="btn btn-danger" data-dismiss="modal"><span class="ti-close"></span> Cancelar</button>
                        <button class="btn btn-primary"><span class="ti-save" aria-hidden="true"></span> Guardar paciente</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <div id="modalEliminar" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Sintoma</h4>
                </div>
                <form id="formEliminar" action="{{ url('symptom/eliminar') }}" method="POST">
                    <div class="modal-body">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" />
                        <div class="form-group">
                            <label for="descEliminar">¿Desea eliminar el siguiente sintoma?</label>
                            <input type="text" readonly class="form-control" name="descEliminar"/>
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
    <script src="{{ asset('symptoms/js/index.js') }}"></script>
@endsection