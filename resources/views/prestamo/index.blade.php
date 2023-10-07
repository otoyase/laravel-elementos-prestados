@extends('layouts.plantilla')

@section('scripts')
    <script src="{{ asset('assets/js/tablas.js') }}"></script>
@endsection

@section('contenido')
    <div class="d-flex align-items-center justify-content-center">
        <hr class="bg-verde w-25 me-3">
        <p class="fw-bold fs-4 m-0 text-center">PRESTAMOS</p>
        <hr class="bg-verde w-25 ms-3">
    </div>

    <div class="row">

        <div class="col-12 col-md-4">
            <div class="input-group">
                <span class="input-group-text bg-secondary text-white border-1 border-black">Buscar</span>
                <input type="text" class="form-control border-1 border-black" placeholder="..." id="inpBusqueda">
            </div>
        </div>

        <div class="col-12 col-md-8">

            <a class="btn btn-primary w-100" href="/prestamos/crear">Crear Prestamo</a>

        </div>

    </div>

    <hr>

    <div class="row">

        <div class="col-12 col-md-12">

            <table class="table table-striped border border-2 border-dark" id="tabla">

                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Prestatario</th>
                        <th class="text-center">Prestamista</th>
                        <th class="text-center">Elemento Prestado</th>
                        <th class="text-center">Numero Serie Elemento</th>
                        <th class="text-center">Fecha Hora Prestamo</th>
                        <th class="text-center">Fecha Hora Devolucion</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prestamos as $prestamo)
                        <tr>

                            <td class="text-center align-middle"> {{ $prestamo->id }}</td>
                            <td class="text-center align-middle"> {{ $prestamo->prestatario }}</td>
                            <td class="text-center align-middle"> {{ $prestamo->prestamista }}</td>
                            <td class="text-center align-middle"> {{ $prestamo->elemento_prestado }}</td>
                            <td class="text-center align-middle"> {{ $prestamo->numero_serie_elemento }}</td>
                            <td class="text-center align-middle"> {{ $prestamo->fecha_hora_prestamo }}</td>
                            <td class="text-center align-middle">

                                @if ($prestamo->fecha_hora_devolucion == null)
                                    --
                                @else
                                    {{ $prestamo->fecha_hora_devolucion }}
                                @endif

                            </td>
                            <td class="text-center align-middle">

                                @switch($prestamo->estado_id)
                                    @case(3)
                                        <span class="badge text-bg-warning">{{ $prestamo->estado }}</span>
                                    @break

                                    @case(4)
                                        <span class="badge text-bg-success">{{ $prestamo->estado }}</span>
                                    @break

                                    @default
                                        <span class="badge text-bg-secondary">{{ $prestamo->estado }}</span>
                                @endswitch
                            </td>
                            <td class="text-center">
                                <div class="row justify-content-center">

                                    @if ($prestamo->estado_id != 4)
                                        <form action="/prestamos/{{ $prestamo->id }}/finalizar" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <div class="col-12"><button type="submit"
                                                    class="btn btn-success w-100">Finalizar
                                                    Prestamo</button></div>
                                        </form>
                                    @else
                                        --
                                    @endif

                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

    </div>
@endsection
