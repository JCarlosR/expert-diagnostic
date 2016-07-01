@extends('layouts.general')

<style>
    .no-resize
    {
        resize: none;
    }
    .inside:focus{
        border: 1px solid #0097cf;
    }
</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-6 col-md-offset-3">
                <form method="post" action="{{url('enfermedad/registrar')}}" enctype="multipart/form-data">
                    <div class="col-md-12 text-center">
                        <h3>Registrar nueva enfermedad</h3>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nombre*</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control inside">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Imagen</label>
                            <input type="file" class="form-control inside" name="image" accept="image/*">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Descripción</label>
                            <textarea name="description" id="description" class="form-control no-resize inside">{{ old('name') }}</textarea>
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
@endsection