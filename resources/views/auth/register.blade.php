@extends('layouts.auth', ['title' => 'Register'])

@section('content')

<div class="card">
    <div class="card-body p-0 bg-black auth-header-box rounded-top">
        <div class="text-center p-3">
            <a href="{{ route('any', 'index')}}" class="logo logo-admin">
                <img src="/images/logo-sm.png" height="50" alt="logo" class="auth-logo">
            </a>
            <h4 class="mt-3 mb-1 fw-semibold text-white fs-18">Crear cuenta</h4>
            <p class="text-muted fw-medium mb-0">Ingresa tus datos para crear tu cuenta.</p>
        </div>
    </div>
    <div class="card-body pt-0">
        <form class="my-4" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group mb-2">
                <label class="form-label" for="rut">RUT</label>
                <input type="text" class="form-control @error('rut') is-invalid @enderror" id="rut" name="rut" value="{{ old('rut') }}" placeholder="Ej: 123456789">
                @error('rut') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="nombre">Nombre</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Ingresa tu nombre">
                @error('nombre') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="apellido">Apellido</label>
                <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" value="{{ old('apellido') }}" placeholder="Ingresa tu apellido">
                @error('apellido') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="useremail">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="useremail" name="email" value="{{ old('email') }}" placeholder="usuario@ventasfix.cl">
                @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="userpassword">Contraseña</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="userpassword" placeholder="Ingresa contraseña">
                @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mb-2">
                <label class="form-label" for="password_confirmation">Confirmar contraseña</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Repite la contraseña">
            </div>

            <div class="form-group mb-0 row">
                <div class="col-12">
                    <div class="d-grid mt-3">
                        <button class="btn btn-primary" type="submit">Registrarse <i class="fas fa-sign-in-alt ms-1"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <div class="text-center">
            <p class="text-muted">¿Ya tienes cuenta? <a href="{{ route('second', ['auth', 'login'])}}" class="text-primary ms-2">Inicia sesión</a></p>
        </div>
    </div>
</div>

@endsection