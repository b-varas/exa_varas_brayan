@extends('layouts.vertical', ['title' => 'Productos'])

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
            <h4 class="page-title">Productos</h4>
            <div class="">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">VentasFix</a></li>
                    <li class="breadcrumb-item active">Productos</li>
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
                        <h4 class="card-title">Listado de Productos</h4>
                    </div><!--end col-->
                    <div class="col-auto">
                        <a href="{{ route('productos.create') }}" class="btn bg-primary text-white">
                            <i class="fas fa-plus me-1"></i> Agregar Producto
                        </a>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Imagen</th>
                                <th>SKU</th>
                                <th>Nombre</th>
                                <th>Precio Neto</th>
                                <th>Precio Venta (c/IVA)</th>
                                <th>Stock Actual</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($productos as $producto)
                            <tr>
                                <td>
                                    @if ($producto->imagen)
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="thumb-md rounded">
                                    @else
                                    <span class="text-muted">Sin imagen</span>
                                    @endif
                                </td>
                                <td>{{ $producto->sku }}</td>
                                <td>{{ $producto->nombre }}</td>
                                <td>${{ number_format($producto->precio_neto, 0, ',', '.') }}</td>
                                <td>${{ number_format($producto->precio_venta, 0, ',', '.') }}</td>
                                <td>
                                    @if ($producto->stock_actual <= $producto->stock_minimo)
                                        <span class="badge rounded text-danger bg-danger-subtle">{{ $producto->stock_actual }}</span>
                                        @else
                                        <span class="badge rounded text-success bg-success-subtle">{{ $producto->stock_actual }}</span>
                                        @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('productos.edit', $producto->id) }}" title="Editar">
                                        <i class="las la-pen text-secondary fs-18"></i>
                                    </a>
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este producto?');">
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
                                <td colspan="7" class="text-center text-muted">No hay productos registrados.</td>
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