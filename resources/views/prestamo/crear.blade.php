@extends('layouts.plantilla')

@section('contenido')

    <div class="d-flex align-items-center justify-content-center mt-2 mb-2">
        <hr class="bg-verde w-25 me-3">
        <p class="fw-bold fs-4 m-0 text-center">Crear Prestamo</p>
        <hr class="bg-verde w-25 ms-3">
    </div>

    <form action="/prestamos" method="POST">
        @csrf
        <div class="mb-3">
            <label for="prestatario" class="form-label">Prestatario</label>
            <select id="prestatario" name="prestatario" class="form-select" aria-label="prestatario" required>
                <option value="" selected>---</option>
                @foreach ($prestatarios as $prestatario)
                    <option value="{{ $prestatario->id }}"> {{ $prestatario->nombres }} </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="prestamista" class="form-label">Prestamista</label>
            <select id="prestamista" name="prestamista" class="form-select" aria-label="prestatario" required>
                <option value="" selected>---</option>
                @foreach ($prestamistas as $prestamista)
                    <option value="{{ $prestamista->id }}"> {{ $prestamista->nombres }} </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="elemento-disponible" class="form-label">Elementos Disponibles</label>
            <select id="elemento_disponible" name="elemento_disponible" class="form-select" aria-label="elemento-disponible"
                required>
                <option value="" selected>---</option>
                @foreach ($elementos_disponibles as $elemento_disponible)
                    <option value="{{ $elemento_disponible->id }}"> {{ $elemento_disponible->elemento_disponible }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Crear</button>
    </form>
@endsection
