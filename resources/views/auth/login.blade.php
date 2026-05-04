<!DOCTYPE html>
<html lang="en" id="htmlRoot" class="dark"> <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">
    <title>AnBite — Login</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ============================================================
           PERMANENT DARK MODE THEME
           (Tinanggal ang Light Mode root at html.dark selector,
            ginawang default ang dark colors)
        ============================================================ */
        :root {
            --green-accent: #3dba85;
            --green-hover:  #30a873;
            --bg-right:     #111c17; /* Dark background sa kanan */
            --card-bg:      #1a2820; /* Mas madilim na card */
            --card-shadow:  0 8px 48px rgba(0,0,0,0.5);
            --input-bg:     #1f3028;
            --border:       #2a4035;
            --text-dark:    #e8f5ee; /* Light text para sa dark bg */
            --text-light:   #6b9980;
            --meta-text:    #88aa99;
            --terms-color:  #456055;
            --settings-color: #456055;
        }

        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            background: var(--bg-right); /* Siguraduhing dark ang body bg */
        }

        .layout { display: flex; width: 100%; min-height: 100vh; }

        /* ===== LEFT PANEL (Animated Circles) ===== */
        .left { 
            width: 52%; 
            position: relative; 
            overflow: hidden; 
            /* Pinanatili ang orihinal na kulay ng background at circles dahil maganda na ito */
            background: #c5d5cc; 
            display: flex; /* Idinagdag para sa pagpapakitna */
            align-items: center; /* Vertical center */
            justify-content: center; /* Horizontal center */
        }
        
        .circle { position: absolute; border-radius: 50%; }
        .c1 { width: 600px; height: 600px; top: -200px; left: 10%; background: #2e5a45; animation: d1 20s ease-in-out infinite alternate; }
        .c2 { width: 640px; height: 640px; top: -220px; right: -160px; background: #dce8e1; animation: d2 16s ease-in-out infinite alternate; }
        .c3 { width: 680px; height: 680px; top: 5%; left: -140px; background: #e4ede8; animation: d3 22s ease-in-out infinite alternate; }
        .c4 { width: 520px; height: 520px; top: 28%; right: -120px; background: #9ac5b0; animation: d4 18s ease-in-out infinite alternate; }
        .c5 { width: 580px; height: 580px; top: 20%; left: 5%; background: #d5e3dc; animation: d5 14s ease-in-out infinite alternate; }
        .c6 { width: 280px; height: 280px; bottom: 20px; left: 5%; background: #2e5a45; opacity: 0.8; animation: d6 12s ease-in-out infinite alternate; }
        .c7 { width: 500px; height: 500px; bottom: -160px; right: -100px; background: #dce8e1; animation: d7 18s ease-in-out infinite alternate; }
        .c8 { width: 400px; height: 400px; bottom: -80px; left: 20%; background: #c2d6cc; animation: d8 15s ease-in-out infinite alternate; }
        @keyframes d1{to{transform:translate(12px,18px);}} @keyframes d2{to{transform:translate(-14px,16px);}}
        @keyframes d3{to{transform:translate(16px,-12px);}} @keyframes d4{to{transform:translate(-10px,20px);}}
        @keyframes d5{to{transform:translate(10px,-14px);}} @keyframes d6{to{transform:translate(14px,-10px);}}
        @keyframes d7{to{transform:translate(-12px,10px);}} @keyframes d8{to{transform:translate(8px,-16px);}}

        /* ===== BAGONG CENTERED BRANDING CSS ===== */
        .brand-wrapper {
            text-align: center; /* I-center ang text sa loob */
            z-index: 10;
            padding: 40px;
            animation: fadeUp 1s 0.2s both;
        }

        .logo-img {
            width: 120px; /* Pinalaki ng kaunti para mas bagay sa gitna */
            height: 120px;
            object-fit: contain;
            filter: drop-shadow(0 4px 12px rgba(0,0,0,0.3)); /* Mas malalim na shadow */
            margin-bottom: 20px; /* Patlang sa pagitan ng logo at tagline */
        }

        .left-tagline { 
            font-size: 1.2rem; /* Pinalaki ng kaunti */
            font-weight: 700; 
            color: #2e5a45; /* Binago ang kulay para bumagay sa light green background */
            line-height: 1.4; 
            max-width: 400px; /* Para hindi masyadong mahaba ang linya */
            margin: 0 auto; /* I-center ang block mismo */
            text-shadow: 0 1px 2px rgba(255,255,255,0.5); /* Light shadow para umangat */
        }

        /* ===== RIGHT PANEL ===== */
        .right {
            flex: 1; background: var(--bg-right);
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            padding: 3rem 2.5rem 3.5rem; position: relative;
        }

        /* Tinanggal ang top-controls CSS dahil tinanggal na ang toggle */

        /* Card */
        .card {
            background: var(--card-bg);
            border-radius: 18px; padding: 2.4rem 2.4rem 2rem;
            width: 100%; max-width: 370px;
            box-shadow: var(--card-shadow);
            animation: cardIn 0.8s 0.15s cubic-bezier(.16,1,.3,1) both;
        }
        @keyframes cardIn { from{opacity:0;transform:translateY(28px) scale(0.97);} to{opacity:1;transform:translateY(0) scale(1);} }

        .card-title { font-size: 1.8rem; font-weight: 700; color: var(--text-dark); letter-spacing: -0.025em; margin-bottom: 6px; text-align: center; }
        .card-sub { font-size: 0.8rem; color: var(--text-light); text-align: center; margin-bottom: 1.8rem; }
        .card-sub a { color: var(--green-accent); font-weight: 600; text-decoration: none; }
        .card-sub a:hover { text-decoration: underline; }

        /* Fields */
        .field { margin-bottom: 1.1rem; }
        .field label { display: block; font-size: 0.8rem; font-weight: 500; color: var(--text-dark); margin-bottom: 6px; }
        .inp-wrap { position: relative; }
        .inp-wrap input {
            width: 100%; padding: 10.5px 36px;
            border: 1.5px solid var(--border); border-radius: 9px;
            font-size: 0.85rem; font-family: 'DM Sans', sans-serif;
            color: var(--text-dark); background: var(--input-bg); outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .inp-wrap input::placeholder { color: var(--text-light); }
        .inp-wrap input:focus { border-color: var(--green-accent); box-shadow: 0 0 0 3px rgba(61,186,133,0.12); }
        .ico-left { position: absolute; left: 11px; top: 50%; transform: translateY(-50%); color: var(--text-light); pointer-events: none; transition: color 0.2s; display: flex; }
        .inp-wrap:has(input:focus) .ico-left { color: var(--green-accent); }
        .ico-right { position: absolute; right: 11px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: var(--text-light); display: flex; align-items: center; transition: color 0.2s; }
        .ico-right:hover { color: var(--green-accent); }

        /* Remember / Forgot */
        .meta-row { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.4rem; }
        .remember-lbl { display: flex; align-items: center; gap: 7px; font-size: 0.79rem; color: var(--meta-text); cursor: pointer; user-select: none; }
        .remember-lbl input[type="checkbox"] { accent-color: var(--green-accent); width: 14px; height: 14px; cursor: pointer; }
        .forgot-a { font-size: 0.79rem; font-weight: 600; color: var(--green-accent); text-decoration: none; }
        .forgot-a:hover { text-decoration: underline; }

        /* Error Messages */
        .alert-error { background-color: #ffeaea; color: #d32f2f; padding: 10px; border-radius: 8px; font-size: 0.8rem; margin-bottom: 1rem; text-align: center; border: 1px solid #ffcdd2; }

        /* Login btn */
        .btn-login {
            width: 100%; padding: 12.5px; background: var(--green-accent); color: white; border: none;
            border-radius: 9px; font-size: 0.9rem; font-weight: 600; font-family: 'DM Sans', sans-serif;
            cursor: pointer; position: relative; overflow: hidden;
            display: flex; align-items: center; justify-content: center; gap: 8px;
            transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
            box-shadow: 0 3px 16px rgba(61,186,133,0.38);
        }
        .btn-login:hover { background: var(--green-hover); transform: translateY(-1px); box-shadow: 0 6px 22px rgba(61,186,133,0.45); }
        .btn-login:active { transform: translateY(0); }
        .btn-login .ripple { position: absolute; border-radius: 50%; background: rgba(255,255,255,0.28); transform: scale(0); animation: rip 0.55s linear; pointer-events: none; }
        @keyframes rip { to { transform: scale(5); opacity: 0; } }
        .spin { width: 14px; height: 14px; border: 2px solid rgba(255,255,255,0.3); border-top-color: white; border-radius: 50%; animation: spn 0.65s linear infinite; display: none; }
        @keyframes spn { to { transform: rotate(360deg); } }

        /* Terms */
        .terms { margin-top: 1.4rem; font-size: 0.68rem; color: var(--terms-color); text-align: center; max-width: 370px; }
        .terms a { color: var(--green-accent); text-decoration: none; }
        .terms a:hover { text-decoration: underline; }

        /* Animations */
        @keyframes fadeUp { from{opacity:0;transform:translateY(18px);} to{opacity:1;transform:translateY(0);} }

        /* Responsive */
        @media (max-width: 850px) { /* Ini-adjust ang breakpoint para sa centered logo */
            .left { display: none; }
            .right { background: var(--card-bg); padding: 2rem 1.5rem 3rem; }
        }
    </style>
</head>
<body>
<div class="layout">

    <div class="left">
        <div class="circle c1"></div><div class="circle c2"></div><div class="circle c3"></div>
        <div class="circle c4"></div><div class="circle c5"></div><div class="circle c6"></div>
        <div class="circle c7"></div><div class="circle c8"></div>

        <div class="brand-wrapper">
            <img class="logo-img" src="{{ asset('images/2ndlogo.png') }}" alt="AnBite Logo">
            <div class="left-tagline">Anti-rabies Network for Bite Incident Tracking and Evaluation</div>
        </div>
    </div>

    <div class="right">

        <div class="card">
            <div class="card-title">Welcome back</div>
            <div class="card-sub">
                No account yet? <a href="{{ route('register') }}">Create an Account</a>
            </div>

            @if($errors->any())
                <div class="alert-error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf 
                <div class="field">
                    <label>Username</label>
                    <div class="inp-wrap">
                        <span class="ico-left"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></span>
                        <input type="text" name="username" placeholder="Enter your username" required>
                    </div>
                </div>

                <div class="field">
                    <label>Password</label>
                    <div class="inp-wrap">
                        <span class="ico-left"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></span>
                        <input type="password" name="password" id="pwField" placeholder="Enter your password" required>
                        <button type="button" class="ico-right" id="togglePw">
                            <svg id="eyeIco" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                </div>

                <div class="meta-row">
                    <label class="remember-lbl"><input type="checkbox" name="remember"> Remember me</label>
                    <a href="#" class="forgot-a">Forgot Password?</a>
                </div>

                <button type="submit" class="btn-login" id="loginBtn">
                    <span id="btnTxt">Sign in</span>
                    <div class="spin" id="spin"></div>
                </button>
            </form>
        </div>

        <div class="terms">
            By signing in, you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
        </div>
    </div>
</div>

<script>
    /* ── TINANGGAL ANG DARK MODE TOGGLE SCRIPT ── */

    /* ── Password show/hide ── */
    const pwField  = document.getElementById('pwField');
    const togglePw = document.getElementById('togglePw');
    const eyeIco   = document.getElementById('eyeIco');
    const OPEN   = `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>`;
    const CLOSED = `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/>`;
    togglePw.addEventListener('click', () => {
        const vis = pwField.type === 'text';
        pwField.type = vis ? 'password' : 'text';
        eyeIco.innerHTML = vis ? OPEN : CLOSED;
    });

    /* ── Ripple Effect ── */
    const loginBtn = document.getElementById('loginBtn');
    loginBtn.addEventListener('click', e => {
        const r = document.createElement('span');
        r.className = 'ripple';
        const rc = loginBtn.getBoundingClientRect(), sz = Math.max(rc.width, rc.height);
        r.style.cssText = `width:${sz}px;height:${sz}px;left:${e.clientX-rc.left-sz/2}px;top:${e.clientY-rc.top-sz/2}px`;
        loginBtn.appendChild(r);
        setTimeout(() => r.remove(), 600);
    });

    /* ── Loading state ── */
    document.getElementById('loginForm').addEventListener('submit', () => {
        if(document.getElementById('btnTxt')) {
            document.getElementById('btnTxt').textContent = 'Signing in…';
        }
        document.getElementById('spin').style.display = 'block';
        setTimeout(() => {
            loginBtn.disabled = true;
        }, 10);
    });
</script>
</body>
</html>