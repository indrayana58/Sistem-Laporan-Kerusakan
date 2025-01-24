@extends('layouts.app')
@section('title', 'Login')
@section('content')

    <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="/" class="flex items-center text-2xl font-semibold text-biru ">
                <img class="w-20 h-20 mr-2" src="{{ asset('assets/img/logo.png') }}" alt="logokai">
            </a>
            <h2 class="font-bold text-darkGreen text-2xl mb-6 italic">SMP N 4 Yogyakarta
            </h2>
            <div class="w-full bg-white rounded-lg shadow  md:mt-0 sm:max-w-md xl:p-0 font-openSans">
                <div class="p-6  sm:p-8 space-y-4 md:space-y-6">
                    <p class="text-sm text-gray-500 italic">*Silahkan login terlebih dahulu sebelum melanjutkan</p>
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-darkGreen md:text-2xl  uppercase font-raleway text-center">
                        Login
                    </h1>
                    {{-- alert --}}
                    @include('layouts.alert')
                    <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-darkGreen ">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-biru sm:text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 "
                                placeholder="Masukan Email" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-darkGreen ">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-biru sm:text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 "
                                required="">
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-darkGreen hover:bg-opacity-80 focus:ring-4 focus:outline-none focus:ring-darkGreen font-medium rounded-lg text-sm px-5 py-2.5 text-center">Masuk</button>
                        <p class="text-sm font-light text-gray-500 ">
                            Belum punya akun? <a href="{{ route('formRegister') }}"
                                class="font-medium text-darkGreen hover:underline">Daftar</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
