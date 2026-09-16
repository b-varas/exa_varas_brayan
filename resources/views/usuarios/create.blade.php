@extends('layouts.vertical', ['title' => 'Agregar Usuario'])

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
            <h4 class="page-title">Agregar Usuario</h4>
            <div class="">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">VentasFix</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
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
                <h4 class="card-title">Datos del Usuario</h4>
            </div><!--end card-header-->
            <div class="card-body">
                <form method="POST" action="{{ route('usuarios.store') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="rut">RUT</label>
                            <input type="text" class="form-control @error('rut') is-invalid @enderror" id="rut" name="rut" value="{{ old('rut') }}" placeholder="Ej: 123456789">
                            @error('rut') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div><!--end col-->

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="usuario@ventasfix.cl">
                            @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="nombre">Nombre</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Ingresa el nombre">
                            @error('nombre') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div><!--end col-->

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="apellido">Apellido</label>
                            <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" value="{{ old('apellido') }}" placeholder="Ingresa el apellido">
                            @error('apellido') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="password">Contraseña</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Mínimo 8 caracteres">
                            @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div><!--end col-->

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="password_confirmation">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Repite la contraseña">
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="d-flex justify-content-end gap-2 mt-3">
                        <a href="{{ route('usuarios.index') }}" class="btn btn-light">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                    </div>
                </form>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->

@endsection