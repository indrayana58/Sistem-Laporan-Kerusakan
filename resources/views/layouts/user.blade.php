<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/logo.png')}}" />

    {{-- Style --}}
    @vite('resources/css/app.css')

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Scroll --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <title>@yield('title')</title>

    <style>
        .active {
            color: #032221;
            display: block;
            border-radius: 0.375rem;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
            background-color: whitesmoke;
            transition-duration: 0.3s;
            transition-timing-function: ease-in-out;
        }
    </style>
</head>

<body>
    <section>
        <div class="fixed w-60">
            <div class="humberger p-4 text-2xl cursor-pointer md:hidden">
                <i id="sidebar-open" class="fa-solid fa-bars"></i>
            </div>
            {{-- Nav --}}
            <div
                class="absolute backdrop-blur-3xl bg-darkGreen bg-opacity-80 h-screen z-10 top-0 p-4 -translate-x-full duration-300 md:translate-x-0 md:relative">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="" width="50">
                    <span class="text-white font-semibold font-montserrat text-sm">SMP N 4 Yogyakarta</span>
                </div>
                <div class="w-full  mx-2 mt-5 space-x-2 text-white flex items-center ">
                    <i class="fa-solid fa-user"></i>
                    <h2 class="text-sm font-semibold">{{ Auth::user()->name }}</h2>
                </div>
                <ul class=" w-full mt-5 font-semibold ">
                    <li class="mb-2">
                        <a href="{{ route('user.dashboard') }}"
                            class="flex items-center text-base p-4 rounded-md  hover:text-pine text-pistachio space-x-2 transition duration-300 ease-in-ot {{ Request::is('admin.dashboard*') ? 'active' : '' }}">
                            <i class="fa-solid fa-gauge "></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('user.pelaporan') }}"
                            class="flex items-center text-base p-4 rounded-md  hover:text-pine text-pistachio  space-x-2 transition duration-300 ease-in-out {{ Request::is('admin.pelaporan*') ? 'active' : '' }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <span>Pelaporan</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('user.riwayat') }}"
                            class="flex items-center text-base p-4 rounded-md  hover:text-pine text-pistachio  space-x-2 transition duration-300 ease-in-out {{ Request::is('admin.riwayat*') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            <span>Riwayat Laporan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" id="logout-link"
                            class="flex items-center text-base p-4 rounded-md  hover:text-pine text-pistachio  space-x-2 transition duration-300 ease-in-out">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                    <li class="mt-10">
                        <div class="md:hidden text-3xl text-pistachio cursor-pointer flex justify-center">
                            <i id="sidebar-close" class="fa-solid fa-arrow-left"></i>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        @yield('content')
    </section>
</body>

{{-- Aktive --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const currentLocation = window.location.href;

        const links = document.querySelectorAll('a');
        links.forEach(link => {
            if (link.href === currentLocation) {
                link.classList.add('active');
            }
        });
    });
</script>

{{-- sidebar --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var sidebarOpen = document.getElementById("sidebar-open");
        var sidebarClose = document.getElementById("sidebar-close");
        var sidebar = document.querySelector(".backdrop-blur-3xl");
        var humberger = document.querySelector(".humberger");
        var body = document.querySelector("body");

        // Menambahkan event listener untuk mengaktifkan sidebar saat tombol "sidebar-open" diklik
        sidebarOpen.addEventListener("click", function() {
            sidebar.style.transform = "translateX(0)";
            humberger.classList.add('-translate-x-full');

            // Menambahkan event listener untuk menutup sidebar saat tombol "sidebar-close" diklik
            sidebarClose.addEventListener("click", function() {
                sidebar.style.transform = "translateX(-100%)";
                humberger.classList.remove('-translate-x-full');
            });

            // Menambahkan event listener untuk menutup sidebar saat klik di luar area sidebar
            body.addEventListener("click", function(event) {
                if (event.target !== sidebar && !sidebar.contains(event.target) && event
                    .target !== sidebarOpen) {
                    sidebar.style.transform = "translateX(-100%)";
                    humberger.classList.remove('-translate-x-full');
                }
            });
        });
    });


    // Logout 
    const logoutLink = document.getElementById('logout-link');
    logoutLink.addEventListener('click', function(event) {
        event.preventDefault();

        // Konfirmasi logout
        if (confirm('Apakah Anda yakin ingin keluar?')) {
            window.location.href = logoutLink.getAttribute('href');
        }
    });
</script>

{{-- alert --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var closeButtons = document.querySelectorAll("[data-dismiss-target]");

        closeButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                var targetSelector = button.getAttribute("data-dismiss-target");
                var target = document.querySelector(targetSelector);
                if (target) {
                    target.remove();
                }
            });
        });
    });
</script>

{{-- Script --}}
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</html>
