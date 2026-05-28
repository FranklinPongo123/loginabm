@extends('layouts.app')
@section('title','Mi Perfil')
@section('brand','Mi Portal')

@push('styles')
<style>
.profile-grid{display:grid;grid-template-columns:280px 1fr;gap:2rem;align-items:start;}
@media(max-width:720px){.profile-grid{grid-template-columns:1fr;}}
.profile-card{background:var(--surface);border:1px solid var(--border);border-radius:20px;
    padding:2rem;text-align:center;position:relative;overflow:hidden;}
.profile-card::before{content:'';position:absolute;top:0;left:0;right:0;height:80px;
    background:linear-gradient(135deg,rgba(67,233,123,.15),rgba(108,99,255,.1));}
.p-avatar{width:86px;height:86px;border-radius:50%;margin:0 auto 1rem;
    display:flex;align-items:center;justify-content:center;
    font-family:'Syne',sans-serif;font-weight:800;font-size:1.8rem;
    background:linear-gradient(135deg,rgba(67,233,123,.25),rgba(108,99,255,.2));
    border:3px solid rgba(67,233,123,.4);position:relative;z-index:1;
    box-shadow:0 0 28px rgba(67,233,123,.2);}
.p-name{font-family:'Syne',sans-serif;font-weight:800;font-size:1.15rem;margin-bottom:.2rem;}
.p-user{font-size:.82rem;color:var(--text-muted);margin-bottom:1rem;}
.role-badge{display:inline-flex;align-items:center;gap:.3rem;padding:.28rem .65rem;
    border-radius:100px;font-size:.7rem;font-weight:600;
    background:rgba(67,233,123,.12);color:#43e97b;border:1px solid rgba(67,233,123,.25);}
.divider{height:1px;background:var(--border);margin:1.25rem 0;}
.side-row{display:flex;justify-content:space-between;padding:.4rem 0;
    border-bottom:1px solid rgba(255,255,255,.04);font-size:.82rem;}
.side-row:last-child{border-bottom:none;}
.side-label{color:var(--text-muted);}
.detail-card{background:var(--surface);border:1px solid var(--border);border-radius:16px;
    padding:1.5rem;margin-bottom:1.25rem;}
.section-title{font-family:'Syne',sans-serif;font-weight:700;font-size:.82rem;
    margin-bottom:1.2rem;color:var(--text-muted);text-transform:uppercase;letter-spacing:.08em;
    display:flex;align-items:center;gap:.5rem;}
.section-title::before{content:'';display:block;width:3px;height:14px;border-radius:2px;background:var(--accent3);}
.info-grid{display:grid;grid-template-columns:1fr 1fr;gap:1rem;}
@media(max-width:480px){.info-grid{grid-template-columns:1fr;}}
.il{font-size:.7rem;color:var(--text-muted);text-transform:uppercase;letter-spacing:.1em;margin-bottom:.22rem;}
.iv{font-size:.9rem;font-weight:500;}
</style>
@endpush

@section('content')
<div class="page-header">
    <h1 class="page-title">Mi Perfil</h1>
    <p class="page-subtitle">Información de tu cuenta</p>
</div>

<div class="profile-grid">
    <div class="profile-card">
        <div class="p-avatar">
            {{ strtoupper(substr($user->nombres,0,1)) }}{{ strtoupper(substr($user->apellidos,0,1)) }}
        </div>
        <div class="p-name">{{ $user->nombres }} {{ $user->apellidos }}</div>

        <span class="role-badge">● Usuario</span>
        <div class="divider"></div>
        <div class="side-row"><span class="side-label">CI</span><span>{{ $user->ci ?? '—' }}</span></div>
        <div class="side-row"><span class="side-label">Ciudad</span><span>{{ $user->ciudad ?? '—' }}</span></div>
        <div class="side-row"><span class="side-label">Teléfono</span><span>{{ $user->telefono ?? '—' }}</span></div>
    </div>

    <div>
        <div class="detail-card">
            <div class="section-title">Información Personal</div>
            <div class="info-grid">
                <div><div class="il">Nombres</div><div class="iv">{{ $user->nombres }}</div></div>
                <div><div class="il">Apellidos</div><div class="iv">{{ $user->apellidos }}</div></div>
                <div><div class="il">CI</div><div class="iv">{{ $user->ci ?? '—' }}</div></div>
                <div><div class="il">Fecha de Nacimiento</div>
                    <div class="iv">{{ $user->fecha_nacimiento ? \Carbon\Carbon::parse($user->fecha_nacimiento)->format('d/m/Y') : '—' }}</div>
                </div>
                <div><div class="il">Correo</div><div class="iv">{{ $user->correo }}</div></div>
                <div><div class="il">Teléfono</div><div class="iv">{{ $user->telefono ?? '—' }}</div></div>
                <div><div class="il">Ciudad</div><div class="iv">{{ $user->ciudad ?? '—' }}</div></div>
                <div><div class="il">Fecha de Registro</div>
                    <div class="iv">{{ $user->fecha_creacion ? \Carbon\Carbon::parse($user->fecha_creacion)->format('d/m/Y') : '—' }}</div>
                </div>
            </div>
        </div>
        <div class="detail-card">
            <div class="section-title">Seguridad</div>
            <div class="info-grid">
                <div><div class="il">Usuario</div><div class="iv">{{ $user->username }}</div></div>
                <div><div class="il">Contraseña</div><div class="iv">••••••••</div></div>
            </div>
        </div>
    </div>
</div>
@endsection