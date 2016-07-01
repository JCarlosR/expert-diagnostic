@extends('layouts.general')

<style>
    .margen
    {
        margin-top:16px;
    }
    .no-resize
    {
        resize: none;
    }
    .inside:focus{
        border: 1px solid #0097cf;
    }
    .image
    {
        height: 40px;
        width: 40px;
    }
</style>

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/footable.bootstrap.min.css')}}">

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-10 col-md-offset-1">
            <div class="col-md-12 text-center">
                <h3>Listado de enfermedades</h3>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <h2><a href="{{ url('enfermedad/nueva') }}" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Nueva enfermedad</a></h2>
                </div>
                <div class="col-md-9 form-inline margen">
                    <div class="col-md-8 input-group ">
                        <span class="input-group-addon">Enfermedad</span><input type="text" id="search" class="form-control" placeholder="Búsqueda personalizada ...">
                    </div>

                    <div class="col-md-3 pull-right">
                        <a href="{{ url('home') }}" class="btn btn-dark" type="button"><i class="fa fa-lock"></i> Volver</a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                   <table class="table table-hover mytable">
                        <thead>
                            <tr>
                                <th>Enfermedad</th>
                                <th data-type="html"> Imagen </th>
                                <th data-hide="all" data-breakpoints="all" data-title="Descripción"></th>
                                <th data-type="html">Editar | Eliminar</th>
                            </tr>
                        </thead>
                    @foreach($diseases as $disease)
                        <tbody id="tabla">
                            <tr>
                                <td>{{ $disease->name }}</td>
                                <td ><img src="{{ asset('diseases/images') }}/{{ $disease->image }} " class="img-responsive image"></td>
                                <td>{{$disease->description}}</td>
                                <td>
                                    <button type="submit" class="btn btn-success" data-id="{{ $disease->id }}" data-name="{{ $disease ->name }}" data-description="{{ $disease->description }}">
                                       <i class="fa fa-pencil"></i>Editar
                                    </button>
                                    <button type="submit" class="btn btn-danger"  data-delete="{{ $disease->id }}" data-name="{{ $disease->name }}">
                                        <i class="fa fa-trash"></i>Eliminar
                                    </button>

                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
                {!! $diseases->render() !!}
            </div>
        </div>
    </div>

    <div id="modalEditar" class="modal fade in">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar enfermedad</h4>
                </div>

                <form action="{{ url('enfermedad/modificar') }}" class="form-horizontal form-label-left"  method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" />

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nombre*</label>
                                <input type="text" id="name" name="name" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3"  for="image">Nueva Imagen</label>
                            <div class="col-md-5">
                                <input type="file" name="image" class="form-control inside" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2" for="last-name">Imagen anterior</label>
                                <div class="col-md-2" id="newImage">
                                    <input type="hidden" name="oldImage">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Descripción</label>
                                <textarea name="description" id="description" class="form-control no-resize inside"></textarea>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Guardar cambios</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalEliminar" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar enfermedad</h4>
                </div>
                <form action="{{ url('enfermedad/eliminar') }}" method="POST">
                    <div class="modal-body">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" />
                        <div class="form-group">
                            <label for="nombreEliminar">¿Desea eliminar la siguiente enfermedad?</label>
                            <input type="text" readonly class="form-control" name="nombreEliminar"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group pull-left">
                            <button class="btn btn-danger pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-menu-up"></span> Cancelar</button>
                        </div>
                        <div class="btn-group pull-right">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Aceptar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/footable.min.js') }} "></script>
    <script src="{{ asset('assets/js/search.js') }} "></script>
    <script src="{{ asset('diseases/index.js') }}"></script>
@endsection