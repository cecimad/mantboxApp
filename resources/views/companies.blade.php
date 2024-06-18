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
                                    <form action="{{ url('/companies/select', $company['id']) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-success btn-sm">Seleccionar Empresa</button>
                                    </form>


                                    <!-- <a href="{{ url('/companies/update', $company['id']) }}" class="btn btn-primary btn-sm">Editar</a> -->
                                    <a href="#" class="btn btn-primary btn-sm edit-user-button" data-bs-toggle="modal" data-bs-target="#editUserModal" data-id="{{ $user['id'] }}" data-name="{{ $user['name'] }}" data-email="{{ $user['email'] }}" data-roles="{{ implode(',', $user['roles']) }}">
                                        Editar
                                    </a>
                                    <form action="{{ url('/companies/delete', $company['id']) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No hay companies registradas.</td>
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
                <form id="createCompanyForm" action="{{ route('companies.store') }}" method="POST">
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

<!-- Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Editar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Mensajes de error -->
                <div id="error-messages" class="alert alert-danger d-none"></div>
                <!-- Formulario -->
                <form id="editUserForm" action="{{ route('users.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Campo para el nombre -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <!-- Campo para el email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <!-- Campo para la nueva contraseña (opcional) -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Nueva Contraseña (opcional)</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <!-- Confirmar nueva contraseña -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Nueva Contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                    <!-- Selección del rol -->
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol</label>
                        <select class="form-select" id="rol" name="rol[]" multiple required>
                            <!-- Aquí puedes colocar opciones para los roles y marcar los seleccionados -->
                            <option value="super-admin">Super Admin</option>
                            <option value="admin">Admin</option>
                            <option value="supervisor">Supervisor</option>
                            <option value="user">Usuario</option>
                        </select>
                    </div>
                    <!-- Botón para enviar el formulario -->
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection