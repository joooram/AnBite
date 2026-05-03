<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/2ndlogo.png') }}">
    <title>AnBite — Create Account</title>
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

        .card-wrap {
            position: relative;
            width: 100%;
            max-width: 360px;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 2rem;
            width: 100%;
            box-shadow: 0 8px 40px rgba(0,0,0,0.18);
        }

        .card h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1a3a1a;
            margin-bottom: 4px;
        }

        .card p {
            font-size: 0.8rem;
            color: #888;
            margin-bottom: 1.2rem;
        }

        .card p a {
            color: #2d6a2d;
            text-decoration: none;
            font-weight: 600;
        }

        .card p a:hover { text-decoration: underline; }

        .row {
            display: flex;
            gap: 10px;
        }

        .row .field { flex: 1; }

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

        .error-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            font-size: 0.78rem;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 1rem;
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
            font-family: 'Segoe UI', sans-serif;
            margin-top: 0.25rem;
        }

        .btn:hover { background: #2d6a2d; }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 1rem;
            font-size: 0.78rem;
            color: #2d6a2d;
            font-weight: 600;
            text-decoration: none;
        }

        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <!-- LEFT HALF: Branding -->
    <div class="page-left">
        <<div class="brand-area">
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

    <!-- RIGHT HALF: Register form -->
    <div class="page-right">
        <div class="card-wrap">
            <div class="card">

                <h2>Create an Account</h2>
                <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>

                {{-- Error messages --}}
                @if ($errors->any())
                    <div class="error-box">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- First Name + Last Name side by side --}}
                    <div class="row">
                        <div class="field">
                            <label>First Name</label>
                            <input
                                type="text"
                                name="first_name"
                                value="{{ old('first_name') }}"
                                placeholder="Juan"
                                required
                            >
                        </div>
                        <div class="field">
                            <label>Last Name</label>
                            <input
                                type="text"
                                name="last_name"
                                value="{{ old('last_name') }}"
                                placeholder="Dela Cruz"
                                required
                            >
                        </div>
                    </div>

                    {{-- Username --}}
                    <label>Username</label>
                    <input
                        type="text"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder="e.g. juan.delacruz"
                        required
                    >

                    {{-- Email --}}
                    <label>Email Address</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="e.g. juan@gmail.com"
                        required
                    >

                    {{-- Password --}}
                    <label>Password</label>
                    <input
                        type="password"
                        name="password"
                        placeholder="Create a password"
                        required
                    >

                    {{-- Confirm Password --}}
                    <label>Confirm Password</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Re-enter your password"
                        required
                    >

                    <button type="submit" class="btn">Create Account</button>

                </form>

                <a href="{{ route('login') }}" class="back-link">Already have an account? Login</a>

            </div>
        </div>
    </div>

</body>
</html>