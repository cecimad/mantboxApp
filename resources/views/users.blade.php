@extends('layouts.master')

@section('title', 'Usuarios')

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
                            <button type="button" class="btn btn-light-primary text-primary font-weight-medium rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#createmodel">Crear Nuevo Usuario</button>
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
                                <th class="text-center">Email</th>
                                <th class="text-center">Email Verificado</th>
                                <th class="text-center">Roles</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td class="text-left">{{ $user['name'] }}</td>
                                <td class="text-left">{{ $user['email'] }}</td>
                                <td class="text-center">
                                    <input type="checkbox" disabled {{ $user['email_verified_at'] ? 'checked' : '' }}>
                                </td>
                                <td class="text-left">
                                    @foreach ($user['roles'] as $role)
                                    {{ $role['name'] }}
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary btn-sm edit-user-btn" data-bs-toggle="modal" data-bs-target="#editUserModal">
                                        Editar
                                    </button>
                                    <!-- <a href="{{ url('/users/edit', $user['id']) }}" class="btn btn-primary btn-sm">Editar</a> -->
                                    <form action="{{ url('/users/delete', $user['id']) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No hay users registrados.</td>
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
<div class="modal fade" id="createmodel" tabindex="-1" aria-labelledby="createmodelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createmodelLabel">Crear Nuevo Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Mensajes de error -->
                <div id="error-messages" class="alert alert-danger d-none"></div>
                <!-- Formulario -->
                <form id="createUserForm" action="{{ route('users.store') }}" method="POST">
                    @csrf
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
                    <!-- Campo para la contraseña -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <!-- Confirmar contraseña -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <!-- Selección del rol -->
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol</label>
                        <select class="form-select" id="rol" name="rol[]" multiple required>
                            <!-- Aquí puedes colocar opciones para los roles -->
                            <option value="super-admin">Super Admin</option>
                            <option value="admin">Admin</option>
                            <option value="Supervisor">Supervisor</option>
                            <option value="user">Usuario</option>
                        </select>
                    </div>
                    <!-- Botón para enviar el formulario -->
                    <button type="submit" class="btn btn-primary">Crear Usuario</button>
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
                            <option value="Supervisor">Supervisor</option>
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