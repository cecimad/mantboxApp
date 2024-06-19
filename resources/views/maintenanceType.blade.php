@extends('layouts.master')

@section('title', 'Tipos de Mantenimiento')

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
                            <button type="button" class="btn btn-light-primary text-primary font-weight-medium rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#createMaintenanceTypeModal">Crear Nuevo Tipo de Mantenimiento</button>
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
                                <th class="text-center">Descripción</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($maintenanceTypes as $maintenanceType)
                            <tr>
                                <td class="text-left">{{ $maintenanceType['type_name'] }}</td>
                                <td class="text-left">{{ $maintenanceType['description'] }}</td>
                                <td class="text-center">
                                    <!-- Botón -->
                                    <!-- Botón -->
                                    <a href="#" class="btn btn-primary btn-sm edit-maintenanceType-button" data-bs-toggle="modal" data-bs-target="#editMaintenanceTypeModal" data-id="{{ $maintenanceType['id'] }}" data-type_name="{{ $maintenanceType['type_name'] }}" data-description="{{ $maintenanceType['description'] }}">
                                        Editar
                                    </a>


                                    <form action="{{ url('/maintenanceType/delete', $maintenanceType['id']) }}" method="POST" style="display:inline;">
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
                    <div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para Crear Tipo de Mantenimiento -->
        <div class="modal fade" id="createMaintenanceTypeModal" tabindex="-1" aria-labelledby="createMaintenanceTypeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createMaintenanceTypeModalLabel">Crear Nuevo Tipo de Mantenimiento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Mensajes de error -->
                        <div id="create-error-messages" class="alert alert-danger d-none"></div>
                        <!-- Formulario -->
                        <form id="createMaintenanceTypeForm" action="{{ route('maintenanceType.store') }}" method="POST">
                            @csrf
                            <!-- Campo para el nombre del tipo -->
                            <div class="mb-3">
                                <label for="type_name" class="form-label">Nombre del Tipo de Mantenimiento</label>
                                <input type="text" class="form-control" id="type_name" name="type_name" required>
                            </div>
                            <!-- Campo para la descripción -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Descripción</label>
                                <input type="text" class="form-control" id="description" name="description" required>
                            </div>
                            <!-- Botón para enviar el formulario -->
                            <button type="submit" class="btn btn-primary">Crear Tipo de Mantenimiento</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para Editar Tipo de Mantenimiento -->
        <div class="modal fade" id="editMaintenanceTypeModal" tabindex="-1" aria-labelledby="editMaintenanceTypeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editMaintenanceTypeModalLabel">Editar Tipo de Mantenimiento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Mensajes de error -->
                        <div id="edit-error-messages" class="alert alert-danger d-none"></div>
                        <!-- Formulario -->
                        <form id="editMaintenanceTypeForm" method="POST" action="{{ route('maintenanceType.update') }}">
                            @csrf
                            @method('PUT')
                            <!-- Campo para el nombre del tipo -->
                            <div class="mb-3">
                                <label for="edit-type_name" class="form-label">Nombre del Tipo</label>
                                <input type="text" class="form-control" id="edit-type_name" name="type_name" required>
                            </div>
                            <!-- Campo para la descripción -->
                            <div class="mb-3">
                                <label for="edit-description" class="form-label">Descripción</label>
                                <input type="text" class="form-control" id="edit-description" name="description" required>
                            </div>
                            <!-- Campo oculto para el ID -->
                            <input type="hidden" name="id" id="edit-maintenance-type-id">
                            <!-- Botón para enviar el formulario -->
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        @endsection