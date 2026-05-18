<!DOCTYPE html>
<html lang="en" id="htmlRoot" class="dark"> <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/CHO LOGO.png') }}">    
    <title>AnBite — Login</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ============================================================
           PERMANENT DARK MODE THEME
        ============================================================ */
        :root {
            --green-accent: #3dba85;
            --green-hover:  #30a873;
            --bg-right:     #111c17; 
            --card-bg:      #1a2820; 
            --card-shadow:  0 8px 48px rgba(0,0,0,0.5);
            --input-bg:     #1f3028;
            --border:       #2a4035;
            --text-dark:    #e8f5ee; 
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
            background: var(--bg-right); 
        }

        .layout { display: flex; width: 100%; min-height: 100vh; }

        /* ===== LEFT PANEL (Ibinalik sa 52% ang space) ===== */
        .left { 
            width: 52%; 
            position: relative; 
            overflow: hidden; 
            background: #c5d5cc; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
        }

        /* Background Image with 12% Opacity */
        .left::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("{{ asset('images/CHO Background.png') }}");
            background-size: cover;
            background-position: center;
            opacity: 0.12;
            z-index: 1;
        }
        

        /* ===== CENTERED BRANDING CSS ===== */
        .brand-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            z-index: 10;
            padding: 40px;
            animation: fadeUp 1s 0.2s both;
        }

        /* Pinalaking Logo */
        .logo-img {
            width: 180px; 
            height: 180px;
            object-fit: contain;
            filter: drop-shadow(0 8px 16px rgba(0,0,0,0.15)); 
            margin-bottom: 25px; 
        }

        /* Pinalaking Title */
        .brand-title {
            font-weight: 900;
            color: #1a4331; 
            font-size: 2.8rem;
            letter-spacing: 2px;
            margin-bottom: 12px;
        }

        /* Pinalaking Acronym (Isang linyang straight) */
        .left-description {
            font-size: 1.3rem;
            font-weight: 500; 
            color: #4b5563; 
            line-height: 1.6;
            max-width: 100%; 
            margin: 0 auto 24px auto; 
        }
        
        .left-description span {
            font-weight: 900; 
            color: #1a4331; 
            font-size: 1.5rem; 
        }

        /* Pinalaking Tagline */
        .left-tagline { 
            font-size: 1.1rem;
            font-weight: 400;
            color: #213b2e; 
            font-style: italic; 
            line-height: 1.5;
            max-width: 450px;
            margin: 0 auto;
        }

        /* ===== RIGHT PANEL ===== */
        .right {
            flex: 1; background: var(--bg-right);
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            padding: 3rem 2.5rem 3.5rem; position: relative;
        }

        /* Card (In-adjust nang konti ang lapad para magkasya ang malalaking text) */
        .card {
            background: var(--card-bg);
            border-radius: 18px; padding: 2.8rem 2.8rem 2.4rem;
            width: 100%; max-width: 420px;
            box-shadow: var(--card-shadow);
            animation: cardIn 0.8s 0.15s cubic-bezier(.16,1,.3,1) both;
        }
        @keyframes cardIn { from{opacity:0;transform:translateY(28px) scale(0.97);} to{opacity:1;transform:translateY(0) scale(1);} }

        /* Pinalaking Card Title at Subtitle */
        .card-title { font-size: 2.2rem; font-weight: 700; color: var(--text-dark); letter-spacing: -0.025em; margin-bottom: 8px; text-align: center; }
        .card-sub { font-size: 1rem; color: var(--text-light); text-align: center; margin-bottom: 2rem; }
        .card-sub a { color: var(--green-accent); font-weight: 600; text-decoration: none; }
        .card-sub a:hover { text-decoration: underline; }

        /* Pinalaking Fields (Labels at Inputs) */
        .field { margin-bottom: 1.3rem; }
        .field label { display: block; font-size: 1rem; font-weight: 500; color: var(--text-dark); margin-bottom: 8px; }
        .inp-wrap { position: relative; }
        .inp-wrap input {
            width: 100%; padding: 12px 42px;
            border: 1.5px solid var(--border); border-radius: 9px;
            font-size: 1.05rem; font-family: 'DM Sans', sans-serif;
            color: var(--text-dark); background: var(--input-bg); outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .inp-wrap input::placeholder { color: var(--text-light); }
        .inp-wrap input:focus { border-color: var(--green-accent); box-shadow: 0 0 0 3px rgba(61,186,133,0.12); }
        
        /* Pinalaking Icons */
        .ico-left { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--text-light); pointer-events: none; transition: color 0.2s; display: flex; }
        .inp-wrap:has(input:focus) .ico-left { color: var(--green-accent); }
        .ico-right { position: absolute; right: 14px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: var(--text-light); display: flex; align-items: center; transition: color 0.2s; }
        .ico-right:hover { color: var(--green-accent); }

        /* Pinalaking Remember / Forgot */
        .meta-row { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.6rem; }
        .remember-lbl { display: flex; align-items: center; gap: 8px; font-size: 0.95rem; color: var(--meta-text); cursor: pointer; user-select: none; }
        .remember-lbl input[type="checkbox"] { accent-color: var(--green-accent); width: 16px; height: 16px; cursor: pointer; }
        .forgot-a { font-size: 0.95rem; font-weight: 600; color: var(--green-accent); text-decoration: none; }
        .forgot-a:hover { text-decoration: underline; }

        /* Error Messages */
        .alert-error { background-color: #ffeaea; color: #d32f2f; padding: 12px; border-radius: 8px; font-size: 0.95rem; margin-bottom: 1rem; text-align: center; border: 1px solid #ffcdd2; }

        /* Pinalaking Login btn */
        .btn-login {
            width: 100%; padding: 14px; background: var(--green-accent); color: white; border: none;
            border-radius: 9px; font-size: 1.1rem; font-weight: 600; font-family: 'DM Sans', sans-serif;
            cursor: pointer; position: relative; overflow: hidden;
            display: flex; align-items: center; justify-content: center; gap: 8px;
            transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
            box-shadow: 0 3px 16px rgba(61,186,133,0.38);
        }
        .btn-login:hover { background: var(--green-hover); transform: translateY(-1px); box-shadow: 0 6px 22px rgba(61,186,133,0.45); }
        .btn-login:active { transform: translateY(0); }
        .btn-login .ripple { position: absolute; border-radius: 50%; background: rgba(255,255,255,0.28); transform: scale(0); animation: rip 0.55s linear; pointer-events: none; }
        @keyframes rip { to { transform: scale(5); opacity: 0; } }
        .spin { width: 16px; height: 16px; border: 2px solid rgba(255,255,255,0.3); border-top-color: white; border-radius: 50%; animation: spn 0.65s linear infinite; display: none; }
        @keyframes spn { to { transform: rotate(360deg); } }

        /* Pinalaking Terms */
        .terms { margin-top: 1.6rem; font-size: 0.85rem; color: var(--terms-color); text-align: center; max-width: 420px; }
        .terms a { color: var(--green-accent); text-decoration: none; }
        .terms a:hover { text-decoration: underline; }

        /* Animations */
        @keyframes fadeUp { from{opacity:0;transform:translateY(18px);} to{opacity:1;transform:translateY(0);} }

        /* Responsive */
        @media (max-width: 1000px) { 
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
            <img class="logo-img" src="{{ asset('images/CHO LOGO.png') }}" alt="CHO Logo">

            <div style="display: flex; align-items: center; justify-content: center; gap: 14px; margin-bottom: 12px;">
                <div class="brand-title" style="margin-bottom: 0;">ANBITE</div>
            </div>

            <div class="left-description">
                <span>A</span>nti-rabies <span>N</span>etwork for <span>B</span>ite <span>I</span>ncident <span>T</span>racking and <span>E</span>valuation
            </div>
            
            <div class="left-tagline">
                Your Tracking System for Rabies Prevention<br>Control and Management
            </div>
        </div>
    </div>

    <div class="right">

        <div class="card">
            <div class="card-title">Welcome back</div>
            <div class="card-sub">
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
                        <span class="ico-left"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></span>
                        <input type="text" name="username" placeholder="Enter your username" required>
                    </div>
                </div>

                <div class="field">
                    <label>Password</label>
                    <div class="inp-wrap">
                        <span class="ico-left"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></span>
                        <input type="password" name="password" id="pwField" placeholder="Enter your password" required>
                        <button type="button" class="ico-right" id="togglePw">
                            <svg id="eyeIco" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                </div>

                <div class="meta-row">
                    <label class="remember-lbl"><input type="checkbox" name="remember"> Remember me</label>
                    <a href="#" class="forgot-a">Forgot Password?</a>
                </div>

                <button type="submit" class="btn-login" id="loginBtn">
                    <span id="btnTxt">Log in</span>
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