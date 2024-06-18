@extends('layouts.master')

@section('title', 'Equipos')

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
                            <button type="button" class="btn btn-light-primary text-primary font-weight-medium rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#createEquipmentModal">Crear Nuevo Equipo</button>
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
                                <th class="text-center">Código</th>
                                <th class="text-center">Descripción</th>
                                <th class="text-center">Fecha Instalación</th>
                                <th class="text-center">Ubicación</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($equipments as $equipment)
                            <tr>
                                <td class="text-left">{{ $equipment['name'] }}</td>
                                <td class="text-left">{{ $equipment['code'] }}</td>
                                <td class="text-left">{{ $equipment['description'] }}</td>
                                <td class="text-left">{{ $equipment['installation_date'] }}</td>
                                <td class="text-left">{{ $equipment['location'] }}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-primary btn-sm edit-equipment-button" data-bs-toggle="modal" data-bs-target="#editEquipmentModal" data-id="{{ $equipment['id'] }}" data-name="{{ $equipment['name'] }}" data-code="{{ $equipment['code'] }}" data-description="{{ $equipment['description'] }}" data-installation-date="{{ $equipment['installation_date'] }}" data-location="{{ $equipment['location'] }}">
                                        Editar
                                    </a>
                                    <form action="{{ url('/equipos/delete', $equipment['id']) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No hay equipos registrados.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal para Crear Nuevo Equipo -->
<div class="modal fade" id="createEquipmentModal" tabindex="-1" aria-labelledby="createEquipmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createEquipmentModalLabel">Crear Nuevo Equipo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Mensajes de error -->
                <div id="equipment-error-messages" class="alert alert-danger d-none"></div>
                <!-- Formulario -->
                <form id="createEquipmentForm" action="{{ route('equipos.store') }}" method="POST">
                    @csrf
                    <!-- Campo para el nombre -->
                    <div class="mb-3">
                        <label for="equipment-name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="equipment-name" name="name" required>
                    </div>
                    <!-- Campo para el código -->
                    <div class="mb-3">
                        <label for="equipment-code" class="form-label">Código</label>
                        <input type="text" class="form-control" id="equipment-code" name="code" required>
                    </div>
                    <!-- Campo para la descripción -->
                    <div class="mb-3">
                        <label for="equipment-description" class="form-label">Descripción</label>
                        <textarea class="form-control" id="equipment-description" name="description" required></textarea>
                    </div>
                    <!-- Campo para la fecha de instalación -->
                    <div class="mb-3">
                        <label for="installation-date" class="form-label">Fecha de Instalación</label>
                        <input type="date" class="form-control" id="installation-date" name="installation_date" required>
                    </div>
                    <!-- Campo para la ubicación -->
                    <div class="mb-3">
                        <label for="equipment-location" class="form-label">Ubicación</label>
                        <input type="text" class="form-control" id="equipment-location" name="location" required>
                    </div>
                    <!-- Botón para enviar el formulario -->
                    <button type="submit" class="btn btn-primary">Crear Equipo</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Editar Equipo -->
<div class="modal fade" id="editEquipmentModal" tabindex="-1" aria-labelledby="editEquipmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEquipmentModalLabel">Editar Equipo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Mensajes de error -->
                <div id="edit-equipment-error-messages" class="alert alert-danger d-none"></div>
                <!-- Formulario -->
                <form id="editEquipmentForm" method="POST" action="{{ route('equipos.update') }}">
                    @csrf
                    @method('POST')
                    <!-- Campo para el nombre -->
                    <div class="mb-3">
                        <label for="edit-equipment-name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="edit-equipment-name" name="name" required>
                    </div>
                    <!-- Campo para el código -->
                    <div class="mb-3">
                        <label for="edit-equipment-code" class="form-label">Código</label>
                        <input type="text" class="form-control" id="edit-equipment-code" name="code" required>
                    </div>
                    <!-- Campo para la descripción -->
                    <div class="mb-3">
                        <label for="edit-equipment-description" class="form-label">Descripción</label>
                        <textarea class="form-control" id="edit-equipment-description" name="description" required></textarea>
                    </div>
                    <!-- Campo para la fecha de instalación -->
                    <div class="mb-3">
                        <label for="edit-installation-date" class="form-label">Fecha de Instalación</label>
                        <input type="date" class="form-control" id="edit-installation-date" name="installation_date" required>
                    </div>
                    <!-- Campo para la ubicación -->
                    <div class="mb-3">
                        <label for="edit-equipment-location" class="form-label">Ubicación</label>
                        <input type="text" class="form-control" id="edit-equipment-location" name="location" required>
                    </div>
                    <!-- Campo oculto para el ID -->
                    <input type="hidden" name="id" id="edit-equipment-id">
                    <!-- Botón para enviar el formulario -->
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection