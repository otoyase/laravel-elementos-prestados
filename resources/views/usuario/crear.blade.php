@extends('layouts.plantilla')

@section('contenido')
    <div class="d-flex align-items-center justify-content-center mt-2 mb-2">
        <hr class="bg-verde w-25 me-3">
        <p class="fw-bold fs-4 m-0 text-center">Crear Nuevo Usuario</p>
        <hr class="bg-verde w-25 ms-3">
    </div>

    <form action="/usuarios" method="POST">

        @csrf
        <div class="mb-3">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="nombres" name="nombres"
                placeholder="Ingrese el numero de serie del elemento." required>
        </div>
        <div class="mb-3">
            <label for="numero_documento" class="form-label">Numero de Documento</label>
            <input type="number" class="form-control" id="numero_documento" name="numero_documento"
                placeholder="Ingrese el numero de serie del elemento." required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electronico</label>
            <input type="email" class="form-control" id="email" name="email"
                placeholder="Ingrese el numero de serie del elemento." required>
        </div>
        <div class="mb-3">
            <label for="tipo_usuario" class="form-label">Tipo de Usuario</label>
            <select id="tipo_usuario" name="tipo_usuario" class="form-select" aria-label="tipo_usuario" required>
                <option value="" selected>---</option>
                @foreach ($tipos_usuarios as $tipo_usuario)
                    <option value="{{ $tipo_usuario->id }}"> {{ $tipo_usuario->tipo_usuario }} </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Crear</button>

    </form>
@endsection
