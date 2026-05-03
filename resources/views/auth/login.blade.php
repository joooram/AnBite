<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">
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
            
            /* MGA BAGONG CODE PARA SA BACKGROUND IMAGE */
            background-image: url('{{ asset("images/loginleft.png") }}');
            background-size: cover;       /* Para sakupin ng picture ang buong 50% width nang hindi na-e-stretch */
            background-position: center;  /* Para laging nakagitna ang picture */
            background-repeat: no-repeat; /* Para hindi mag-doble-doble ang picture kung maliit ito */
            
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

    .login-logo {
            width: 120px; /* Pwede mo itong lakihan o liitan depende sa gusto mo */
            height: auto;
            margin-bottom: 1rem; /* Naglalagay ng espasyo sa pagitan ng logo at ng salitang AnBite */
        }
        .brand {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1a3a1a;
            margin-bottom: 0.5rem;
        }

        .tagline {
            color: #0a400d; /* Halimbawa lang ng kulay ng normal na text */
            font-size: 1rem;
            text-align: center;
            line-height: 1.5;
            max-width: 200px;
        }

        .acronym {
            font-weight: 800; /* Pinaka-bold */
            color: #1a3a1a; /* Light green (papalitan mo ito depende sa theme mo) */
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
            <img src="{{ asset('images/4thlogo.png') }}" alt="AnBite Logo" class="login-logo">
            
            <div class="brand">ANBITE</div>
<div class="tagline">
    <span class="acronym">A</span>nti-rabies 
    <span class="acronym">N</span>etwork for 
    <span class="acronym">B</span>ite 
    <span class="acronym">I</span>ncident 
    <span class="acronym">T</span>racking and 
    <span class="acronym">E</span>valuation
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