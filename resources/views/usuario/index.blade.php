@extends('layouts.plantilla')

@section('scripts')
    <script src="{{ asset('assets/js/tablas.js') }}"></script>
@endsection

@section('contenido')
    <div class="d-flex align-items-center justify-content-center">
        <hr class="bg-verde w-25 me-3">
        <p class="fw-bold fs-4 m-0 text-center">USUARIOS</p>
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

            <a class="btn btn-primary w-100" href="/usuarios/crear">Crear Usuario</a>

        </div>

    </div>

    <hr>

    <div class="row">

        <div class="col-12">

            <table class="table table-striped border border-1 border-dark" id="tabla">

                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nombres</th>
                        <th class="text-center">Numero Documento</th>
                        <th class="text-center">Tipo de Usuario</th>
                        <th class="text-center">Correo Electronico</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>

                            <td class="text-center align-middle"> {{ $usuario->id }}</td>
                            <td class="text-center align-middle"> {{ $usuario->nombres }}</td>
                            <td class="text-center align-middle"> {{ $usuario->numero_documento }}</td>
                            <td class="text-center align-middle"> {{ $usuario->tipo_usuario }}</td>
                            <td class="text-center align-middle"> {{ $usuario->email }}</td>
                            <td class="text-center">
                                <div class="row justify-content-center">

                                    <div class="col-12">
                                        @if ($usuario->tipo_usuario_id == 1)
                                            <a class="btn btn-primary m-1 w-100"
                                                href="/usuarios/{{ $usuario->id }}/prestamos">Historial
                                                Prestamos</a>
                                        @else
                                            --
                                        @endif
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

    </div>
@endsection
