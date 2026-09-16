@extends('layouts.vertical', ['title' => 'Dashboard'])

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">VentasFix</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-9">
                        <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Usuarios</p>
                        <h4 class="mt-1 mb-0 fw-medium">{{ $totalUsuarios }}</h4>
                    </div><!--end col-->
                    <div class="col-3 align-self-center">
                        <div class="d-flex justify-content-center align-items-center thumb-md border-dashed border-primary rounded mx-auto">
                            <i class="iconoir-group fs-22 align-self-center mb-0 text-primary"></i>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-9">
                        <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Productos</p>
                        <h4 class="mt-1 mb-0 fw-medium">{{ $totalProductos }}</h4>
                    </div><!--end col-->
                    <div class="col-3 align-self-center">
                        <div class="d-flex justify-content-center align-items-center thumb-md border-dashed border-info rounded mx-auto">
                            <i class="iconoir-shopping-bag fs-22 align-self-center mb-0 text-info"></i>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-9">
                        <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Clientes</p>
                        <h4 class="mt-1 mb-0 fw-medium">{{ $totalClientes }}</h4>
                    </div><!--end col-->
                    <div class="col-3 align-self-center">
                        <div class="d-flex justify-content-center align-items-center thumb-md border-dashed border-warning rounded mx-auto">
                            <i class="iconoir-building fs-22 align-self-center mb-0 text-warning"></i>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->
@endsection