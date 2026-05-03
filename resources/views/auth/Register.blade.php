<!DOCTYPE html>
<html lang="en" id="htmlRoot">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">
    <title>AnBite — Create Account</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --green-accent: #3dba85;
            --green-hover:  #30a873;
            --text-dark:    #1a1a1a;
            --text-light:   #999;
            --border:       #e4ebe7;
            --bg-right:     #eaf1ed;
            --card-bg:      #ffffff;
            --card-shadow:  0 8px 48px rgba(0,0,0,0.09);
            --input-bg:     #ffffff;
            --meta-text:    #555;
            --terms-color:  #bbb;
            --settings-color: #bbb;
        }

        html.dark {
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
        body { font-family: 'DM Sans', sans-serif; min-height: 100vh; display: flex; transition: background 0.3s; }
        .layout { display: flex; width: 100%; min-height: 100vh; }

        /* ===== LEFT ===== */
        .left { width: 52%; position: relative; overflow: hidden; background: #c5d5cc; }
        .circle { position: absolute; border-radius: 50%; }
        .c1{width:600px;height:600px;top:-200px;left:10%;background:#2e5a45;animation:d1 20s ease-in-out infinite alternate;}
        .c2{width:640px;height:640px;top:-220px;right:-160px;background:#dce8e1;animation:d2 16s ease-in-out infinite alternate;}
        .c3{width:680px;height:680px;top:5%;left:-140px;background:#e4ede8;animation:d3 22s ease-in-out infinite alternate;}
        .c4{width:520px;height:520px;top:28%;right:-120px;background:#2e5a45;animation:d4 18s ease-in-out infinite alternate;}
        .c5{width:580px;height:580px;top:20%;left:5%;background:#d5e3dc;animation:d5 14s ease-in-out infinite alternate;}
        .c6{width:280px;height:280px;bottom:20px;left:5%;background:#2e5a45;opacity:0.8;animation:d6 12s ease-in-out infinite alternate;}
        .c7{width:500px;height:500px;bottom:-160px;right:-100px;background:#dce8e1;animation:d7 18s ease-in-out infinite alternate;}
        .c8{width:400px;height:400px;bottom:-80px;left:20%;background:#c2d6cc;animation:d8 15s ease-in-out infinite alternate;}
        @keyframes d1{to{transform:translate(12px,18px);}} @keyframes d2{to{transform:translate(-14px,16px);}}
        @keyframes d3{to{transform:translate(16px,-12px);}} @keyframes d4{to{transform:translate(-10px,20px);}}
        @keyframes d5{to{transform:translate(10px,-14px);}} @keyframes d6{to{transform:translate(14px,-10px);}}
        @keyframes d7{to{transform:translate(-12px,10px);}} @keyframes d8{to{transform:translate(8px,-16px);}}

        .left-top { position: absolute; top: 20px; left: 20px; display: flex; align-items: center; gap: 10px; z-index: 10; animation: fadeIn 0.8s 0.1s both; }
        .logo-img { width: 70px; height: 70px; object-fit: contain; filter: drop-shadow(0 2px 8px rgba(0,0,0,0.4)); }
        .brand-name { font-size: 1rem; font-weight: 700; color: white; text-shadow: 0 1px 6px rgba(0,0,0,0.35); }
        .left-bottom { position: absolute; bottom: 28px; left: 28px; right: 28px; z-index: 10; animation: fadeUp 1s 0.4s both; }
        .left-tagline { font-size: 1.05rem; font-weight: 700; color: white; line-height: 1.5; margin-bottom: 14px; text-shadow: 0 1px 8px rgba(0,0,0,0.3); }
        .dev-row { display: flex; align-items: center; gap: 10px; }
        .dev-avatar { width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.2); backdrop-filter: blur(6px); border: 1.5px solid rgba(255,255,255,0.4); display: flex; align-items: center; justify-content: center; font-size: 0.64rem; font-weight: 700; color: white; flex-shrink: 0; }
        .dev-name { font-size: 0.82rem; font-weight: 600; color: white; text-shadow: 0 1px 4px rgba(0,0,0,0.25); }
        .dev-role { font-size: 0.7rem; color: rgba(255,255,255,0.55); }

        /* ===== RIGHT ===== */
        .right { flex: 1; background: var(--bg-right); display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 2rem 2.5rem 2.5rem; position: relative; overflow-y: auto; transition: background 0.3s; }

        .top-controls { position: absolute; top: 20px; right: 20px; display: flex; align-items: center; gap: 10px; z-index: 20; }
        .dark-toggle { width: 42px; height: 24px; background: var(--border); border-radius: 99px; border: none; cursor: pointer; position: relative; transition: background 0.3s; flex-shrink: 0; }
        .dark-toggle::after { content: ''; position: absolute; width: 18px; height: 18px; border-radius: 50%; background: white; top: 3px; left: 3px; transition: transform 0.3s; box-shadow: 0 1px 4px rgba(0,0,0,0.2); }
        html.dark .dark-toggle { background: var(--green-accent); }
        html.dark .dark-toggle::after { transform: translateX(18px); }
        .toggle-label { font-size: 0.7rem; font-weight: 600; color: var(--settings-color); display: flex; align-items: center; gap: 4px; user-select: none; cursor: pointer; }
        
        /* Card */
        .card { background: var(--card-bg); border-radius: 18px; padding: 2.2rem 2.4rem 2rem; width: 100%; max-width: 420px; box-shadow: var(--card-shadow); animation: cardIn 0.8s 0.15s cubic-bezier(.16,1,.3,1) both; transition: background 0.3s, box-shadow 0.3s; }
        @keyframes cardIn { from{opacity:0;transform:translateY(28px) scale(0.97);} to{opacity:1;transform:translateY(0) scale(1);} }

        .card-title { font-size: 1.75rem; font-weight: 700; color: var(--text-dark); letter-spacing: -0.02em; margin-bottom: 5px; transition: color 0.3s; }
        .card-sub { font-size: 0.8rem; color: var(--text-light); margin-bottom: 1.6rem; transition: color 0.3s; }
        .card-sub a { color: var(--green-accent); font-weight: 600; text-decoration: none; }
        .card-sub a:hover { text-decoration: underline; }

        .error-box { background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; border-radius: 8px; padding: 9px 12px; margin-bottom: 1.2rem; font-size: 0.77rem; display: flex; align-items: center; gap: 7px; }
        html.dark .error-box { background: #2d1010; border-color: #5c1a1a; color: #e07070; }

        .two-col { display: flex; gap: 12px; }
        .two-col .field { flex: 1; }
        .field { margin-bottom: 1rem; }
        .field label { display: block; font-size: 0.8rem; font-weight: 500; color: var(--text-dark); margin-bottom: 6px; transition: color 0.3s; }
        .inp-wrap { position: relative; }
        .inp-wrap input { width: 100%; padding: 10.5px 36px; border: 1.5px solid var(--border); border-radius: 9px; font-size: 0.85rem; font-family: 'DM Sans', sans-serif; color: var(--text-dark); background: var(--input-bg); outline: none; transition: border-color 0.2s, box-shadow 0.2s, background 0.3s, color 0.3s; }
        .inp-wrap input::placeholder { color: var(--text-light); }
        .inp-wrap input:focus { border-color: var(--green-accent); box-shadow: 0 0 0 3px rgba(61,186,133,0.12); }
        .ico-left { position: absolute; left: 11px; top: 50%; transform: translateY(-50%); color: var(--text-light); pointer-events: none; transition: color 0.2s; display: flex; }
        .inp-wrap:has(input:focus) .ico-left { color: var(--green-accent); }
        .ico-right { position: absolute; right: 11px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: var(--text-light); display: flex; align-items: center; transition: color 0.2s; }
        .ico-right:hover { color: var(--green-accent); }

        .btn-submit { width: 100%; padding: 12.5px; background: var(--green-accent); color: white; border: none; border-radius: 9px; font-size: 0.9rem; font-weight: 600; font-family: 'DM Sans', sans-serif; cursor: pointer; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; gap: 8px; transition: background 0.2s, transform 0.15s, box-shadow 0.2s; box-shadow: 0 3px 16px rgba(61,186,133,0.38); margin-top: 0.4rem; }
        .btn-submit:hover { background: var(--green-hover); transform: translateY(-1px); box-shadow: 0 6px 22px rgba(61,186,133,0.45); }
        .btn-submit:active { transform: translateY(0); }
        .btn-submit .ripple { position: absolute; border-radius: 50%; background: rgba(255,255,255,0.28); transform: scale(0); animation: rip 0.55s linear; pointer-events: none; }
        @keyframes rip { to{transform:scale(5);opacity:0;} }
        .spin { width: 14px; height: 14px; border: 2px solid rgba(255,255,255,0.3); border-top-color: white; border-radius: 50%; animation: spn 0.65s linear infinite; display: none; }
        @keyframes spn { to{transform:rotate(360deg);} }

        .back-link { display: block; text-align: center; margin-top: 1rem; font-size: 0.79rem; color: var(--green-accent); font-weight: 600; text-decoration: none; }
        .back-link:hover { text-decoration: underline; }
        .terms { margin-top: 1.2rem; font-size: 0.68rem; color: var(--terms-color); text-align: center; max-width: 420px; transition: color 0.3s; }
        .terms a { color: var(--green-accent); text-decoration: none; }
        .terms a:hover { text-decoration: underline; }

        @keyframes fadeIn{from{opacity:0;}to{opacity:1;}} @keyframes fadeUp{from{opacity:0;transform:translateY(18px);}to{opacity:1;transform:translateY(0);}}
        @media(max-width:700px){.left{display:none;}.right{background:var(--card-bg);padding:2rem 1.5rem 3rem;}.two-col{flex-direction:column;gap:0;}}
    </style>
</head>
<body>
<div class="layout">

    <div class="left">
        <div class="circle c1"></div><div class="circle c2"></div><div class="circle c3"></div>
        <div class="circle c4"></div><div class="circle c5"></div><div class="circle c6"></div>
        <div class="circle c7"></div><div class="circle c8"></div>

        <div class="left-top">
            <img class="logo-img" src="./images/2ndlogo.png" alt="AnBite Logo">
        </div>

        <div class="left-bottom">
            <div class="left-tagline">Anti-rabies Network for Bite Incident Tracking and Evaluation</div>
            <div class="dev-row">
                <div>
                </div>
            </div>
        </div>
    </div>

    <div class="right">

        <div class="top-controls">
            <label class="toggle-label" for="darkToggle">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
            </label>
            <button class="dark-toggle" id="darkToggle" title="Toggle dark mode" aria-label="Toggle dark mode"></button>
        </div>

        <div class="card">
            <div class="card-title">Create an Account</div>
            <div class="card-sub">Already have an account? <a href="{{ route('login') }}">Login here</a></div>

            @if ($errors->any())
                <div class="error-box">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" id="registerForm">
                @csrf
                <div class="two-col">
                    <div class="field">
                        <label>First Name</label>
                        <div class="inp-wrap">
                            <span class="ico-left"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></span>
                            <input type="text" name="first_name" placeholder="Juan" value="{{ old('first_name') }}" required>
                        </div>
                    </div>
                    <div class="field">
                        <label>Last Name</label>
                        <div class="inp-wrap">
                            <span class="ico-left"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></span>
                            <input type="text" name="last_name" placeholder="Dela Cruz" value="{{ old('last_name') }}" required>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label>Username</label>
                    <div class="inp-wrap">
                        <span class="ico-left"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18"/></svg></span>
                        <input type="text" name="username" placeholder="e.g. juan.delacruz" value="{{ old('username') }}" required>
                    </div>
                </div>

                <div class="field">
                    <label>Email Address</label>
                    <div class="inp-wrap">
                        <span class="ico-left"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></span>
                        <input type="email" name="email" placeholder="e.g. juan@gmail.com" value="{{ old('email') }}" required>
                    </div>
                </div>

                <div class="field">
                    <label>Password</label>
                    <div class="inp-wrap">
                        <span class="ico-left"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></span>
                        <input type="password" name="password" id="pw1" placeholder="Create a password" required>
                        <button type="button" class="ico-right" id="tgl1"><svg id="eye1" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></button>
                    </div>
                </div>

                <div class="field">
                    <label>Confirm Password</label>
                    <div class="inp-wrap">
                        <span class="ico-left"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></span>
                        <input type="password" name="password_confirmation" id="pw2" placeholder="Re-enter your password" required>
                        <button type="button" class="ico-right" id="tgl2"><svg id="eye2" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></button>
                    </div>
                </div>

                <button type="submit" class="btn-submit" id="submitBtn">
                    <span id="btnTxt">Create Account</span>
                    <div class="spin" id="spin"></div>
                </button>
            </form>

            <a href="{{ route('login') }}" class="back-link">Already have an account? Login</a>
        </div>

        <div class="terms">
            By creating an account, you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
        </div>
    </div>
</div>

<script>
    const html = document.getElementById('htmlRoot');
    const toggleBtn = document.getElementById('darkToggle');
    if (localStorage.getItem('anbite-dark') === 'true') html.classList.add('dark');
    toggleBtn.addEventListener('click', () => {
        html.classList.toggle('dark');
        localStorage.setItem('anbite-dark', html.classList.contains('dark'));
    });

    const OPEN=`<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>`;
    const CLOSED=`<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/>`;
    function makeToggle(fid,bid,eid){
        const f=document.getElementById(fid),b=document.getElementById(bid),e=document.getElementById(eid);
        b.addEventListener('click',()=>{const v=f.type==='text';f.type=v?'password':'text';e.innerHTML=v?OPEN:CLOSED;});
    }
    makeToggle('pw1','tgl1','eye1'); makeToggle('pw2','tgl2','eye2');

    const submitBtn=document.getElementById('submitBtn');
    submitBtn.addEventListener('click',e=>{
        const r=document.createElement('span'); r.className='ripple';
        const rc=submitBtn.getBoundingClientRect(),sz=Math.max(rc.width,rc.height);
        r.style.cssText=`width:${sz}px;height:${sz}px;left:${e.clientX-rc.left-sz/2}px;top:${e.clientY-rc.top-sz/2}px`;
        submitBtn.appendChild(r); setTimeout(()=>r.remove(),600);
    });

    document.getElementById('registerForm').addEventListener('submit', function(e) {
        document.getElementById('btnTxt').textContent='Creating account…';
        document.getElementById('spin').style.display='block';
    });
</script>
</body>
</html>