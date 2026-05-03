<!DOCTYPE html>
<html lang="en" id="htmlRoot">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">
    <title>AnBite — Verify Account</title>
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

        .otp-icon { width: 50px; height: 50px; background: rgba(61,186,133,0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem; }
        .card-title { font-size: 1.6rem; font-weight: 700; color: var(--text-dark); letter-spacing: -0.02em; margin-bottom: 5px; transition: color 0.3s; }
        .card-sub { font-size: 0.85rem; color: var(--text-light); margin-bottom: 1.6rem; transition: color 0.3s; line-height: 1.5; }

        .alert { font-size: 0.8rem; border-radius: 8px; padding: 10px 14px; margin-bottom: 1.2rem; text-align: center; }
        .alert-info { background: #e0f2fe; color: #0284c7; border: 1px solid #bae6fd; }
        .alert-error { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }
        html.dark .alert-info { background: #0c4a6e; color: #7dd3fc; border-color: #0369a1; }
        html.dark .alert-error { background: #450a0a; color: #fca5a5; border-color: #7f1d1d; }

        /* OTP Boxes CSS adapted to theme */
        .otp-boxes { display: flex; gap: 8px; justify-content: center; margin-bottom: 1.5rem; }
        .otp-box { width: 46px; height: 54px; border: 1.5px solid var(--border); border-radius: 9px; font-size: 1.4rem; font-weight: 700; text-align: center; color: var(--text-dark); background: var(--input-bg); outline: none; transition: border-color 0.2s, box-shadow 0.2s, background 0.3s, color 0.3s; }
        .otp-box:focus { border-color: var(--green-accent); box-shadow: 0 0 0 3px rgba(61,186,133,0.12); }
        #otpHidden { display: none; }

        .btn-submit { width: 100%; padding: 12.5px; background: var(--green-accent); color: white; border: none; border-radius: 9px; font-size: 0.9rem; font-weight: 600; font-family: 'DM Sans', sans-serif; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; transition: background 0.2s, transform 0.15s, box-shadow 0.2s; box-shadow: 0 3px 16px rgba(61,186,133,0.38); margin-bottom: 1rem; }
        .btn-submit:hover { background: var(--green-hover); transform: translateY(-1px); box-shadow: 0 6px 22px rgba(61,186,133,0.45); }
        .btn-submit:active { transform: translateY(0); }

        .links { display: flex; justify-content: space-between; align-items: center; margin-top: 1rem; }
        .link { font-size: 0.79rem; color: var(--green-accent); font-weight: 600; text-decoration: none; background: none; border: none; cursor: pointer; font-family: 'DM Sans', sans-serif; }
        .link:hover { text-decoration: underline; }

        .timer { text-align: center; font-size: 0.8rem; color: var(--text-light); }
        .timer span { color: var(--text-dark); font-weight: 600; transition: color 0.3s; }

        @keyframes fadeIn{from{opacity:0;}to{opacity:1;}} @keyframes fadeUp{from{opacity:0;transform:translateY(18px);}to{opacity:1;transform:translateY(0);}}
        @media(max-width:700px){.left{display:none;}.right{background:var(--card-bg);padding:2rem 1.5rem 3rem;}}
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
            <<div class="left-tagline">Anti-rabies Network for Bite Incident Tracking and Evaluation</div>
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
            <button class="dark-toggle" id="darkToggle" aria-label="Toggle dark mode"></button>
        </div>

        <div class="card">
            <div class="otp-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--green-accent)" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            </div>
            
            <div class="card-title">Verify Your Account</div>
            <div class="card-sub">
                We sent a 6-digit code to your email.<br>
                Enter it below to activate your account.
            </div>

            @if (session('info'))
                <div class="alert alert-info">{{ session('info') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('otp.verify') }}" id="otpForm">
                @csrf
                <div class="otp-boxes">
                    <input class="otp-box" type="text" maxlength="1" id="b1" inputmode="numeric">
                    <input class="otp-box" type="text" maxlength="1" id="b2" inputmode="numeric">
                    <input class="otp-box" type="text" maxlength="1" id="b3" inputmode="numeric">
                    <input class="otp-box" type="text" maxlength="1" id="b4" inputmode="numeric">
                    <input class="otp-box" type="text" maxlength="1" id="b5" inputmode="numeric">
                    <input class="otp-box" type="text" maxlength="1" id="b6" inputmode="numeric">
                </div>
                <input type="hidden" name="otp" id="otpHidden">

                <button type="submit" class="btn-submit">Done</button>
            </form>

            <div class="timer">
                Code expires in <span id="countdown">10:00</span>
            </div>

            <div class="links">
                <form method="POST" action="{{ route('otp.resend') }}" style="display:inline">
                    @csrf
                    <button type="submit" class="link">Resend Code</button>
                </form>
                <a href="{{ route('register') }}" class="link">Back to Register</a>
            </div>
        </div>
    </div>
</div>

<script>
    /* Dark Mode */
    const html = document.getElementById('htmlRoot');
    const toggleBtn = document.getElementById('darkToggle');
    if (localStorage.getItem('anbite-dark') === 'true') html.classList.add('dark');
    toggleBtn.addEventListener('click', () => {
        html.classList.toggle('dark');
        localStorage.setItem('anbite-dark', html.classList.contains('dark'));
    });

    /* Auto-advance OTP Boxes */
    const boxes = ['b1','b2','b3','b4','b5','b6'];
    boxes.forEach((id, index) => {
        const input = document.getElementById(id);
        input.addEventListener('input', () => {
            input.value = input.value.replace(/[^0-9]/g, '');
            if (input.value && index < boxes.length - 1) document.getElementById(boxes[index + 1]).focus();
        });
        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && !input.value && index > 0) document.getElementById(boxes[index - 1]).focus();
        });
    });

    /* Combine before submit */
    document.getElementById('otpForm').addEventListener('submit', () => {
        document.getElementById('otpHidden').value = boxes.map(id => document.getElementById(id).value).join('');
    });

    /* Timer */
    let seconds = 600;
    const countdown = document.getElementById('countdown');
    const timer = setInterval(() => {
        seconds--;
        const m = Math.floor(seconds / 60).toString().padStart(2, '0');
        const s = (seconds % 60).toString().padStart(2, '0');
        countdown.textContent = m + ':' + s;
        if (seconds <= 0) {
            clearInterval(timer);
            countdown.textContent = 'Expired';
            countdown.style.color = '#dc2626';
        }
    }, 1000);
</script>
</body>
</html>