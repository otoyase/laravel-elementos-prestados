@extends('layouts.plantilla')

@section('contenido')
    <div class="row">

        <div class="col-12 col-md-4 align-content-center">

            <a class="btn btn-primary m-1 w-100" href="/elementos/crear">Crear Nuevo Elemento</a>

        </div>

    </div>


    <hr>

    <table class="table table-striped border border-1 border-dark">

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
@endsection
