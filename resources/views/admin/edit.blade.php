@extends('layouts.app')
@section('title','Editar Usuario')
@section('brand','Panel Admin')

@section('content')
<div class="page-header">
    <h1 class="page-title">Editar Usuario</h1>
    <p class="page-subtitle">Modificando: <strong>{{ $user->nombres }} {{ $user->apellidos }}</strong></p>
</div>

<div class="card" style="max-width:700px">
    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf @method('PUT')
        <div class="form-grid">
            <div class="form-group">
                <label class="form-label">Nombres *</label>
                <input class="form-input" type="text" name="nombres" value="{{ old('nombres',$user->nombres) }}" required>
                @error('nombres')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label class="form-label">Apellidos *</label>
                <input class="form-input" type="text" name="apellidos" value="{{ old('apellidos',$user->apellidos) }}" required>
                @error('apellidos')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label class="form-label">CI</label>
                <input class="form-input" type="text" name="ci" value="{{ old('ci',$user->ci) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Fecha de Nacimiento</label>
                <input class="form-input" type="date" name="fecha_nacimiento"
                       value="{{ old('fecha_nacimiento', $user->fecha_nacimiento) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Usuario *</label>
                <input class="form-input" type="text" name="username" value="{{ old('username',$user->username) }}" required>
                @error('username')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label class="form-label">Nueva Contraseña <span style="color:var(--text-muted);font-size:.7rem">(vacío = sin cambio)</span></label>
                <input class="form-input" type="password" name="password">
            </div>
            <div class="form-group">
                <label class="form-label">Correo *</label>
                <input class="form-input" type="email" name="correo" value="{{ old('correo',$user->correo) }}" required>
                @error('correo')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label class="form-label">Teléfono</label>
                <input class="form-input" type="text" name="telefono" value="{{ old('telefono',$user->telefono) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Ciudad</label>
                <input class="form-input" type="text" name="ciudad" value="{{ old('ciudad',$user->ciudad) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Rol *</label>
                <select class="form-select" name="rol">
                    <option value="user"  {{ old('rol',$user->rol)=='user'  ? 'selected':'' }}>Usuario</option>
                    <option value="admin" {{ old('rol',$user->rol)=='admin' ? 'selected':'' }}>Administrador</option>
                </select>
            </div>
        </div>
        <div style="display:flex;gap:.75rem;margin-top:.5rem;">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection