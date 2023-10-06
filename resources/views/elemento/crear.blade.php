@extends('layouts.plantilla')

@section('contenido')
    <div class="d-flex align-items-center justify-content-center mt-2 mb-2">
        <hr class="bg-verde w-25 me-3">
        <p class="fw-bold fs-4 m-0 text-center">Crear Nuevo Elemento</p>
        <hr class="bg-verde w-25 ms-3">
    </div>

    <form action="/elementos" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tipo_elemento" class="form-label">Tipo de Elemento</label>
            <select id="tipo_elemento" name="tipo_elemento" class="form-select" aria-label="tipo_elemento" required>
                <option value="" selected>---</option>
                @foreach ($tipos_elementos as $tipo_elemento)
                    <option value="{{ $tipo_elemento->id }}"> {{ $tipo_elemento->tipo_elemento }} </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="numero_serie" class="form-label">Numero de Serie</label>
            <input type="text" class="form-control" id="numero_serie" name="numero_serie"
                placeholder="Ingrese el numero de serie del elemento." required>
        </div>

        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <textarea class="form-control" id="observaciones" name="observaciones"
                placeholder="Cualquier dato adicional que sea relevante para el elemento puede ingresarlo aqui." rows="3"
                required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Crear</button>
    </form>
@endsection
