@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-6 col-md-offset-3">
            <form action="">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Nombre*</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control">
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
                        <textarea name="" id="" style="resize:none;" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <div class="form-group">
                        <a href="{{ url('home') }}" class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
