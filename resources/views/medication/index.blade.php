
@extends('layouts.general')

@section('title', 'Medicamentos')

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
                    <button type="button" id="btnNew" class="btn btn-info btn-fill btn-wd">Nuevo medicamiento</button>
                    <br>
                    <br>
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Listado de medicamentos</h4>
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
                                        <th>Nombre comercial</th>
                                        <th>Principio activo</th>
                                        <th>Descripción</th>
                                        <th data-type="html">Imagen</th>
                                        <th data-type="html">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($medications as $medication)
                                    <tr>
                                        <td>{{ $medication->id }}</td>
                                        <td>{{ $medication->trade_name }}</td>
                                        <td>{{ $medication->active_component }}</td>
                                        <td>{{ $medication->description }}</td>
                                        <td><img src="{{ asset('medication/images') }}/{{ $medication->image }} " class="image"></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-id="{{ $medication->id }}"
                                                    data-trade_name="{{ $medication->trade_name }}"
                                                    data-active_component="{{ $medication->active_component }}"
                                                    data-description="{{ $medication->description }}"
                                                    data-image="{{ $medication->image }}"><i class="fa fa-pencil" data-backdrop="false"></i></button>
                                            <button type="button"  class="btn btn-danger" data-delete="{{ $medication->id }}" data-name="{{ $medication->trade_name }}" data-backdrop="false"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $medications->render() !!}
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
                    <h4 class="modal-title">Nuevo medicamento</h4>
                </div>

                <form action="{{ url('/medicamentos/registrar') }}" class="form-horizontal form-label-left"  method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Nombre comercial <span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" id="name" name="name" required="required" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="component">Principio activo <span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" id="component" name="component" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="description">Descripcion <span class="required">*</span></label>
                            <div class="col-md-8">
                                <textarea id="description" rows="4" name="description" class="form-control inside"></textarea>
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
                        <button type="submit" class="btn btn-primary"><span class="ti-save" aria-hidden="true"></span> Guardar medicamento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalEditar" class="modal fade in">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar medicamento</h4>
                </div>


                <form action="{{ url('/medicamentos/modificar') }}" class="form-horizontal form-label-left"  method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" />

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Nombre comercial <span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" id="name" name="name" required="required" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="component">Principio activo <span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" id="component" name="component" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="description">Descripcion <span class="required">*</span></label>
                            <div class="col-md-8">
                                <textarea id="description" rows="4" name="description" class="form-control inside"></textarea>
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

                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-danger" data-dismiss="modal"><span class="ti-close"></span> Cancelar</button>
                        <button type="submit" class="btn btn-primary"><span class="ti-save" aria-hidden="true"></span> Guardar medicamento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalEliminar" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar medicamento</h4>
                </div>
                <form action="{{ url('medicamentos/eliminar') }}" method="POST">
                    <div class="modal-body">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" />
                        <div class="form-group">
                            <label for="nombreEliminar">¿Desea eliminar el siguiente medicamento?</label>
                            <input type="text" readonly class="form-control" name="nombreEliminar"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group pull-left">
                            <button class="btn btn-danger pull-left" data-dismiss="modal"><span class="ti-close"></span> Cancelar</button>
                        </div>
                        <div class="btn-group pull-right">
                            <button type="submit" class="btn btn-primary"><span class="ti-check" aria-hidden="true"></span> Aceptar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ asset('assets/js/footable.min.js') }}"></script>
    <script src="{{ asset('medication/js/medication.js') }}"></script>
@endsection