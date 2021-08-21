@extends('layout.base')
@section('css')

@endsection

@section('contenido')
    <!--Mensaje Creado -->
    <div class="container">
        @if (session('estudianteGuardado'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('estudianteGuardado') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif
        <!--Mensaje Modificado-->
        @if (session('estudianteModificado'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('estudianteModificado') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif
        <!--Mensaje Eliminado -->
        @if (session('estudianteEliminado'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('estudianteEliminado') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif
        <div class="container col-md-2">
            <div class="text-center justify-content-center">
                <a href="estudiantes/create" class="btn btn-success">Nuevo Registro</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estudiantes as $estudiante)

                    <tr>
                        <td scope="col">{{ $estudiante->id }}</td>
                        <td scope="col">{{ $estudiante->nombre }}</td>
                        <td scope="col">{{ $estudiante->edad }}</td>
                        <td scope="col">
                            <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST">
                                <a href="/estudiantes/{{ $estudiante->id }}/edit" class="btn btn-secondary">editar</a>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Desea Eliminar?')">borrar</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
@section('js')
@endsection
@endsection
