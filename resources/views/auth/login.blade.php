<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Iniciar Sesión</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root{--bg:#0a0a0f;--surface:#12121a;--border:#2a2a3d;--accent:#6c63ff;--text:#e8e8f0;--text-muted:#7878a0;--danger:#ff4757;}
        *{margin:0;padding:0;box-sizing:border-box;}
        body{font-family:'DM Sans',sans-serif;background:var(--bg);color:var(--text);
            min-height:100vh;display:flex;align-items:center;justify-content:center;padding:2rem;}
        body::before{content:'';position:fixed;inset:0;z-index:0;pointer-events:none;
            background:radial-gradient(ellipse 80% 50% at 20% 10%,rgba(108,99,255,.12) 0%,transparent 60%),
                    radial-gradient(ellipse 60% 40% at 80% 80%,rgba(255,101,132,.08) 0%,transparent 60%);}
        .card{width:100%;max-width:420px;background:var(--surface);border:1px solid var(--border);
            border-radius:24px;padding:3rem 2.5rem;position:relative;z-index:1;
            box-shadow:0 40px 80px rgba(0,0,0,.5);animation:up .6s cubic-bezier(.16,1,.3,1) both;}
        @keyframes up{from{opacity:0;transform:translateY(30px)}to{opacity:1;transform:translateY(0)}}
        .badge {
            display: flex;              
            justify-content: center;    
            align-items: center;       
            text-align: center;
            background: rgba(108,99,255,.12);
            border: 1px solid rgba(108,99,255,.3);
            border-radius: 100px;
            padding: .35rem .9rem;
            margin-bottom: 1.8rem;
        }
        .badge img {
            max-width: 100%; 
            height: auto;
        }


        .title{font-family:'Syne',sans-serif;font-size:2rem;font-weight:800;margin-bottom:.5rem;}
        
        .title span{color:var(--accent);}
        .student{font-size:.82rem;color:var(--text-muted);margin-bottom:2.2rem;
            display:flex;align-items:center;gap:.5rem;}
        .student::before{content:'';width:20px;height:1px;background:var(--border);}
        .label{display:block;font-size:.75rem;font-weight:500;text-transform:uppercase;
            letter-spacing:.1em;color:var(--text-muted);margin-bottom:.45rem;}
        .input{width:100%;background:var(--bg);border:1px solid var(--border);border-radius:10px;
            padding:.85rem 1rem;color:var(--text);font-family:'DM Sans',sans-serif;font-size:.95rem;
            outline:none;transition:border-color .2s,box-shadow .2s;margin-bottom:1.2rem;}
        .input:focus{border-color:var(--accent);box-shadow:0 0 0 3px rgba(108,99,255,.15);}
        .input.err{border-color:var(--danger);}
        .btn{width:100%;padding:.9rem;background:var(--accent);color:#fff;border:none;
            border-radius:10px;font-family:'DM Sans',sans-serif;font-weight:500;font-size:.95rem;
            cursor:pointer;transition:all .2s;box-shadow:0 4px 20px rgba(108,99,255,.4);}
        .btn:hover{background:#7c75ff;transform:translateY(-1px);}
        .err-box{background:rgba(255,71,87,.1);border:1px solid rgba(255,71,87,.3);
            color:var(--danger);border-radius:8px;padding:.75rem 1rem;font-size:.85rem;
            text-align:center;margin-top:1rem;}
        .divider{height:1px;background:var(--border);margin:1.75rem 0;}
        .hint{font-size:.7rem;color:var(--text-muted);text-transform:uppercase;letter-spacing:.1em;margin-bottom:.75rem;}
        .chips{display:flex;flex-wrap:wrap;gap:.5rem;}
        .chip{padding:.3rem .7rem;border-radius:100px;font-size:.72rem;cursor:pointer;
            border:1px solid var(--border);background:rgba(255,255,255,.03);color:var(--text-muted);
            transition:all .15s;font-family:'DM Sans',sans-serif;}
        .chip.a{border-color:rgba(108,99,255,.4);color:#6c63ff;}
        .chip.u{border-color:rgba(67,233,123,.4);color:#43e97b;}
    </style>
</head>
<body>
    <div class="card">
        <div class="badge"><img src="https://png.pngtree.com/png-vector/20250606/ourmid/pngtree-3d-user-icon-on-blue-circle-isolated-transparent-background-white-png-image_16477931.png"></div>
        <strong><h1 style="text-align:center">FRANKLIN ADHEMAR PONGO CORI</strong>

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <label class="label">Usuario</label>
            <input class="input {{ $errors->has('credentials') ? 'err':'' }}"
                type="text" name="username" value="{{ old('username') }}"
                placeholder="Ingresa tu usuario" autocomplete="off">

            <label class="label">Contraseña</label>
            <input class="input {{ $errors->has('credentials') ? 'err':'' }}"
                type="password" name="password" placeholder="••••••••">

            <button type="submit" class="btn">Iniciar Sesión →</button>

            @if($errors->has('credentials'))
                <div class="err-box">{{ $errors->first('credentials') }}</div>
            @endif
        </form>


    <script>
    function fill(u,p){
        document.querySelector('[name=username]').value=u;
        document.querySelector('[name=password]').value=p;
    }
    </script>
</body>
</html>