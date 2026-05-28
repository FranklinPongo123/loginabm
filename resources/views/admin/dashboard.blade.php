@extends('layouts.app')
@section('title','Panel Administrador')
@section('brand','Panel Admin')

@push('styles')
<style>
.stats-row{display:grid;grid-template-columns:repeat(auto-fit,minmax(150px,1fr));gap:1rem;margin-bottom:2rem;}
.stat-card{background:var(--surface);border:1px solid var(--border);border-radius:14px;padding:1.25rem;position:relative;overflow:hidden;}
.stat-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;border-radius:14px 14px 0 0;}
.stat-card.c1::before{background:var(--accent);}
.stat-card.c2::before{background:var(--accent3);}
.stat-card.c3::before{background:var(--warning);}
.stat-value{font-family:'Syne',sans-serif;font-size:2rem;font-weight:800;}
.stat-label{font-size:.75rem;color:var(--text-muted);margin-top:.2rem;}
.toolbar{display:flex;gap:1rem;align-items:center;flex-wrap:wrap;margin-bottom:1.5rem;}
.search-wrap{flex:1;min-width:220px;position:relative;}
.search-wrap input{width:100%;background:var(--surface);border:1px solid var(--border);
    border-radius:10px;padding:.7rem 1rem .7rem 2.4rem;color:var(--text);
    font-family:'DM Sans',sans-serif;font-size:.875rem;outline:none;transition:border-color .2s;}
.search-wrap input:focus{border-color:var(--accent);}
.search-wrap::before{content:'🔍';position:absolute;left:.75rem;top:50%;transform:translateY(-50%);pointer-events:none;font-size:.8rem;}
.table-wrap{background:var(--surface);border:1px solid var(--border);border-radius:16px;overflow:hidden;}
table{width:100%;border-collapse:collapse;}
thead{background:var(--surface2);}
th{text-align:left;padding:1rem 1.1rem;font-size:.68rem;font-weight:600;
   text-transform:uppercase;letter-spacing:.1em;color:var(--text-muted);}
tbody tr{border-top:1px solid var(--border);transition:background .15s;}
tbody tr:hover{background:rgba(255,255,255,.02);}
td{padding:.85rem 1.1rem;font-size:.875rem;vertical-align:middle;}
.role-badge{display:inline-flex;align-items:center;gap:.3rem;padding:.28rem .65rem;
    border-radius:100px;font-size:.7rem;font-weight:600;}
.role-badge.admin{background:rgba(108,99,255,.12);color:var(--accent);border:1px solid rgba(108,99,255,.25);}
.role-badge.user{background:rgba(67,233,123,.12);color:var(--accent3);border:1px solid rgba(67,233,123,.25);}
.action-btns{display:flex;gap:.4rem;}
.action-btns .btn{padding:.32rem .7rem;font-size:.76rem;}
.empty{text-align:center;padding:3rem;color:var(--text-muted);}
</style>
@endpush

@section('content')
<div class="page-header">
    <h1 class="page-title">Gestión de Usuarios</h1>
    <p class="page-subtitle">ABM — Alta, Baja y Modificación de usuarios</p>
</div>

<div class="stats-row">
    <div class="stat-card c1"><div class="stat-value">{{ $totals['total'] }}</div><div class="stat-label">Total</div></div>
    <div class="stat-card c2"><div class="stat-value">{{ $totals['users'] }}</div><div class="stat-label">Usuarios</div></div>
    <div class="stat-card c3"><div class="stat-value">{{ $totals['admins'] }}</div><div class="stat-label">Administradores</div></div>
</div>

<div class="toolbar">
    <form method="GET" action="{{ route('admin.dashboard') }}" class="search-wrap" style="display:flex;gap:.5rem;">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar por nombre, CI, usuario...">
    </form>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">+ Nuevo Usuario</a>
</div>

<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>#</th><th>CI</th><th>Nombres</th><th>Apellidos</th>
                <th>Usuario</th><th>Correo</th><th>Ciudad</th><th>Rol</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @forelse($users as $i => $u)
            <tr>
                <td style="color:var(--text-muted)">{{ $i+1 }}</td>
                <td>{{ $u->ci ?? '—' }}</td>
                <td>{{ $u->nombres }}</td>
                <td>{{ $u->apellidos }}</td>
                <td><strong>{{ $u->username }}</strong></td>
                <td style="color:var(--text-muted)">{{ $u->correo }}</td>
                <td>{{ $u->ciudad ?? '—' }}</td>
                <td><span class="role-badge {{ $u->rol }}">{{ $u->rol === 'admin' ? 'Admin' : 'Usuario' }}</span></td>
                <td>
                    <div class="action-btns">
                        <a href="{{ route('admin.users.edit', $u->id) }}" class="btn btn-warning">✏️ Editar</a>
                        <form method="POST" action="{{ route('admin.users.destroy', $u->id) }}"
                              onsubmit="return confirm('¿Eliminar a {{ $u->nombres }} {{ $u->apellidos }}?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger">🗑️ Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr><td colspan="9" class="empty">No se encontraron usuarios.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection