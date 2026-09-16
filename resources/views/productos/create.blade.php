@extends('layouts.vertical', ['title' => 'Agregar Producto'])

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
            <h4 class="page-title">Agregar Producto</h4>
            <div class="">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">VentasFix</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('productos.index') }}">Productos</a></li>
                    <li class="breadcrumb-item active">Agregar</li>
                </ol>
            </div>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Datos del Producto</h4>
            </div><!--end card-header-->
            <div class="card-body">
                <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="sku">SKU</label>
                            <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" value="{{ old('sku') }}">
                            @error('sku') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div><!--end col-->

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="nombre">Nombre</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}">
                            @error('nombre') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="mb-3">
                        <label class="form-label" for="descripcion_corta">Descripción Corta</label>
                        <input type="text" class="form-control @error('descripcion_corta') is-invalid @enderror" id="descripcion_corta" name="descripcion_corta" value="{{ old('descripcion_corta') }}">
                        @error('descripcion_corta') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="descripcion_larga">Descripción Larga</label>
                        <textarea class="form-control @error('descripcion_larga') is-invalid @enderror" id="descripcion_larga" name="descripcion_larga" rows="4">{{ old('descripcion_larga') }}</textarea>
                        @error('descripcion_larga') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="imagen">Imagen del Producto</label>
                        <input type="file" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen" accept="image/*">
                        @error('imagen') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="precio_neto">Precio Neto</label>
                            <input type="number" step="0.01" min="0" class="form-control @error('precio_neto') is-invalid @enderror" id="precio_neto" name="precio_neto" value="{{ old('precio_neto') }}">
                            @error('precio_neto') <span class="text-danger small">{{ $message }}</span> @enderror
                            <small class="text-muted">El precio de venta (con 19% IVA) se calcula automáticamente.</small>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="stock_actual">Stock Actual</label>
                            <input type="number" min="0" class="form-control @error('stock_actual') is-invalid @enderror" id="stock_actual" name="stock_actual" value="{{ old('stock_actual', 0) }}">
                            @error('stock_actual') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div><!--end col-->

                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="stock_minimo">Stock Mínimo</label>
                            <input type="number" min="0" class="form-control @error('stock_minimo') is-invalid @enderror" id="stock_minimo" name="stock_minimo" value="{{ old('stock_minimo', 0) }}">
                            @error('stock_minimo') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div><!--end col-->

                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="stock_bajo">Stock Bajo</label>
                            <input type="number" min="0" class="form-control @error('stock_bajo') is-invalid @enderror" id="stock_bajo" name="stock_bajo" value="{{ old('stock_bajo', 0) }}">
                            @error('stock_bajo') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div><!--end col-->

                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="stock_alto">Stock Alto</label>
                            <input type="number" min="0" class="form-control @error('stock_alto') is-invalid @enderror" id="stock_alto" name="stock_alto" value="{{ old('stock_alto', 0) }}">
                            @error('stock_alto') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="d-flex justify-content-end gap-2 mt-3">
                        <a href="{{ route('productos.index') }}" class="btn btn-light">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar Producto</button>
                    </div>
                </form>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->

@endsection