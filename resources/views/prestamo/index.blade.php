@extends('layouts.plantilla')

@section('contenido')
    <div class="row">

        <div class="col-12 col-md-4 align-content-center">

            <a class="btn btn-primary m-1 w-100" href="/prestamos/crear">Crear Prestamo</a>

        </div>

    </div>

    <hr>

    <div class="row">

        <div class="col-12">

            <table class="table table-striped border border-1 border-dark m-1">
        
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

                                    @if($prestamo->estado_id != 4)
                                    <form action="/prestamos/{{ $prestamo->id }}/finalizar" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <div class="col-12"><button type="submit" class="btn btn-success w-100">Finalizar
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
