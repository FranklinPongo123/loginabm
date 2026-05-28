@extends('layouts.app')
@section('title','Nuevo Usuario')
@section('brand','Panel Admin')

@section('content')
<div class="page-header">
    <h1 class="page-title">Nuevo Usuario</h1>
    <p class="page-subtitle">Completa los datos para registrar una cuenta</p>
</div>

<div class="card" style="max-width:700px">
    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label class="form-label">Nombres *</label>
                <input class="form-input" type="text" name="nombres" value="{{ old('nombres') }}" required>
                @error('nombres')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label class="form-label">Apellidos *</label>
                <input class="form-input" type="text" name="apellidos" value="{{ old('apellidos') }}" required>
                @error('apellidos')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label class="form-label">CI</label>
                <input class="form-input" type="text" name="ci" value="{{ old('ci') }}">
            </div>
            <div class="form-group">
                <label class="form-label">Fecha de Nacimiento</label>
                <input class="form-input" type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
            </div>
            <div class="form-group">
                <label class="form-label">Usuario *</label>
                <input class="form-input" type="text" name="username" value="{{ old('username') }}" required>
                @error('username')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label class="form-label">Contraseña *</label>
                <input class="form-input" type="password" name="password" required>
                @error('password')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label class="form-label">Correo *</label>
                <input class="form-input" type="email" name="correo" value="{{ old('correo') }}" required>
                @error('correo')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label class="form-label">Teléfono</label>
                <input class="form-input" type="text" name="telefono" value="{{ old('telefono') }}">
            </div>
            <div class="form-group">
                <label class="form-label">Ciudad</label>
                <input class="form-input" type="text" name="ciudad" value="{{ old('ciudad') }}">
            </div>
            <div class="form-group">
                <label class="form-label">Rol *</label>
                <select class="form-select" name="rol">
                    <option value="user"  {{ old('rol','user')=='user'  ? 'selected':'' }}>Usuario</option>
                    <option value="admin" {{ old('rol')=='admin' ? 'selected':'' }}>Administrador</option>
                </select>
            </div>
        </div>
        <div style="display:flex;gap:.75rem;margin-top:.5rem;">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection