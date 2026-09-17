<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AnBite — Dashboard</title>

    {{-- =========================================================
         EXTERNAL LIBRARIES
         FUNCTIONALITY UNCHANGED
    ========================================================== --}}

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Leaflet --}}
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    >

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    {{-- Favicon --}}
    <link
        rel="icon"
        type="image/png"
        href="{{ asset('images/2ndlogo.png') }}"
    >

    {{-- Poppins Font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    {{-- Tailwind CSS through Laravel Vite --}}
    @vite('resources/css/app.css')

</head>


<body
    class="m-0 min-h-screen overflow-x-hidden bg-gradient-to-br from-[#f4f8f5] via-[#f3f4f6] to-[#eaf4ed] font-['Poppins',sans-serif]"
>

    @stack('scripts')


    {{-- =========================================================
         SIDEBAR
         FUNCTIONALITY UNCHANGED
    ========================================================== --}}

    @include('layouts.sidebar')


    {{-- =========================================================
         MAIN CONTENT
         
         IMPORTANT:
         The margin-left is controlled automatically by JavaScript
         according to the current sidebar width.
    ========================================================== --}}

    <main
        id="dashboardMain"
        class="min-w-0 p-6 transition-[margin-left] duration-300 ease-in-out"
        style="margin-left: 230px;"
    >


        {{-- =====================================================
             TOP HEADER
        ====================================================== --}}

        <div class="mb-5 flex items-center justify-between">

            <div>

                <div class="flex items-center gap-3">

                    <div class="h-8 w-1 rounded-full bg-gradient-to-b from-[#1a3a1a] to-[#6abf69]"></div>

                    <div>

                        <div class="text-[1.25rem] font-bold leading-tight text-[#163716]">
                            Dashboard
                        </div>

                        <div class="mt-0.5 text-[0.75rem] text-[#7b8794]">
                            Batangas City — {{ date('F Y') }}
                        </div>

                    </div>

                </div>

            </div>


            {{-- Logged-in User --}}
            <div
                class="flex items-center gap-2 rounded-full border border-[#dce6df] bg-white/90 px-3 py-1.5 text-[0.78rem] font-medium text-[#1a3a1a] shadow-[0_2px_8px_rgba(20,60,30,0.05)]"
            >

                <div
                    class="flex h-[30px] w-[30px] items-center justify-center rounded-full bg-gradient-to-br from-[#1a3a1a] to-[#3c7a3c] text-[0.7rem] font-bold text-white"
                >
                    {{ substr(Auth::user()->first_name, 0, 1) }}
                </div>

                {{ Auth::user()->first_name }}
                {{ Auth::user()->last_name }}

            </div>

        </div>


        {{-- =====================================================
             QUICK CASE OVERVIEW
             COMPACT KPI AREA
        ====================================================== --}}

        <div class="mb-5 grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-6">


            {{-- TOTAL BITE CASES --}}
            <div
                class="group relative overflow-hidden rounded-xl border border-[#e3ebe5] bg-white p-4 shadow-[0_3px_12px_rgba(0,0,0,0.035)] transition-all duration-200 hover:-translate-y-0.5 hover:shadow-[0_7px_18px_rgba(0,0,0,0.07)] before:absolute before:left-0 before:top-0 before:h-full before:w-1 before:bg-gradient-to-b before:from-[#1a3a1a] before:to-[#6abf69]"
            >

                <div class="flex items-start justify-between">

                    <div>

                        <div class="mb-1 text-[0.62rem] font-semibold uppercase tracking-[0.06em] text-[#7b8794]">
                            Total Bite Cases
                        </div>

                        <div class="text-[1.9rem] font-extrabold leading-none text-[#142014]">
                            35
                        </div>

                    </div>

                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#fef2f2]">

                        <svg
                            class="h-[20px] w-[20px]"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 640"
                        >
                            <path d="M256 32C269.3 32 280 42.7 280 56L280 67C288.6 69.2 296.9 72.6 304.8 77.3L311 71C320.4 61.6 335.6 61.6 344.9 71C354.2 80.4 354.3 95.6 344.9 104.9L338.6 111.2C343.2 119 346.6 127.4 348.9 136L359.9 136C373.2 136 383.9 146.7 383.9 160C383.9 173.3 373.2 184 359.9 184L348.9 184C346.7 192.6 343.3 200.9 338.6 208.8L345 215C354.4 224.4 354.4 239.6 345 248.9C335.6 258.2 320.4 258.3 311.1 248.9L307 244.8L276.9 274.9L281 279C290.4 288.4 290.4 303.6 281 312.9C271.6 322.2 256.4 322.3 247.1 312.9L243 308.8C233 318.8 223 328.8 212.9 338.9L217 343C226.4 352.4 226.4 367.6 217 376.9C207.6 386.2 192.4 386.3 183.1 376.9L176.8 370.6C169 375.2 160.6 378.6 152 380.9L152 391.9C152 405.2 141.3 415.9 128 415.9C114.7 415.9 104 405.2 104 391.9L104 380.9C95.4 378.7 87.1 375.3 79.2 370.6L73 377C63.6 386.4 48.4 386.4 39.1 377C29.8 367.6 29.7 352.4 39.1 343.1L45.4 336.8C40.8 329 37.4 320.6 35.1 312L24.1 312C10.8 312 .1 301.3 .1 288C.1 274.7 10.8 264 24.1 264L35.1 264C37.3 255.4 40.7 247.1 45.4 239.2L39 233C29.6 223.6 29.6 208.4 39 199.1C48.4 189.8 63.6 189.7 72.9 199.1L77 203.2C87 193.2 97 183.2 107.1 173.1L103 169C93.6 159.6 93.6 144.4 103 135.1C112.4 125.8 127.6 125.7 136.9 135.1L141 139.2L171.1 109.1L167 105C157.6 95.6 157.6 80.4 167 71.1C176.4 61.8 191.6 61.7 201 71L207.3 77.3C215.1 72.7 223.5 69.3 232.1 67L232.1 56C232.1 42.7 242.8 32 256.1 32zM128 320C145.7 320 160 305.7 160 288C160 270.3 145.7 256 128 256C110.3 256 96 270.3 96 288C96 305.7 110.3 320 128 320zM240 208C240 190.3 225.7 176 208 176C190.3 176 176 190.3 176 208C176 225.7 190.3 240 208 240C225.7 240 240 225.7 240 208zM536 248L536 259C544.6 261.2 552.9 264.6 560.8 269.3L567 263C576.4 253.6 591.6 253.6 600.9 263C610.2 272.4 610.3 287.6 600.9 296.9L594.6 303.2C599.2 311 602.6 319.4 604.9 328L615.9 328C629.2 328 639.9 338.7 639.9 352C639.9 365.3 629.2 376 615.9 376L604.9 376C602.7 384.6 599.3 392.9 594.6 400.8L601 407C610.4 416.4 610.4 431.6 601 440.9C591.6 450.2 576.4 450.3 567.1 440.9L563 436.8L532.9 466.9L537 471C546.4 480.4 546.4 495.6 537 504.9C527.6 514.2 512.4 514.3 503.1 504.9L499 500.8C489 510.8 479 520.8 468.9 530.9L473 535C482.4 544.4 482.4 559.6 473 568.9C463.6 578.2 448.4 578.3 439.1 568.9L432.8 562.6C425 567.2 416.6 570.6 408 572.9L408 583.9C408 597.2 397.3 607.9 384 607.9C370.7 607.9 360 597.2 360 583.9L360 572.9C351.4 570.7 343.1 567.3 335.2 562.6L329 569C319.6 578.4 304.4 578.4 295.1 569C285.8 559.6 285.7 544.4 295.1 535.1L301.4 528.8C296.8 521 293.4 512.6 291.1 504L280.1 504C266.8 504 256.1 493.3 256.1 480C256.1 466.7 266.8 456 280.1 456L291.1 456C293.3 447.4 296.7 439.1 301.4 431.2L295 425C285.6 415.6 285.6 400.4 295 391.1C304.4 381.8 319.6 381.7 328.9 391.1L333 395.2C343 385.2 353 375.2 363.1 365.1L359 361C349.6 351.6 349.6 336.4 359 327.1C368.4 317.8 383.6 317.7 392.9 327.1L397 331.2L427.1 301.1L423 297C413.6 287.6 413.6 272.4 423 263.1C432.4 253.8 447.6 253.7 456.9 263.1L463.2 269.4C471 264.8 479.4 261.4 488 259.1L488 248.1C488 234.8 498.7 224.1 512 224.1C525.3 224.1 536 234.8 536 248.1zM448 448C448 430.3 433.7 416 416 416C398.3 416 384 430.3 384 448C384 465.7 398.3 480 416 480C433.7 480 448 465.7 448 448z"/>
                        </svg>

                    </div>

                </div>

                <div class="mt-2 text-[0.68rem] text-[#7b8794]">
                    All recorded cases
                </div>

            </div>


            {{-- TOTAL VACCINATED --}}
            <div
                class="group relative overflow-hidden rounded-xl border border-[#e3ebe5] bg-white p-4 shadow-[0_3px_12px_rgba(0,0,0,0.035)] transition-all duration-200 hover:-translate-y-0.5 hover:shadow-[0_7px_18px_rgba(0,0,0,0.07)] before:absolute before:left-0 before:top-0 before:h-full before:w-1 before:bg-[#3a9b72]"
            >

                <div class="flex items-start justify-between">

                    <div>

                        <div class="mb-1 text-[0.62rem] font-semibold uppercase tracking-[0.06em] text-[#7b8794]">
                            Total Vaccinated
                        </div>

                        <div class="text-[1.9rem] font-extrabold leading-none text-[#142014]">
                            30
                        </div>

                    </div>

                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#E1F5EE]">

                        <svg
                            class="h-[20px] w-[20px]"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 640"
                        >
                            <path d="M529.5 47C520.1 37.6 504.9 37.6 495.6 47C486.3 56.4 486.2 71.6 495.6 80.9L510.6 95.9L464.5 142L401.5 79C392.1 69.6 376.9 69.6 367.6 79C358.3 88.4 358.2 103.6 367.6 112.9L374.6 119.9L296.5 198L337.5 239C346.9 248.4 346.9 263.6 337.5 272.9C328.1 282.2 312.9 282.3 303.6 272.9L262.6 231.9L216.5 278L257.5 319C266.9 328.4 266.9 343.6 257.5 352.9C248.1 362.2 232.9 362.3 223.6 352.9L182.6 311.9L144.9 349.6C134.4 360.1 128.5 374.3 128.5 389.2L128.5 478L71.5 535C62.1 544.4 62.1 559.6 71.5 568.9C80.9 578.2 96.1 578.3 105.4 568.9L162.4 511.9L251.2 511.9C266.1 511.9 280.3 506 290.8 495.5L520.5 265.8L527.5 272.8C536.9 282.2 552.1 282.2 561.4 272.8C570.7 263.4 570.8 248.2 561.4 238.9L498.4 175.9L544.5 129.8L559.5 144.8C568.9 154.2 584.1 154.2 593.4 144.8C602.7 135.4 602.8 120.2 593.4 110.9L529.4 46.9z"/>
                        </svg>

                    </div>

                </div>

                <div class="mt-2 text-[0.68rem] text-[#7b8794]">
                    Completed PEP
                </div>

            </div>


            {{-- NOTIFIED PATIENT --}}
            <div
                class="group relative overflow-hidden rounded-xl border border-[#e3ebe5] bg-white p-4 shadow-[0_3px_12px_rgba(0,0,0,0.035)] transition-all duration-200 hover:-translate-y-0.5 hover:shadow-[0_7px_18px_rgba(0,0,0,0.07)] before:absolute before:left-0 before:top-0 before:h-full before:w-1 before:bg-[#d6a642]"
            >

                <div class="flex items-start justify-between">

                    <div>

                        <div class="mb-1 text-[0.62rem] font-semibold uppercase tracking-[0.06em] text-[#7b8794]">
                            Notified Patient
                        </div>

                        <div class="text-[1.9rem] font-extrabold leading-none text-[#142014]">
                            30
                        </div>

                    </div>

                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#FAEEDA]">

                        <svg
                            class="h-[20px] w-[20px]"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 640"
                        >
                            <path d="M320 64C334.7 64 348.2 72.1 355.2 85L571.2 485C577.9 497.4 577.6 512.4 570.4 524.5C563.2 536.6 550.1 544 536 544L104 544C89.9 544 76.8 536.6 69.6 524.5C62.4 512.4 62.1 497.4 68.8 485L284.8 85C291.8 72.1 305.3 64 320 64zM320 416C302.3 416 288 430.3 288 448C288 465.7 302.3 480 320 480C337.7 480 352 465.7 352 448C352 430.3 337.7 416 320 416zM320 224C301.8 224 287.3 239.5 288.6 257.7L296 361.7C296.9 374.2 307.4 384 319.9 384C332.5 384 342.9 374.3 343.8 361.7L351.2 257.7C352.5 239.5 338.1 224 319.8 224z"/>
                        </svg>

                    </div>

                </div>

                <div class="mt-2 text-[0.68rem] text-[#7b8794]">
                    Notified
                </div>

            </div>


            {{-- DOG BITES --}}
            <div
                class="group relative overflow-hidden rounded-xl border border-[#e3ebe5] bg-white p-4 shadow-[0_3px_12px_rgba(0,0,0,0.035)] transition-all duration-200 hover:-translate-y-0.5 hover:shadow-[0_7px_18px_rgba(0,0,0,0.07)] before:absolute before:left-0 before:top-0 before:h-full before:w-1 before:bg-[#3c82bd]"
            >

                <div class="flex items-start justify-between">

                    <div>

                        <div class="mb-1 text-[0.62rem] font-semibold uppercase tracking-[0.06em] text-[#7b8794]">
                            Dog Bites
                        </div>

                        <div class="text-[1.9rem] font-extrabold leading-none text-[#142014]">
                            18
                        </div>

                    </div>

                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#E6F1FB]">

                        <svg
                            class="h-[20px] w-[20px]"
                            fill="#185FA5"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 640"
                        >
                            <path d="M64 176C80.6 176 94.2 188.6 95.8 204.7L96.1 211.3C97.8 227.4 111.4 240 128 240L307.1 240L448 300.4L448 544C448 561.7 433.7 576 416 576L384 576C366.3 576 352 561.7 352 544L352 412.7C328 425 300.8 432 272 432C243.2 432 216 425 192 412.7L192 544C192 561.7 177.7 576 160 576L128 576C110.3 576 96 561.7 96 544L96 298.4C58.7 285.2 32 249.8 32 208C32 190.3 46.3 176 64 176zM387.8 32C395.5 32 402.7 35.6 407.4 41.8L424 64L476.1 64C488.8 64 501 69.1 510 78.1L528 96L584 96C597.3 96 608 106.7 608 120L608 144C608 188.2 572.2 224 528 224L464 224L457 252L332.3 198.6L363.9 51.4C366.3 40.1 376.2 32 387.8 32zM480 108C469 108 460 117 460 128C460 139 469 148 480 148C491 148 500 139 500 128C500 117 491 108 480 108z"/>
                        </svg>

                    </div>

                </div>

                <div class="mt-2 text-[0.68rem] text-[#7b8794]">
                    Canine incidents
                </div>

            </div>


            {{-- CAT BITES --}}
            <div
                class="group relative overflow-hidden rounded-xl border border-[#e3ebe5] bg-white p-4 shadow-[0_3px_12px_rgba(0,0,0,0.035)] transition-all duration-200 hover:-translate-y-0.5 hover:shadow-[0_7px_18px_rgba(0,0,0,0.07)] before:absolute before:left-0 before:top-0 before:h-full before:w-1 before:bg-[#766bc4]"
            >

                <div class="flex items-start justify-between">

                    <div>

                        <div class="mb-1 text-[0.62rem] font-semibold uppercase tracking-[0.06em] text-[#7b8794]">
                            Cat Bites
                        </div>

                        <div class="text-[1.9rem] font-extrabold leading-none text-[#142014]">
                            17
                        </div>

                    </div>

                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#EEEDFE]">

                        <svg
                            class="h-[20px] w-[20px]"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 640"
                        >
                            <path d="M96 160C149 160 192 203 192 256L192 341.8C221.7 297.1 269.8 265.6 325.4 257.8C351 317.8 410.6 359.9 480 359.9C490.9 359.9 501.6 358.8 512 356.8L512 544C512 561.7 497.7 576 480 576C462.3 576 448 561.7 448 544L448 403.2L312 512L368 512C385.7 512 400 526.3 400 544C400 561.7 385.7 576 368 576L224 576C171 576 128 533 128 480L128 256C128 239.4 115.4 225.8 99.3 224.2L92.7 223.9C76.6 222.2 64 208.6 64 192C64 174.3 78.3 160 96 160zM565.8 67.2C576.2 58.5 592 65.9 592 79.5L592 192C592 253.9 541.9 304 480 304C418.1 304 368 253.9 368 192L368 79.5C368 65.9 383.8 58.5 394.2 67.2L448 112L512 112L565.8 67.2zM432 172C421 172 412 181 412 192C412 203 421 212 432 212C443 212 452 203 452 192C452 181 443 172 432 172zM528 172C517 172 508 181 508 192C508 203 517 212 528 212C539 212 548 203 548 192C548 181 539 172 528 172z"/>
                        </svg>

                    </div>

                </div>

                <div class="mt-2 text-[0.68rem] text-[#7b8794]">
                    Feline incidents
                </div>

            </div>


            {{-- UNNOTIFIED PATIENTS --}}
            <div
                class="group relative overflow-hidden rounded-xl border border-[#e3ebe5] bg-white p-4 shadow-[0_3px_12px_rgba(0,0,0,0.035)] transition-all duration-200 hover:-translate-y-0.5 hover:shadow-[0_7px_18px_rgba(0,0,0,0.07)] before:absolute before:left-0 before:top-0 before:h-full before:w-1 before:bg-[#b86b3e]"
            >

                <div class="flex items-start justify-between">

                    <div>

                        <div class="mb-1 text-[0.62rem] font-semibold uppercase tracking-[0.06em] text-[#7b8794]">
                            Unnotified Patients
                        </div>

                        <div class="text-[1.9rem] font-extrabold leading-none text-[#142014]">
                            5
                        </div>

                    </div>

                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#F1EFE8]">

                        <svg
                            class="h-[20px] w-[20px]"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="#5F5E5A"
                            stroke-width="2"
                        >
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="8" x2="12" y2="16"/>
                            <line x1="8" y1="12" x2="16" y2="12"/>
                        </svg>

                    </div>

                </div>

                <div class="mt-2 text-[0.68rem] text-[#a06a48]">
                    Requires attention
                </div>

            </div>

        </div>


        {{-- =====================================================
             TRACKING AREA
             CHART + MAP
        ====================================================== --}}

        <div class="mb-5 grid grid-cols-1 gap-4 xl:grid-cols-[1.25fr_1fr]">


            {{-- =================================================
                 CASE TREND
            ================================================== --}}

            <div
                class="overflow-hidden rounded-2xl border border-[#dfe9e1] bg-white shadow-[0_4px_16px_rgba(0,0,0,0.045)]"
            >

                {{-- Panel Header --}}
                <div class="flex items-center justify-between border-b border-[#edf2ee] px-5 py-3.5">

                    <div>

                        <div class="flex items-center gap-2">

                            <div class="h-2 w-2 rounded-full bg-[#2d6a2d]"></div>

                            <div class="text-[0.88rem] font-semibold text-[#163716]">
                                Bite Case Trend
                            </div>

                        </div>

                        <div class="mt-0.5 text-[0.68rem] text-[#8a9690]">
                            Quarterly cases — Batangas City
                        </div>

                    </div>

                    <span class="rounded-full bg-[#edf7ef] px-2.5 py-1 text-[0.68rem] font-semibold text-[#2d6a2d]">
                        {{ date('Y') }}
                    </span>

                </div>


                {{-- Chart --}}
                <div class="relative h-[260px] w-full px-4 pb-3 pt-2">

                    <canvas id="casesChart"></canvas>

                </div>

            </div>


            {{-- =================================================
                 CASE HOTSPOT MAP
            ================================================== --}}

            <div
                class="overflow-hidden rounded-2xl border border-[#dfe9e1] bg-white shadow-[0_4px_16px_rgba(0,0,0,0.045)]"
            >

                {{-- Panel Header --}}
                <div class="flex items-center justify-between border-b border-[#edf2ee] px-5 py-3.5">

                    <div>

                        <div class="flex items-center gap-2">

                            <div class="h-2 w-2 rounded-full bg-[#3c82bd]"></div>

                            <div class="text-[0.88rem] font-semibold text-[#163716]">
                                Case Hotspot
                            </div>

                        </div>

                        <div class="mt-0.5 text-[0.68rem] text-[#8a9690]">
                            Geographic bite case preview
                        </div>

                    </div>


                    <a
                        href="{{ route('hotspot') }}"
                        class="rounded-full bg-[#edf7ef] px-2.5 py-1 text-[0.68rem] font-semibold text-[#1a3a1a] transition-all hover:bg-[#dceedd] hover:text-[#2d6a2d]"
                    >
                        > View Full Map
                    </a>

                </div>


                {{-- Map --}}
                <div
                    id="heatmapPreview"
                    class="m-3 h-[260px] overflow-hidden rounded-xl"
                ></div>

            </div>

        </div>


        {{-- =====================================================
             PATIENT TRACKING + FOLLOW-UP
        ====================================================== --}}

        <div class="grid grid-cols-1 gap-4 2xl:grid-cols-[2.2fr_1fr]">


            {{-- =================================================
                 PATIENT LOG
            ================================================== --}}

            <div
                class="min-w-0 overflow-hidden rounded-2xl border border-[#dfe9e1] bg-white shadow-[0_4px_16px_rgba(0,0,0,0.045)]"
            >

                {{-- Header --}}
                <div class="flex items-center justify-between border-b border-[#edf2ee] px-5 py-3.5">

                    <div>

                        <div class="flex items-center gap-2">

                            <div class="h-2 w-2 rounded-full bg-[#1a3a1a]"></div>

                            <div class="text-[0.88rem] font-semibold text-[#163716]">
                                Patient Case Tracking
                            </div>

                        </div>

                        <div class="mt-0.5 text-[0.68rem] text-[#8a9690]">
                            Patient Log Records
                        </div>

                    </div>


                    <div class="flex items-center gap-2">

                        <span class="text-[0.68rem] text-[#8a9690]">
                            {{ date('F Y') }}
                        </span>

                        <a
                            href="{{ route('patients.create') }}"
                            class="inline-flex items-center gap-1.5 rounded-full bg-gradient-to-r from-[#1a3a1a] to-[#2d6a2d] px-3.5 py-1.5 text-[0.72rem] font-semibold text-white shadow-[0_2px_7px_rgba(26,58,26,0.18)] transition-all hover:-translate-y-px hover:shadow-[0_4px_10px_rgba(26,58,26,0.25)]"
                        >
                            + Add Patient
                        </a>

                    </div>

                </div>


                {{-- Table --}}
                <div class="overflow-x-auto">

                    <table class="w-full min-w-[760px] border-collapse text-[0.76rem]">

                        <thead>

                            <tr>

                                <th class="bg-[#edf9f2] px-3 py-2.5 text-left text-[0.65rem] font-semibold uppercase tracking-wide text-[#36503c]">
                                    #
                                </th>

                                <th class="bg-[#edf9f2] px-3 py-2.5 text-left text-[0.65rem] font-semibold uppercase tracking-wide text-[#36503c]">
                                    Full Name
                                </th>

                                <th class="bg-[#edf9f2] px-3 py-2.5 text-left text-[0.65rem] font-semibold uppercase tracking-wide text-[#36503c]">
                                    Age / Sex
                                </th>

                                <th class="bg-[#edf9f2] px-3 py-2.5 text-left text-[0.65rem] font-semibold uppercase tracking-wide text-[#36503c]">
                                    Address
                                </th>

                                <th class="bg-[#edf9f2] px-3 py-2.5 text-left text-[0.65rem] font-semibold uppercase tracking-wide text-[#36503c]">
                                    Date of Exposure
                                </th>

                                <th class="bg-[#edf9f2] px-3 py-2.5 text-left text-[0.65rem] font-semibold uppercase tracking-wide text-[#36503c]">
                                    Type
                                </th>

                                <th class="bg-[#edf9f2] px-3 py-2.5 text-left text-[0.65rem] font-semibold uppercase tracking-wide text-[#36503c]">
                                    Source
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            <tr class="transition-colors hover:bg-[#fafcfb]">

                                <td
                                    colspan="7"
                                    class="border-b border-[#edf1ee] px-3 py-[10px] text-[#444]"
                                >

                                    <div class="flex min-h-[110px] flex-col items-center justify-center text-center">

                                        <div class="mb-2 flex h-9 w-9 items-center justify-center rounded-full bg-[#edf7ef] text-[#2d6a2d]">

                                            <svg
                                                class="h-4 w-4"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                            >
                                                <path d="M12 5v14"/>
                                                <path d="M5 12h14"/>
                                            </svg>

                                        </div>

                                        <div class="text-[0.75rem] text-[#9ba5a0]">

                                            No patient records yet.

                                            <a
                                                href="{{ route('patients.create') }}"
                                                class="font-semibold text-[#2d6a2d] transition-colors hover:text-[#1a3a1a]"
                                            >
                                                Add your first patient!
                                            </a>

                                        </div>

                                    </div>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>


            {{-- =================================================
                 MONITORING COLUMN
            ================================================== --}}

            <div class="flex flex-col gap-4">


                {{-- =================================================
                     VACCINATION FOLLOW-UP
                ================================================== --}}

                <div
                    class="overflow-hidden rounded-2xl border border-[#dfe9e1] bg-white shadow-[0_4px_16px_rgba(0,0,0,0.045)]"
                >

                    <div class="border-b border-[#edf2ee] px-4 py-3">

                        <div class="flex items-center justify-between">

                            <div class="flex items-center gap-2">

                                <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-[#E1F5EE]">

                                    <svg
                                        class="h-3.5 w-3.5"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 640 640"
                                    >
                                        <path d="M529.5 47C520.1 37.6 504.9 37.6 495.6 47C486.3 56.4 486.2 71.6 495.6 80.9L510.6 95.9L464.5 142L401.5 79C392.1 69.6 376.9 69.6 367.6 79C358.3 88.4 358.2 103.6 367.6 112.9L374.6 119.9L296.5 198L337.5 239C346.9 248.4 346.9 263.6 337.5 272.9C328.1 282.2 312.9 282.3 303.6 272.9L262.6 231.9L216.5 278L257.5 319C266.9 328.4 266.9 343.6 257.5 352.9C248.1 362.2 232.9 362.3 223.6 352.9L182.6 311.9L144.9 349.6C134.4 360.1 128.5 374.3 128.5 389.2L128.5 478L71.5 535C62.1 544.4 62.1 559.6 71.5 568.9C80.9 578.2 96.1 578.3 105.4 568.9L162.4 511.9L251.2 511.9C266.1 511.9 280.3 506 290.8 495.5L520.5 265.8L527.5 272.8C536.9 282.2 552.1 282.2 561.4 272.8C570.7 263.4 570.8 248.2 561.4 238.9L498.4 175.9L544.5 129.8L559.5 144.8C568.9 154.2 584.1 154.2 593.4 144.8C602.7 135.4 602.8 120.2 593.4 110.9L529.4 46.9z"/>
                                    </svg>

                                </div>

                                <div class="text-[0.82rem] font-semibold text-[#163716]">
                                    Vaccine Follow-up
                                </div>

                            </div>

                            <span class="rounded-full bg-[#f2f5f3] px-2 py-1 text-[0.62rem] text-[#7b8794]">
                                Next 7 days
                            </span>

                        </div>

                    </div>


                    <div class="px-4 py-5">

                        <div class="flex items-center gap-3 rounded-xl border border-dashed border-[#dce7df] bg-[#f8fbf9] p-3">

                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-white shadow-sm">

                                <svg
                                    class="h-4 w-4 text-[#8c9991]"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <circle cx="12" cy="12" r="9"/>
                                    <path d="M12 7v5l3 2"/>
                                </svg>

                            </div>

                            <div>

                                <div class="text-[0.7rem] font-medium text-[#7b8794]">
                                    No upcoming doses scheduled.
                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     RECENT ACTIVITY
                ================================================== --}}

                <div
                    class="overflow-hidden rounded-2xl border border-[#dfe9e1] bg-white shadow-[0_4px_16px_rgba(0,0,0,0.045)]"
                >

                    <div class="border-b border-[#edf2ee] px-4 py-3">

                        <div class="flex items-center gap-2">

                            <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-[#edf7ef]">

                                <div class="h-2 w-2 rounded-full bg-[#2d6a2d]"></div>

                            </div>

                            <div class="text-[0.82rem] font-semibold text-[#163716]">
                                Recent Activity
                            </div>

                        </div>

                    </div>


                    {{-- Activity 1 --}}
                    <div class="flex gap-2.5 border-b border-[#edf1ee] px-4 py-3">

                        <div class="mt-1.5 h-2 w-2 shrink-0 rounded-full bg-[#1a3a1a]"></div>

                        <div>

                            <div class="text-[0.72rem] font-medium text-[#4b5750]">
                                System initialized successfully
                            </div>

                            <div class="mt-0.5 text-[0.62rem] text-[#a4aea8]">
                                Just now
                            </div>

                        </div>

                    </div>


                    {{-- Activity 2 --}}
                    <div class="flex gap-2.5 px-4 py-3">

                        <div class="mt-1.5 h-2 w-2 shrink-0 rounded-full bg-[#2d6a2d]"></div>

                        <div>

                            <div class="text-[0.72rem] font-medium text-[#4b5750]">
                                {{ session('full_name', 'Staff') }} logged in
                            </div>

                            <div class="mt-0.5 text-[0.62rem] text-[#a4aea8]">
                                {{ date('h:i A') }}
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


    </main>


    {{-- =============================================================
         SIDEBAR ↔ DASHBOARD LAYOUT SYNC
         
         IMPORTANT:
         This does NOT replace your sidebar collapse functionality.
         
         It simply watches the existing sidebar for the
         "collapsed" class and adjusts the dashboard accordingly.
    ============================================================= --}}

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const sidebar = document.getElementById('sidebar');
            const dashboardMain = document.getElementById('dashboardMain');

            if (!sidebar || !dashboardMain) {
                return;
            }


            // =====================================================
            // UPDATE DASHBOARD POSITION
            // =====================================================

            function updateDashboardPosition() {

                /*
                 * Get the sidebar's REAL current width.
                 *
                 * This is better than hard-coding 230px / 78px
                 * because the sidebar can change width later.
                 */

                const sidebarWidth = sidebar.getBoundingClientRect().width;


                /*
                 * Move the dashboard to exactly the right side
                 * of the sidebar.
                 */

                dashboardMain.style.marginLeft = `${sidebarWidth}px`;

            }


            // =====================================================
            // INITIAL POSITION
            // =====================================================

            updateDashboardPosition();


            // =====================================================
            // WATCH SIDEBAR COLLAPSE / EXPAND
            // =====================================================

            /*
             * Your existing sidebar changes its class between:
             *
             * .sidebar
             * .sidebar.collapsed
             *
             * MutationObserver detects that change automatically.
             *
             * Therefore we DO NOT need to change the sidebar's
             * existing open/close JavaScript.
             */

            const sidebarObserver = new MutationObserver(function (mutations) {

                let shouldUpdate = false;

                mutations.forEach(function (mutation) {

                    if (
                        mutation.type === 'attributes' &&
                        mutation.attributeName === 'class'
                    ) {
                        shouldUpdate = true;
                    }

                });

                if (shouldUpdate) {

                    /*
                     * Wait one frame so the sidebar's width
                     * transition can update before measuring it.
                     */

                    requestAnimationFrame(function () {
                        updateDashboardPosition();
                    });

                }

            });


            sidebarObserver.observe(sidebar, {
                attributes: true,
                attributeFilter: ['class']
            });


            // =====================================================
            // HANDLE WINDOW RESIZE
            // =====================================================

            window.addEventListener('resize', function () {

                updateDashboardPosition();

            });


            // =====================================================
            // HANDLE SIDEBAR WIDTH TRANSITION
            // =====================================================

            /*
             * Because the sidebar animates its width, update the
             * dashboard continuously while the sidebar is moving.
             */

            sidebar.addEventListener('transitionrun', function () {

                const startTime = performance.now();


                function followSidebar(currentTime) {

                    updateDashboardPosition();


                    /*
                     * Continue while the sidebar is transitioning.
                     * 400ms gives enough time for the sidebar animation.
                     */

                    if (currentTime - startTime < 450) {

                        requestAnimationFrame(followSidebar);

                    }

                }


                requestAnimationFrame(followSidebar);

            });

        });

    </script>


    {{-- =============================================================
         CHART + LEAFLET JAVASCRIPT
         FUNCTIONALITY KEPT THE SAME
    ============================================================= --}}

    <script>

        // =========================================================
        // Chart.js
        // FUNCTIONALITY UNCHANGED
        // =========================================================

        const ctx = document
            .getElementById('casesChart')
            .getContext('2d');

        const casesChart = new Chart(ctx, {

            type: 'line',

            data: {

                labels: [
                    'Q1 (Jan-Mar)',
                    'Q2 (Apr-Jun)',
                    'Q3 (Jul-Sep)',
                    'Q4 (Oct-Dec)'
                ],

                datasets: [{

                    label: 'Bite Cases',

                    data: [55, 95, 108, 76],

                    borderColor: '#2a5240',

                    backgroundColor: 'rgba(42, 82, 64, 0.2)',

                    borderWidth: 2,

                    pointBackgroundColor: '#305930',

                    fill: true,

                    tension: 0.3

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                plugins: {

                    legend: {
                        display: false
                    }

                },

                scales: {

                    y: {
                        beginAtZero: true
                    }

                }

            }

        });


        // =========================================================
        // Leaflet Map Preview
        // FUNCTIONALITY UNCHANGED
        // =========================================================

        const map = L.map(
            'heatmapPreview',
            {
                center: [13.7565, 121.0583],
                zoom: 11,
                zoomControl: false,
                dragging: false,
                scrollWheelZoom: false
            }
        );

        L.tileLayer(
            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            {
                attribution: '© OpenStreetMap'
            }
        ).addTo(map);

    </script>

</body>
</html>