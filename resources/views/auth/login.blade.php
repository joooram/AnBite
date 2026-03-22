<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnBite — Login</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
        }

        .page-left {
            width: 50%;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 2rem;
        }

        .page-right {
            width: 50%;
            background: #1a3a1a;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 2rem;
        }

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

        .card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            width: 100%;
            max-width: 340px;
            box-shadow: 0 8px 40px rgba(0,0,0,0.18);
        }

        .card h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1a3a1a;
            margin-bottom: 4px;
        }

        .card-sub {
            font-size: 0.8rem;
            color: #888;
            margin-bottom: 1.5rem;
        }

        .card-sub a {
            color: #2d6a2d;
            text-decoration: none;
            font-weight: 600;
        }

        .card-sub a:hover { text-decoration: underline; }

        .error-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            font-size: 0.78rem;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 1rem;
        }

        .success-box {
            background: #E1F5EE;
            border: 1px solid #5DCAA5;
            color: #0F6E56;
            font-size: 0.78rem;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 1rem;
        }

        label {
            display: block;
            font-size: 0.78rem;
            font-weight: 600;
            color: #2d6a2d;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        input {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid #ddd;
            border-radius: 8px;
            font-size: 0.88rem;
            margin-bottom: 1rem;
            outline: none;
            background: #fafafa;
            font-family: 'Segoe UI', sans-serif;
        }

        input:focus {
            border-color: #2d6a2d;
            background: #fff;
        }

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
            letter-spacing: 0.03em;
            font-family: 'Segoe UI', sans-serif;
        }

        .btn:hover { background: #2d6a2d; }

        .forgot {
            display: block;
            text-align: center;
            margin-top: 1rem;
            font-size: 0.78rem;
            color: #2d6a2d;
            font-weight: 600;
            text-decoration: none;
        }

        .forgot:hover { text-decoration: underline; }
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

    <!-- RIGHT HALF: Login form -->
    <div class="page-right">
        <div class="card">

            <h2>Login</h2>

            <div class="card-sub">
                No account yet? <a href="{{ route('register') }}">Create an Account</a>
            </div>

            {{-- Success message after OTP verification --}}
            @if (session('success'))
                <div class="success-box">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Error message for wrong credentials --}}
            @if ($errors->any())
                <div class="error-box">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <label>Username</label>
                <input
                    type="text"
                    name="username"
                    value="{{ old('username') }}"
                    placeholder="Enter your username"
                    required
                >

                <label>Password</label>
                <input
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >

                <button type="submit" class="btn">Login</button>

            </form>

            <a href="#" class="forgot">Forgot Password?</a>

        </div>
    </div>

</body>
</html>