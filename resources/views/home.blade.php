@extends('layouts.app')
@section('title', ' SMP N 4 Yogyakarta')
@section('content')

    {{-- alert --}}
    @include('layouts.alert')
    {{-- Header --}}
    
    <header>
        <nav class="bg-darkGreen md:bg-transparent  absolute top-0 left-0 w-full z-50">
            <div class="max-w-7xl mx-auto p-5 flex items-center justify-between text-white">
                <div>
                    <img src="{{ asset('assets/img/logo.png') }}" alt="" class="w-[40px]">
                </div>
                {{-- Desktop --}}
                <div class="hidden md:flex gap-10 items-center">
                    <a href=""
                        class="uppercase text-darkGreen hover:text-pistachio block font-semibold tracking-widest text-[14px] transition duration-200">Beranda</a>
                    <a href="{{ route('formLogin') }}"
                        class="uppercase text-darkGreen hover:text-pistachio block font-semibold tracking-widest text-[14px] transition duration-200">Laporan
                    </a>
                </div>
                {{-- Mobile --}}
                <div class="md:hidden">
                    <button id="toggleMenu">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
            <div id="mobileMenu" class="md:hidden hidden text-center my-5 space-y-10">
                <a href="" class="uppercase text-pistachio font-semibold tracking-widest text-[14px] block">Home</a>
                <a href="{{ route('formLogin') }}"
                    class="uppercase text-pistachio font-semibold tracking-widest text-[14px] block">Pelaporan</a>
            </div>
        </nav>
    </header>

    {{-- Banner --}}
    <section class="pt-[80px] xl:pt-0">
        <div class="py-24 h-[500px] relative xl:mt-[80px]"
            style="background-image: url({{ asset('assets/img/bg.png') }}); background-size:cover; background-position:center; ">
            <div class="absolute inset-0 flex items-center justify-center text-center">
                <div class="flex flex-col justify-center items-center">
                    <h1 class="uppercase text-white font-raleway tracking-wider font-bold md:text-4xl text-2xl shadow-md">
                        SMP N 4 Yogyakarta</h1>
                    <h3 class="text-white font-raleway tracking-widest font-semibold text-xl md:text-2xl shadow-md">Sistem
                        Pelaporan
                        Barang Kerusakan</h3>
                    <a href="{{ route('formLogin') }}"
                        class="bg-slate-50 p-4 rounded-full mt-2 font-semibold text-darkGreen hover:bg-pistachio transition duration-200">Laporkan</a>
                </div>
            </div>
        </div>
    </section>

@endsection
