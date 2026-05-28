<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title','Sistema')</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<style>
    :root{--bg:#0a0a0f;--surface:#12121a;--surface2:#1a1a26;--border:#2a2a3d;
        --accent:#6c63ff;--accent3:#43e97b;--text:#e8e8f0;--text-muted:#7878a0;
        --danger:#ff4757;--success:#2ed573;--warning:#ffa502;}
    *{margin:0;padding:0;box-sizing:border-box;}
    body{font-family:'DM Sans',sans-serif;background:var(--bg);color:var(--text);min-height:100vh;}
    body::before{content:'';position:fixed;inset:0;z-index:0;pointer-events:none;
        background:radial-gradient(ellipse 80% 50% at 20% 10%,rgba(108,99,255,.12) 0%,transparent 60%),
                radial-gradient(ellipse 60% 40% at 80% 80%,rgba(255,101,132,.08) 0%,transparent 60%);}
    .topbar{position:sticky;top:0;z-index:100;background:rgba(10,10,15,.9);
        backdrop-filter:blur(20px);border-bottom:1px solid var(--border);
        padding:0 2rem;height:64px;display:flex;align-items:center;justify-content:space-between;}
    .topbar-brand{font-family:'Syne',sans-serif;font-weight:800;font-size:1.1rem;display:flex;align-items:center;gap:.6rem;}
    .dot{width:8px;height:8px;border-radius:50%;}
    .dot.admin{background:var(--accent);box-shadow:0 0 8px var(--accent);}
    .dot.user{background:var(--accent3);box-shadow:0 0 8px var(--accent3);}
    .topbar-right{display:flex;align-items:center;gap:1rem;}
    .topbar-user{font-size:.85rem;color:var(--text-muted);display:flex;align-items:center;gap:.5rem;}
    .avatar{width:32px;height:32px;border-radius:50%;display:flex;align-items:center;justify-content:center;
        font-family:'Syne',sans-serif;font-weight:700;font-size:.8rem;}
    .avatar.admin{background:rgba(108,99,255,.2);color:var(--accent);border:1px solid rgba(108,99,255,.4);}
    .avatar.user{background:rgba(67,233,123,.2);color:var(--accent3);border:1px solid rgba(67,233,123,.4);}
    .btn{display:inline-flex;align-items:center;gap:.4rem;font-family:'DM Sans',sans-serif;
        font-weight:500;font-size:.875rem;border:none;cursor:pointer;border-radius:10px;
        transition:all .2s;text-decoration:none;padding:.55rem 1rem;}
    .btn-logout{background:rgba(255,71,87,.1);border:1px solid rgba(255,71,87,.3);color:var(--danger);}
    .btn-logout:hover{background:rgba(255,71,87,.2);}
    .btn-primary{background:var(--accent);color:#fff;box-shadow:0 4px 15px rgba(108,99,255,.3);}
    .btn-primary:hover{background:#7c75ff;transform:translateY(-1px);}
    .btn-secondary{background:var(--surface2);border:1px solid var(--border);color:var(--text-muted);}
    .btn-secondary:hover{color:var(--text);}
    .btn-danger{background:rgba(255,71,87,.1);border:1px solid rgba(255,71,87,.3);color:var(--danger);}
    .btn-danger:hover{background:rgba(255,71,87,.2);}
    .btn-warning{background:rgba(255,165,2,.1);border:1px solid rgba(255,165,2,.3);color:var(--warning);}
    .btn-warning:hover{background:rgba(255,165,2,.2);}
    .main-content{padding:2.5rem 2rem;max-width:1100px;margin:0 auto;width:100%;position:relative;z-index:1;}
    .app-layout{min-height:100vh;display:flex;flex-direction:column;}
    .page-header{margin-bottom:2rem;}
    .page-title{font-family:'Syne',sans-serif;font-size:1.8rem;font-weight:800;margin-bottom:.3rem;}
    .page-subtitle{font-size:.9rem;color:var(--text-muted);}
    .alert{padding:.85rem 1.1rem;border-radius:10px;font-size:.875rem;margin-bottom:1.5rem;}
    .alert-success{background:rgba(46,213,115,.1);border:1px solid rgba(46,213,115,.3);color:var(--success);}
    .alert-error{background:rgba(255,71,87,.1);border:1px solid rgba(255,71,87,.3);color:var(--danger);}
    .card{background:var(--surface);border:1px solid var(--border);border-radius:16px;padding:2rem;}
    .form-group{margin-bottom:1.2rem;}
    .form-label{display:block;font-size:.75rem;font-weight:500;text-transform:uppercase;
        letter-spacing:.1em;color:var(--text-muted);margin-bottom:.45rem;}
    .form-input,.form-select{width:100%;background:var(--bg);border:1px solid var(--border);
        border-radius:10px;padding:.8rem 1rem;color:var(--text);font-family:'DM Sans',sans-serif;
        font-size:.9rem;outline:none;transition:border-color .2s;}
    .form-input:focus,.form-select:focus{border-color:var(--accent);box-shadow:0 0 0 3px rgba(108,99,255,.12);}
    .form-select{appearance:none;}
    .form-error{font-size:.78rem;color:var(--danger);margin-top:.3rem;}
    .form-grid{display:grid;grid-template-columns:1fr 1fr;gap:1rem;}
    @media(max-width:600px){.form-grid{grid-template-columns:1fr;}}
    </style>
    @stack('styles')
</head>
<body>
    <div class="app-layout">
    <nav class="topbar">
        <div class="topbar-brand">
            <div class="dot {{ auth()->user()->rol }}"></div>
            @yield('brand','Sistema')
        </div>
        <div class="topbar-right">
            <div class="topbar-user">
                <div class="avatar {{ auth()->user()->rol }}">
                    {{ strtoupper(substr(auth()->user()->nombres,0,1)) }}{{ strtoupper(substr(auth()->user()->apellidos,0,1)) }}
                </div>
                <span>{{ auth()->user()->nombres }} {{ auth()->user()->apellidos }}</span>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-logout">Cerrar Sesión</button>
            </form>
        </div>
    </nav>
    <div class="main-content">
        @if(session('success'))
            <div class="alert alert-success">✅ {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">❌ {{ session('error') }}</div>
        @endif
        @yield('content')
    </div>
    </div>
    @stack('scripts')
</body>
</html>