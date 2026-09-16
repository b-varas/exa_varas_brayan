@extends('layouts.vertical', ['title' => 'Usuarios'])

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
            <h4 class="page-title">Usuarios</h4>
            <div class="">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">VentasFix</a></li>
                    <li class="breadcrumb-item active">Usuarios</li>
                </ol>
            </div>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Listado de Usuarios</h4>
                    </div><!--end col-->
                    <div class="col-auto">
                        <a href="{{ route('usuarios.create') }}" class="btn bg-primary text-white">
                            <i class="fas fa-plus me-1"></i> Agregar Usuario
                        </a>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>RUT</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->rut }}</td>
                                <td>{{ $usuario->nombre }}</td>
                                <td>{{ $usuario->apellido }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td class="text-end">
                                    <a href="{{ route('usuarios.edit', $usuario->id) }}" title="Editar">
                                        <i class="las la-pen text-secondary fs-18"></i>
                                    </a>
                                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este usuario?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link p-0 border-0" title="Eliminar">
                                            <i class="las la-trash-alt text-secondary fs-18"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No hay usuarios registrados.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- end col -->
</div><!-- end row -->

@endsection