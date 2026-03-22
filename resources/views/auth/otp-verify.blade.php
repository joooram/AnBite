<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnBite — Verify Your Account</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
        }

        /* LEFT HALF */
        .page-left {
            width: 50%;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 2rem;
        }

        /* RIGHT HALF */
        .page-right {
            width: 50%;
            background: #1a3a1a;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 2rem;
        }

        /* BRANDING */
        .brand-area {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo-circle {
            width: 95px;
            height: 95px;
            background: #1a3a1a;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.2rem;
        }

        .logo-circle svg { width: 44px; height: 44px; }

        .brand {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1a3a1a;
            margin-bottom: 0.5rem;
        }

        .tagline {
            font-size: 0.82rem;
            color: #2d6a2d;
            text-align: center;
            line-height: 1.5;
            max-width: 200px;
        }

        /* WHITE CARD */
        .card {
            background: white;
            border-radius: 14px;
            padding: 2rem;
            width: 100%;
            max-width: 360px;
            box-shadow: 0 8px 40px rgba(0,0,0,0.18);
        }

        .otp-icon {
            width: 60px;
            height: 60px;
            background: #E1F5EE;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        .otp-icon svg { width: 28px; height: 28px; }

        .card h2 {
            font-size: 1.6rem;
            font-weight: 700;
            color: #1a3a1a;
            text-align: center;
            margin-bottom: 6px;
        }

        .card .subtitle {
            font-size: 0.82rem;
            color: #888;
            text-align: center;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        /* INFO / ERROR / SUCCESS MESSAGES */
        .alert {
            font-size: 0.78rem;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 1rem;
            text-align: center;
        }

        .alert-info    { background: #E6F1FB; color: #185FA5; border: 1px solid #85B7EB; }
        .alert-error   { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }
        .alert-success { background: #E1F5EE; color: #0F6E56; border: 1px solid #5DCAA5; }

        /* OTP INPUT BOXES */
        .otp-boxes {
            display: flex;
            gap: 8px;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .otp-box {
            width: 46px;
            height: 54px;
            border: 2px solid #ddd;
            border-radius: 10px;
            font-size: 1.4rem;
            font-weight: 700;
            text-align: center;
            color: #1a3a1a;
            background: #fafafa;
            outline: none;
            transition: border-color 0.2s;
        }

        .otp-box:focus { border-color: #2d6a2d; background: #fff; }

        /* Hidden combined input */
        #otpHidden { display: none; }

        /* VERIFY BUTTON */
        .btn {
            width: 100%;
            padding: 12px;
            background: #1a3a1a;
            color: white;
            border: none;
            border-radius: 99px;
            font-size: 0.92rem;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Segoe UI', sans-serif;
        }

        .btn:hover { background: #2d6a2d; }

        /* RESEND + BACK LINKS */
        .links {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
        }

        .link {
            font-size: 0.78rem;
            color: #2d6a2d;
            font-weight: 600;
            text-decoration: none;
            background: none;
            border: none;
            cursor: pointer;
            font-family: 'Segoe UI', sans-serif;
        }

        .link:hover { text-decoration: underline; }

        /* TIMER */
        .timer {
            text-align: center;
            font-size: 0.75rem;
            color: #aaa;
            margin-top: 8px;
        }

        .timer span { color: #1a3a1a; font-weight: 600; }
    </style>
</head>
<body>

    <!-- LEFT HALF: Branding -->
    <div class="page-left">
        <div class="brand-area">
            <div class="logo-circle">
                <svg viewBox="0 0 42 42" fill="none">
                    <circle cx="21" cy="21" r="20" stroke="white" stroke-width="1.5"/>
                    <rect x="19" y="10" width="4" height="22" rx="2" fill="white"/>
                    <rect x="10" y="19" width="22" height="4" rx="2" fill="white"/>
                </svg>
            </div>
            <div class="brand">AnBite</div>
            <div class="tagline">
                Your Tracking System for Rabies Prevention, Control and Management
            </div>
        </div>
    </div>

    <!-- RIGHT HALF: OTP form -->
    <div class="page-right">
        <div class="card">

            <!-- Email icon -->
            <div class="otp-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="#0F6E56" stroke-width="2">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                    <polyline points="22,6 12,13 2,6"/>
                </svg>
            </div>

            <h2>Verify Your Account</h2>
            <p class="subtitle">
                We sent a 6-digit code to your email.<br>
                Enter it below to activate your account.
            </p>

            {{-- Info message --}}
            @if (session('info'))
                <div class="alert alert-info">{{ session('info') }}</div>
            @endif

            {{-- Error messages --}}
            @if ($errors->any())
                <div class="alert alert-error">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('otp.verify') }}" id="otpForm">
                @csrf

                {{-- 6 individual boxes for UX --}}
                <div class="otp-boxes">
                    <input class="otp-box" type="text" maxlength="1" id="b1" inputmode="numeric">
                    <input class="otp-box" type="text" maxlength="1" id="b2" inputmode="numeric">
                    <input class="otp-box" type="text" maxlength="1" id="b3" inputmode="numeric">
                    <input class="otp-box" type="text" maxlength="1" id="b4" inputmode="numeric">
                    <input class="otp-box" type="text" maxlength="1" id="b5" inputmode="numeric">
                    <input class="otp-box" type="text" maxlength="1" id="b6" inputmode="numeric">
                </div>

                {{-- Hidden input that combines all 6 boxes --}}
                <input type="hidden" name="otp" id="otpHidden">

                <button type="submit" class="btn">Verify Account</button>
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

    <script>
        // ── AUTO-ADVANCE OTP BOXES ──
        const boxes = ['b1','b2','b3','b4','b5','b6'];

        boxes.forEach((id, index) => {
            const input = document.getElementById(id);

            input.addEventListener('input', () => {
                // Only allow numbers
                input.value = input.value.replace(/[^0-9]/g, '');

                // Auto move to next box
                if (input.value && index < boxes.length - 1) {
                    document.getElementById(boxes[index + 1]).focus();
                }
            });

            input.addEventListener('keydown', (e) => {
                // Move back on backspace
                if (e.key === 'Backspace' && !input.value && index > 0) {
                    document.getElementById(boxes[index - 1]).focus();
                }
            });
        });

        // ── COMBINE BOXES INTO HIDDEN INPUT ON SUBMIT ──
        document.getElementById('otpForm').addEventListener('submit', () => {
            const combined = boxes.map(id => document.getElementById(id).value).join('');
            document.getElementById('otpHidden').value = combined;
        });

        // ── COUNTDOWN TIMER (10 minutes) ──
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