
@extends('layouts.general')

@section('title', 'Pacientes')

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/css/footable.bootstrap.min.css')}}">
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Striped Table</h4>
                            <p class="category">Here is a subtitle for this table</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped mytable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Direccion</th>
                                        <th data-hide="all" data-breakpoints="all">Ciudad</th>
                                        <th data-hide="all" data-breakpoints="all">País</th>
                                        <th>Imagen</th>
                                        <th data-hide="all" data-breakpoints="all">Fecha de nacimiento</th>
                                        <th data-hide="all" data-breakpoints="all">Comentario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>$36,738</td>
                                        <td>Niger</td>
                                        <td>Oud-Turnhout</td>
                                        <td>Oud-Turnhout</td>
                                        <td><img src="{{ asset('patient/images') }}/{{ $patient->image }} " class="img-responsive image"></td>
                                        <td>Niger</td>
                                        <td>Oud-Turnhout</td>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/footable.min.js') }}"></script>
    <script src="{{ asset('patient/js/patient.js') }}"></script>
@endsection