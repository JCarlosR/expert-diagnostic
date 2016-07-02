@extends('layouts.general')

@section('symptom','class="active"')

@section('content')
    <template id="template-alerta">
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Hey!</strong> <span></span>
        </div>
    </template>

    <template id="template-fila">
        <tr>
            <td class="col-md-1" data-i></td>
            <td class="col-md-7" id="descrip"></td>
            <td class="col-md-2">
                <button class="btn btn-success" data-editar="">Editar</button>
                <button class="btn btn-danger" data-eliminar>Eliminar</button>
            </td>
        </tr>
    </template>

    <!-- Modal para editar un skill -->
    <div id="modalEditar" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ventana de edición</h4>
                </div>
                <form action="#" id="formEditar" method="POST">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="id" value=""/>
                        <div class="form-group">
                            <label for="descripcion">Nueva descripción</label>
                            <input type="text" name="description" class="form-control"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar cambios</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Mantenedor de Síntomas</h4>
                        <p class="category">Registro de Síntomas</p>
                    </div>
                    <div class="content">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Descripción</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sintomas as $sintoma)
                                <tr>
                                    <td class="col-md-1" data-i>{{ ++$v }}</td>
                                    <td class="col-md-7" data-description>{{ $sintoma->descripcion }}</td>
                                    <td class="col-md-2">
                                        <button class="btn btn-success" data-editar="{{ $sintoma->id }}">Editar</button>
                                        <button class="btn btn-danger" data-eliminar>Eliminar</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <form>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="inputDescription">Descripcion</label>
                                        <input type="text" name="description" class="form-control border-input" placeholder="Decripcion de Sintoma">
                                    </div>
                                </div>
                                <div class="col-md-offset-2 col-md-5">
                                    <div class="form-group">
                                        <label for="inputImageFile">Cargar Imagen</label>
                                        <input type="file" name="image" id="inputImageFile">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-offset-2 col-md-8">
                                    <button type="submit" class="btn btn-block btn-success">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/symptom/index.js') }}"></script>
@endsection