@extends('layout.base')
@section('css')

@endsection

@section('contenido')
    <form action="/estudiantes" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre"
            value="{{ isset($estudiante->nombre)? $estudiante->nombre : ""}}"
            aria-describedby="emailHelp">

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Edad</label>
                <input type="text" class="form-control" id="edad" name="edad" value="{{ isset($estudiante->edad)? $estudiante->edad : ""}}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@section('js')

@endsection
@endsection
