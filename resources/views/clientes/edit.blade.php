@extends('layouts.vertical', ['title' => 'Editar Cliente'])

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
            <h4 class="page-title">Editar Cliente</h4>
            <div class="">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">VentasFix</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Clientes</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Datos del Cliente</h4>
            </div><!--end card-header-->
            <div class="card-body">
                <form method="POST" action="{{ route('clientes.update', $cliente->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="rut_empresa">RUT Empresa</label>
                            <input type="text" class="form-control @error('rut_empresa') is-invalid @enderror" id="rut_empresa" name="rut_empresa" value="{{ old('rut_empresa', $cliente->rut_empresa) }}">
                            @error('rut_empresa') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div><!--end col-->

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="razon_social">Razón Social</label>
                            <input type="text" class="form-control @error('razon_social') is-invalid @enderror" id="razon_social" name="razon_social" value="{{ old('razon_social', $cliente->razon_social) }}">
                            @error('razon_social') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="rubro">Rubro</label>
                            <input type="text" class="form-control @error('rubro') is-invalid @enderror" id="rubro" name="rubro" value="{{ old('rubro', $cliente->rubro) }}">
                            @error('rubro') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div><!--end col-->

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="telefono">Teléfono</label>
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono', $cliente->telefono) }}">
                            @error('telefono') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="mb-3">
                        <label class="form-label" for="direccion">Dirección</label>
                        <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" value="{{ old('direccion', $cliente->direccion) }}">
                        @error('direccion') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="nombre_contacto">Nombre de Contacto</label>
                            <input type="text" class="form-control @error('nombre_contacto') is-invalid @enderror" id="nombre_contacto" name="nombre_contacto" value="{{ old('nombre_contacto', $cliente->nombre_contacto) }}">
                            @error('nombre_contacto') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div><!--end col-->

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="email_contacto">Email de Contacto</label>
                            <input type="email" class="form-control @error('email_contacto') is-invalid @enderror" id="email_contacto" name="email_contacto" value="{{ old('email_contacto', $cliente->email_contacto) }}">
                            @error('email_contacto') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="d-flex justify-content-end gap-2 mt-3">
                        <a href="{{ route('clientes.index') }}" class="btn btn-light">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
                    </div>
                </form>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->

@endsection