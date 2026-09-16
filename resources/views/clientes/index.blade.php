@extends('layouts.vertical', ['title' => 'Clientes'])

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
            <h4 class="page-title">Clientes</h4>
            <div class="">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">VentasFix</a></li>
                    <li class="breadcrumb-item active">Clientes</li>
                </ol>
            </div>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Listado de Clientes</h4>
                    </div><!--end col-->
                    <div class="col-auto">
                        <a href="{{ route('clientes.create') }}" class="btn bg-primary text-white">
                            <i class="fas fa-plus me-1"></i> Agregar Cliente
                        </a>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>RUT Empresa</th>
                                <th>Razón Social</th>
                                <th>Rubro</th>
                                <th>Teléfono</th>
                                <th>Contacto</th>
                                <th>Email Contacto</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->rut_empresa }}</td>
                                <td>{{ $cliente->razon_social }}</td>
                                <td>{{ $cliente->rubro }}</td>
                                <td>{{ $cliente->telefono }}</td>
                                <td>{{ $cliente->nombre_contacto }}</td>
                                <td>{{ $cliente->email_contacto }}</td>
                                <td class="text-end">
                                    <a href="{{ route('clientes.edit', $cliente->id) }}" title="Editar">
                                        <i class="las la-pen text-secondary fs-18"></i>
                                    </a>
                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este cliente?');">
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
                                <td colspan="7" class="text-center text-muted">No hay clientes registrados.</td>
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