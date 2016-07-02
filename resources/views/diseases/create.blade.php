@extends('layouts.general')
@section('title','Enfermedades')

<style>
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
</style>

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-md-8 col-md-offset-2">
                    <form id="form" method="post" action="{{url('enfermedad/registrar')}}" enctype="multipart/form-data">
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />

                        <div class="col-md-12 text-center">
                            <h3>Registrar enfermedad</h3>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nombre*</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control inside in-input" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Imagen</label>
                                <input type="file" class="form-control inside in-input" name="image" accept="image/*">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Url de vídeo*</label>
                                <input type="text" id="video" name="video" value="{{ old('video') }}" class="form-control inside in-input" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Descripción</label>
                                <textarea name="description" id="description" class="form-control no-resize inside in-input">{{ old('name') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="form-group">
                                <a href="{{ url('enfermedades') }}" class="btn btn-danger">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('diseases/js/create.js') }}"></script>
@endsection