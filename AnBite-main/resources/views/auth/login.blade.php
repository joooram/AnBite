<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- =========================================================
         BROWSER / SEO SETTINGS
    ========================================================== --}}
    <meta name="theme-color" content="#d8f2e3">
    <meta name="robots" content="noindex, nofollow">

    {{-- =========================================================
         FAVICON
    ========================================================== --}}
    <link
        rel="icon"
        type="image/png"
        href="{{ asset('images/ANBITE NEW LOGO.png') }}"
    >

    <title>Login — AnBite</title>


    {{-- =========================================================
         INTER FONT
    ========================================================== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >


    {{-- =========================================================
         LARAVEL VITE
    ========================================================== --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body
    class="font-['Inter',sans-serif] min-h-screen flex items-center justify-center p-4"
    style="
        margin: 0;
        min-height: 100vh;
        background: linear-gradient(
            to top,
            #8bcfa8 20%,
            #b7e3c9 50%,
            #d8f1e2 70%,
            #edf9f2 80%,
            #ffffff 90%
        );
    "
>


    {{-- =========================================================
         MAIN LOGIN CONTAINER

         Everything remains centered.
    ========================================================== --}}
    <main class="relative z-10 flex w-full flex-col items-center justify-center">


        {{-- =========================================================
             LOGOS

             AnBite + CHO logos are intentionally larger and have
             a subtle shadow so they remain noticeable against
             the light green gradient.
        ========================================================== --}}
        <div class="mb-6 flex items-center justify-center gap-6">


            {{-- =====================================================
                 ANBITE LOGO
            ====================================================== --}}
            <img
                src="{{ asset('images/ANBITE NEW LOGO.png') }}"
                alt="AnBite"
                width="80"
                height="80"
                class="
                    h-16
                    w-auto
                    object-contain
                    drop-shadow-[0_4px_8px_rgba(26,40,32,0.25)]
                    sm:h-[72px]
                "
            >


            {{-- =====================================================
                 DIVIDER
            ====================================================== --}}
            <div
                class="h-10 w-px bg-[#1a2820]/35"
                aria-hidden="true"
            ></div>


            {{-- =====================================================
                 CITY HEALTH OFFICE LOGO
            ====================================================== --}}
            <img
                src="{{ asset('images/CHO LOGO.png') }}"
                alt="City Health Office, Batangas City"
                width="80"
                height="80"
                class="
                    h-16
                    w-auto
                    object-contain
                    drop-shadow-[0_4px_8px_rgba(26,40,32,0.25)]
                    sm:h-[72px]
                "
            >

        </div>



        {{-- =========================================================
             LOGIN CARD

             Original single-card design preserved.
        ========================================================== --}}
        <div
            class="
                w-full
                max-w-[340px]
                rounded-2xl
                bg-[#1a2820]
                p-6
                shadow-[0_4px_24px_rgba(0,0,0,0.4)]
                sm:p-7
            "
        >


            {{-- =====================================================
                 LOGIN TITLE
            ====================================================== --}}
            <h1
                class="
                    mb-1
                    text-center
                    text-xl
                    font-bold
                    tracking-tight
                    text-[#e8f5ee]
                "
            >
                Login
            </h1>


            <p
                class="
                    mb-5
                    text-center
                    text-xs
                    text-[#88aa99]
                "
            >
                Log to your AnBite account
            </p>



            {{-- =====================================================
                 SUCCESS / STATUS MESSAGE
            ====================================================== --}}
            @if (session('status'))

                <div
                    role="status"
                    class="
                        mb-4
                        rounded-md
                        border
                        border-[#2f6b51]
                        bg-[#1f3028]
                        p-2.5
                        text-center
                        text-xs
                        text-[#8fe3bd]
                    "
                >
                    {{ session('status') }}
                </div>

            @endif



            {{-- =====================================================
                 VALIDATION ERRORS
            ====================================================== --}}
            @if ($errors->any())

                <div
                    role="alert"
                    aria-live="assertive"
                    class="
                        mb-4
                        rounded-md
                        border
                        border-[#ffcdd2]
                        bg-[#ffeaea]
                        p-2.5
                        text-xs
                        text-[#b3261e]
                    "
                >

                    @foreach ($errors->all() as $error)

                        <p class="{{ !$loop->last ? 'mb-1' : '' }}">
                            {{ $error }}
                        </p>

                    @endforeach

                </div>

            @endif



            {{-- =====================================================
                 LOGIN FORM
            ====================================================== --}}
            <form
                method="POST"
                action="{{ route('login') }}"
                id="loginForm"
                novalidate
            >

                @csrf



                {{-- =================================================
                     USERNAME
                ================================================== --}}
                <div class="mb-3.5">

                    <label
                        for="username"
                        class="
                            mb-1.5
                            block
                            text-xs
                            font-medium
                            text-[#e8f5ee]
                        "
                    >
                        Username
                    </label>


                    <div class="group relative">


                        {{-- USERNAME ICON --}}
                        <span
                            class="
                                pointer-events-none
                                absolute
                                left-3
                                top-1/2
                                flex
                                -translate-y-1/2
                                text-[#6b9980]
                                transition-colors
                                duration-200
                                group-focus-within:text-[#3dba85]
                            "
                            aria-hidden="true"
                        >

                            <svg
                                width="16"
                                height="16"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                            >

                                <path
                                    d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"
                                />

                                <circle
                                    cx="12"
                                    cy="7"
                                    r="4"
                                />

                            </svg>

                        </span>



                        {{-- USERNAME INPUT --}}
                        <input
                            type="text"
                            id="username"
                            name="username"
                            value="{{ old('username') }}"
                            placeholder="Enter your username"
                            required
                            autofocus
                            autocomplete="username"
                            autocapitalize="none"
                            autocorrect="off"
                            spellcheck="false"

                            @error('username')
                                aria-invalid="true"
                                aria-describedby="username-error"
                            @enderror

                            class="
                                w-full
                                rounded-lg
                                border
                                bg-[#1f3028]
                                py-2
                                pl-9
                                pr-3
                                text-base
                                text-[#e8f5ee]
                                outline-none
                                transition-all
                                duration-200
                                placeholder:text-[#8fb3a2]/70
                                focus:ring-2
                                focus:ring-[#3dba85]/30
                                sm:text-sm

                                @error('username')
                                    border-[#e57373]
                                    focus:border-[#e57373]
                                @else
                                    border-[#2a4035]
                                    focus:border-[#3dba85]
                                @enderror
                            "
                        >

                    </div>



                    {{-- USERNAME ERROR --}}
                    @error('username')

                        <p
                            id="username-error"
                            class="mt-1 text-[0.7rem] text-[#ff9f9f]"
                        >
                            {{ $message }}
                        </p>

                    @enderror

                </div>



                {{-- =================================================
                     PASSWORD
                ================================================== --}}
                <div class="mb-2">

                    <label
                        for="password"
                        class="
                            mb-1.5
                            block
                            text-xs
                            font-medium
                            text-[#e8f5ee]
                        "
                    >
                        Password
                    </label>


                    <div class="group relative">


                        {{-- PASSWORD ICON --}}
                        <span
                            class="
                                pointer-events-none
                                absolute
                                left-3
                                top-1/2
                                flex
                                -translate-y-1/2
                                text-[#6b9980]
                                transition-colors
                                duration-200
                                group-focus-within:text-[#3dba85]
                            "
                            aria-hidden="true"
                        >

                            <svg
                                width="16"
                                height="16"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                            >

                                <rect
                                    x="3"
                                    y="11"
                                    width="18"
                                    height="11"
                                    rx="2"
                                />

                                <path
                                    d="M7 11V7a5 5 0 0 1 10 0v4"
                                />

                            </svg>

                        </span>



                        {{-- PASSWORD INPUT --}}
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Enter your password"
                            required
                            autocomplete="current-password"

                            @error('password')
                                aria-invalid="true"
                                aria-describedby="password-error"
                            @enderror

                            class="
                                w-full
                                rounded-lg
                                border
                                bg-[#1f3028]
                                py-2
                                pl-9
                                pr-10
                                text-base
                                text-[#e8f5ee]
                                outline-none
                                transition-all
                                duration-200
                                placeholder:text-[#8fb3a2]/70
                                focus:ring-2
                                focus:ring-[#3dba85]/30
                                sm:text-sm

                                @error('password')
                                    border-[#e57373]
                                    focus:border-[#e57373]
                                @else
                                    border-[#2a4035]
                                    focus:border-[#3dba85]
                                @enderror
                            "
                        >



                        {{-- =================================================
                             SHOW / HIDE PASSWORD
                        ================================================== --}}
                        <button
                            type="button"
                            id="togglePw"
                            aria-label="Show password"
                            aria-pressed="false"
                            aria-controls="password"
                            class="
                                absolute
                                right-2
                                top-1/2
                                flex
                                -translate-y-1/2
                                items-center
                                rounded-md
                                border-none
                                bg-transparent
                                p-1.5
                                text-[#6b9980]
                                transition-colors
                                duration-200
                                hover:text-[#3dba85]
                                focus-visible:outline
                                focus-visible:outline-2
                                focus-visible:outline-offset-2
                                focus-visible:outline-[#3dba85]
                            "
                        >

                            <svg
                                id="eyeIco"
                                width="16"
                                height="16"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                aria-hidden="true"
                            >

                                <path
                                    d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"
                                />

                                <circle
                                    cx="12"
                                    cy="12"
                                    r="3"
                                />

                            </svg>

                        </button>

                    </div>



                    {{-- PASSWORD ERROR --}}
                    @error('password')

                        <p
                            id="password-error"
                            class="mt-1 text-[0.7rem] text-[#ff9f9f]"
                        >
                            {{ $message }}
                        </p>

                    @enderror



                    {{-- =================================================
                         CAPS LOCK WARNING
                    ================================================== --}}
                    <p
                        id="capsWarn"
                        role="status"
                        class="
                            mt-1.5
                            hidden
                            items-center
                            gap-1
                            text-[0.7rem]
                            text-[#ffcc80]
                        "
                    >

                        <svg
                            width="12"
                            height="12"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            aria-hidden="true"
                        >

                            <path d="M12 9v4" />

                            <path d="M12 17h.01" />

                            <path
                                d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"
                            />

                        </svg>

                        Caps Lock is on

                    </p>

                </div>



                {{-- =================================================
                     REMEMBER ME / FORGOT PASSWORD
                ================================================== --}}
                <div
                    class="
                        mb-4
                        mt-3
                        flex
                        items-center
                        justify-between
                    "
                >

                    {{-- REMEMBER ME --}}
                    <label
                        for="remember"
                        class="
                            flex
                            cursor-pointer
                            select-none
                            items-center
                            gap-1.5
                            text-xs
                            text-[#9ec0b0]
                        "
                    >

                        <input
                            type="checkbox"
                            id="remember"
                            name="remember"
                            value="1"
                            {{ old('remember') ? 'checked' : '' }}
                            class="
                                h-3.5
                                w-3.5
                                cursor-pointer
                                accent-[#3dba85]
                            "
                        >

                        Remember me

                    </label>



                    {{-- FORGOT PASSWORD --}}
                    @if (Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="
                                rounded
                                text-xs
                                font-semibold
                                text-[#3dba85]
                                hover:underline
                                focus-visible:outline
                                focus-visible:outline-2
                                focus-visible:outline-offset-2
                                focus-visible:outline-[#3dba85]
                            "
                        >
                            Forgot Password?
                        </a>

                    @endif

                </div>



                {{-- =================================================
                     LOGIN BUTTON
                ================================================== --}}
                <button
                    type="submit"
                    id="loginBtn"
                    class="
                        relative
                        flex
                        w-full
                        items-center
                        justify-center
                        gap-2
                        overflow-hidden
                        rounded-lg
                        border-none
                        bg-[#3dba85]
                        px-4
                        py-2.5
                        text-sm
                        font-semibold
                        text-white
                        shadow-[0_2px_12px_rgba(61,186,133,0.35)]
                        transition-all
                        duration-200
                        hover:-translate-y-px
                        hover:bg-[#30a873]
                        hover:shadow-[0_4px_16px_rgba(61,186,133,0.45)]
                        active:translate-y-0
                        focus-visible:outline
                        focus-visible:outline-2
                        focus-visible:outline-offset-2
                        focus-visible:outline-[#3dba85]
                        disabled:cursor-not-allowed
                        disabled:translate-y-0
                        disabled:opacity-70
                    "
                >

                    <span id="btnTxt">
                        Log in
                    </span>


                    {{-- LOADING SPINNER --}}
                    <span
                        id="spin"
                        class="
                            hidden
                            h-3.5
                            w-3.5
                            animate-spin
                            rounded-full
                            border-2
                            border-white/30
                            border-t-white
                        "
                        aria-hidden="true"
                    ></span>

                </button>

            </form>

        </div>

    </main>



    {{-- =============================================================
         LOGIN PAGE JAVASCRIPT
    ============================================================= --}}
    <script>

        (function () {

            'use strict';


            // =========================================================
            // ELEMENT REFERENCES
            // =========================================================

            var pwField = document.getElementById('password');
            var togglePw = document.getElementById('togglePw');
            var eyeIco = document.getElementById('eyeIco');
            var capsWarn = document.getElementById('capsWarn');
            var loginForm = document.getElementById('loginForm');
            var loginBtn = document.getElementById('loginBtn');
            var btnTxt = document.getElementById('btnTxt');
            var spin = document.getElementById('spin');



            // =========================================================
            // PASSWORD SHOW / HIDE
            // =========================================================

            var EYE_OPEN =
                '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>' +
                '<circle cx="12" cy="12" r="3"/>';


            var EYE_CLOSED =
                '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>' +
                '<line x1="1" y1="1" x2="23" y2="23"/>';


            togglePw.addEventListener(
                'click',
                function () {

                    var nowVisible =
                        pwField.type === 'password';


                    pwField.type = nowVisible
                        ? 'text'
                        : 'password';


                    eyeIco.innerHTML = nowVisible
                        ? EYE_CLOSED
                        : EYE_OPEN;


                    togglePw.setAttribute(
                        'aria-pressed',
                        String(nowVisible)
                    );


                    togglePw.setAttribute(
                        'aria-label',
                        nowVisible
                            ? 'Hide password'
                            : 'Show password'
                    );


                    pwField.focus();

                }
            );



            // =========================================================
            // CAPS LOCK DETECTION
            // =========================================================

            function checkCaps(e) {

                if (
                    typeof e.getModifierState !==
                    'function'
                ) {
                    return;
                }


                var capsOn =
                    e.getModifierState('CapsLock');


                capsWarn.classList.toggle(
                    'hidden',
                    !capsOn
                );


                capsWarn.classList.toggle(
                    'flex',
                    capsOn
                );

            }


            pwField.addEventListener(
                'keyup',
                checkCaps
            );


            pwField.addEventListener(
                'keydown',
                checkCaps
            );


            pwField.addEventListener(
                'blur',
                function () {

                    capsWarn.classList.add(
                        'hidden'
                    );

                    capsWarn.classList.remove(
                        'flex'
                    );

                }
            );



            // =========================================================
            // LOGIN LOADING STATE
            // =========================================================

            var submitting = false;


            loginForm.addEventListener(
                'submit',
                function (e) {

                    if (submitting) {

                        e.preventDefault();

                        return;

                    }


                    if (!loginForm.checkValidity()) {

                        e.preventDefault();

                        loginForm.reportValidity();

                        return;

                    }


                    submitting = true;


                    btnTxt.textContent =
                        'Signing in…';


                    spin.classList.remove(
                        'hidden'
                    );


                    loginBtn.setAttribute(
                        'aria-busy',
                        'true'
                    );


                    loginBtn.classList.add(
                        'opacity-70',
                        'cursor-not-allowed'
                    );

                }
            );



            // =========================================================
            // RESTORE BUTTON AFTER BROWSER BACK
            // =========================================================

            window.addEventListener(
                'pageshow',
                function (evt) {

                    if (!evt.persisted) {
                        return;
                    }


                    submitting = false;


                    btnTxt.textContent =
                        'Log in';


                    spin.classList.add(
                        'hidden'
                    );


                    loginBtn.removeAttribute(
                        'aria-busy'
                    );


                    loginBtn.classList.remove(
                        'opacity-70',
                        'cursor-not-allowed'
                    );

                }
            );

        })();

    </script>


</body>

</html>