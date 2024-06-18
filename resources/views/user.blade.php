<h1>Nuevo Usuario</h1>

<!-- Mensajes de error -->
@if ($errors->any())
    <div id="error-messages" class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('usuarios.store') }}" method="POST">
    @csrf
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password">
    <label for="password_confirmation">Confirmar Contraseña</label>
    <input type="password" name="password_confirmation" id="password_confirmation">
    <label for="rol" class="form-label">Rol</label>
    <select class="form-select" id="rol" name="rol[]" multiple required>
        <!-- Aquí puedes colocar opciones para los roles -->
        <option value="super-admin">Super Admin</option>
        <option value="admin">Admin</option>
        <option value="Supervisor">Supervisor</option>
        <option value="user">Usuario</option>
    </select>
    <button type="submit">Guardar</button>
</form>