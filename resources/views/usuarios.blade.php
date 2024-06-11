@extends('layouts.master')

@section('title', 'Usuarios')

@section('breadcrumb')
@endsection

@section('content')
<div class="container">
    <h1>Usuarios</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <table class="table table-striped table-bordered">
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
            @foreach ($data['data']['users'] as $user)
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
                            <a href="{{ url('/usuarios/edit', $user['id']) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ url('/usuarios/delete', $user['id']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection