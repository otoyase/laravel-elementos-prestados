@extends('layouts.plantilla')

@section('scripts')
    <script src="{{ asset('assets/js/tablas.js') }}"></script>
@endsection

@section('contenido')
    <div class="d-flex align-items-center justify-content-center">
        <hr class="bg-verde w-25 me-3">
        <p class="fw-bold fs-4 m-0 text-center">ELEMENTOS</p>
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

            <a class="btn btn-primary w-100" href="/elementos/crear">Crear Nuevo Elemento</a>

        </div>

    </div>

    <hr>

    <div class="row">

        <div class="col-12 col-md-12">

            <table class="table table-striped border border-2 border-dark" id="tabla">

                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Tipo de Elemento</th>
                        <th class="text-center">Numero de Serie</th>
                        <th class="text-center">Observaciones</th>
                        <th class="text-center">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($elementos as $elemento)
                        <tr>

                            <td class="text-center"> {{ $elemento->id }}</td>
                            <td class="text-center"> {{ $elemento->tipo_elemento }}</td>
                            <td class="text-center"> {{ $elemento->numero_serie }}</td>
                            <td class="text-center"> {{ $elemento->observaciones }}</td>
                            <td class="text-center">

                                @switch($elemento->estado_id)
                                    @case(1)
                                        <span class="badge text-bg-warning">{{ $elemento->estado }}</span>
                                    @break

                                    @case(2)
                                        <span class="badge text-bg-success">{{ $elemento->estado }}</span>
                                    @break

                                    @default
                                        <span class="badge text-bg-secondary">{{ $elemento->estado }}</span>
                                @endswitch

                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

    </div>
@endsection
