@extends('layouts.master')

@section('title', 'Empresas')

@section('breadcrumb')
@endsection

@section('content')
<div class="container-fluid">
    <!-- Column -->
    <div class="col-lg-12 col-xl-9 col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center mb-4">
                    <h4 class="card-title"> </h4>
                    <div class="ms-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light-primary text-primary font-weight-medium rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#createCompanyModal">Crear Nueva Empresa</button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <table id="file_export" class="table table-bordered nowrap display">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Domicilio</th>
                                <th class="text-center">Teléfono</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($companies as $company)
                            <tr>
                                <td class="text-left">{{ $company['name'] }}</td>
                                <td class="text-left">{{ $company['address'] }}</td>
                                <td class="text-left">{{ $company['phone'] }}</td>
                                <td class="text-center">
                                    <form action="{{ url('/empresas/select', $company['id']) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-success btn-sm">Seleccionar Empresa</button>
                                    </form>


                                    <!-- <a href="{{ url('/empresas/update', $company['id']) }}" class="btn btn-primary btn-sm">Editar</a> -->
                                    <a href="#" class="btn btn-primary btn-sm edit-company-button" data-bs-toggle="modal" data-bs-target="#editCompanyModal" data-id="{{ $company['id'] }}" data-name="{{ $company['name'] }}" data-address="{{ $company['address'] }}" data-phone="{{ $company['phone'] }}">
                                        Editar
                                    </a>
                                    <form action="{{ url('/empresas/delete', $company['id']) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No hay empresas registradas.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createCompanyModal" tabindex="-1" aria-labelledby="createCompanyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCompanyModalLabel">Crear Nueva Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Mensajes de error -->
                <div id="error-messages" class="alert alert-danger d-none"></div>
                <!-- Formulario -->
                <form id="createCompanyForm" action="{{ route('empresas.store') }}" method="POST">
                    @csrf
                    <!-- Campo para el nombre -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <!-- Campo para la dirección -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <!-- Campo para el teléfono -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <!-- Botón para enviar el formulario -->
                    <button type="submit" class="btn btn-primary">Crear Empresa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editCompanyModal" tabindex="-1" aria-labelledby="editCompanyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCompanyModalLabel">Editar Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Mensajes de error -->
                <div id="edit-error-messages" class="alert alert-danger d-none"></div>
                <!-- Formulario -->
                <form id="editCompanyForm" method="POST" action="{{ route('empresas.update') }}">
                    @csrf
                    @method('POST')
                    <!-- Campo para el nombre -->
                    <div class="mb-3">
                        <label for="edit-name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="edit-name" name="name" required>
                    </div>
                    <!-- Campo para la dirección -->
                    <div class="mb-3">
                        <label for="edit-address" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="edit-address" name="address" required>
                    </div>
                    <!-- Campo para el teléfono -->
                    <div class="mb-3">
                        <label for="edit-phone" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="edit-phone" name="phone" required>
                    </div>
                    <!-- Campo oculto para el ID -->
                    <input type="hidden" name="id" id="edit-company-id">
                    <!-- Botón para enviar el formulario -->
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection