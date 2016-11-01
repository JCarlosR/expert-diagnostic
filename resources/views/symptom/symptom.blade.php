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
        /********************************************************************/
        /* Portlet */
        .portlet {
            background: #fff;
            padding: 20px;
        }

        .portlet.portlet-gray {
            background: #f7f7f7;
        }

        .portlet.portlet-bordered {
            border: 1px solid #eee;
        }

        /* Portlet Title */
        .portlet-title {
            padding: 0;
            min-height: 40px;
            border-bottom: 1px solid #eee;
            margin-bottom: 18px;
        }

        .caption {
            float: left;
            display: inline-block;
            font-size: 18px;
            line-height: 18px;
        }

        .caption.caption-green .caption-subject,
        .caption.caption-green i {
            color: #4db3a2;
            font-weight: 200;
        }

        .caption.caption-red .caption-subject,
        .caption.caption-red i {
            color: #e26a6a;
            font-weight: 200;
        }

        .caption.caption-purple .caption-subject,
        .caption.caption-purple i {
            color: #8775a7;
            font-weight: 400;
        }

        .caption i {
            color: #777;
            font-size: 15px;
            font-weight: 300;
            margin-top: 3px;
        }

        .caption-subject {
            color: #666;
            font-size: 16px;
            font-weight: 600;
        }

        .caption-helper {
            padding: 0;
            margin: 0;
            line-height: 13px;
            color: #9eacb4;
            font-size: 13px;
            font-weight: 400;
        }

        /* Actions */
        .actions {
            float: right;
            display: inline-block;
        }

        .actions a {
            margin-left: 3px;
        }

        .actions .btn {
            color: #666;
            padding: 3px 9px;
            font-size: 13px;
            line-height: 1.5;
            background-color: #fff;
            border-color: #ccc;
            border-radius: 50px;
        }

        .actions .btn i {
            font-size: 12px;
        }

        .actions .btn:hover {
            background: #f2f2f2;
        }

        /* Pagination */
        .pagination {
            margin: -3px 0 0;
            border-radius: 50px;
        }

        .pagination > li > a,
        .pagination > li > span {
            padding: 4px 10px;
            font-size: 12px;
            color: #8775a7;
            background: #f7f7f7;
        }

        .pagination > li:hover > a,
        .pagination > li.active > a,
        .pagination > li.active:hover > a {
            color: #fff;
            background: #8775a7;
            border-color: #8775a7;
        }

        /* Inputs */
        .inputs {
            float: right;
            display: inline-block;
            padding: 4px 0;
            margin-top: -10px;
        }

        .input-inline {
            width: 240px;
            display: inline-block;
            vertical-align: middle;
        }

        /* Tab */
        .portlet-title > .nav-tabs {
            background: none;
            margin: 0;
            float: right;
            display: inline-block;
            border: 0;
        }

        .portlet-title > .nav-tabs > li {
            background: none;
            margin: 0;
            border: 0;
        }

        .portlet-title > .nav-tabs > li > a {
            background: none;
            border: 0;
            padding: 2px 10px 13px;
            color: #444;
        }

        .portlet-title > .nav-tabs > li.active,
        .portlet-title > .nav-tabs > li.active:hover {
            border-bottom: 4px solid #f3565d;
            position: relative;
        }

        .portlet-title > .nav-tabs > li:hover {
            border-bottom: 4px solid #f29b9f;
        }

        .portlet-title > .nav-tabs > li.active > a,
        .portlet-title > .nav-tabs > li:hover > a {
            color: #333;
            background: #fff;
            border: 0;
        }

        /* Btn Circle */
        .actions .btn.btn-circle {
            width: 28px;
            height: 28px;
            padding: 3px 7px;
            text-align: center;
        }

        .actions .btn.btn-circle i {
            font-size: 11px;
        }

        /* Btn Grey Salsa */
        .actions .btn.grey-salsa {
            border: none;
            margin-left: 3px;
            box-shadow: none;
            border-radius: 50px !important;
        }

        .actions .btn.grey-salsa.active {
            color: #fafcfb;
            background: #8e9bae;
        }
        .actions .grey-salsa.btn:hover,
        .actions .grey-salsa.btn:focus,
        .actions .grey-salsa.btn:active,
        .actions .grey-salsa.btn.active {
            color: #fafcfb;
            background: #97a3b4;
        }

        /* Btn Red */
        .actions .btn.btn-red.active,
        .actions .btn.btn-red:hover {
            color: #fff;
            box-shadow: none;
            background: #e26a6a;
            border-color: #e26a6a;
        }

        /* Btn Red */
        .actions .btn.btn-purple.active,
        .actions .btn.btn-purple:hover {
            color: #fff;
            box-shadow: none;
            background: #8775a7;
            border-color: #8775a7;
        }
    </style>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            {{----}}
            <div class="col-md-12">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption caption-red">
                            <i class="glyphicon glyphicon-pushpin"></i>
							<span class="caption-subject bold font-yellow-crusta uppercase">
							Factores </span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#portlet_tab1" data-toggle="tab">
                                    Antecedentes </a>
                            </li>
                            <li>
                                <a href="#portlet_tab2" data-toggle="tab">
                                    Síntomas </a>
                            </li>
                            <li class="">
                                <a href="#portlet_tab3" data-toggle="tab">
                                    Otros factores </a>
                            </li>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="portlet_tab1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" id="btnNew" class="btn btn-info btn-fill btn-wd">Nuevo Antecedente</button>
                                        <br>
                                        <br>
                                        <div class="card">
                                            <div class="header">
                                                <h4 class="title">Listado de Antecedentes</h4>
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
                            <div class="tab-pane" id="portlet_tab2">
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
                            <div class="tab-pane" id="portlet_tab3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" id="btnNew" class="btn btn-info btn-fill btn-wd">Nuevo factor</button>
                                        <br>
                                        <br>
                                        <div class="card">
                                            <div class="header">
                                                <h4 class="title">Listado de Otros factores</h4>
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
                    </div>
                </div>
                <!-- END Portlet PORTLET-->
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