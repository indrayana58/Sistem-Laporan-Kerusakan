@extends('layouts.app')
@section('title', 'Register')
@section('content')

    <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center text-2xl font-semibold text-biru ">
                <img class="w-20 h-20 mr-2" src="{{ asset('assets/img/logo.png') }}" alt="logokai">
            </a>
            <h2 class="font-bold text-biru text-2xl mb-6 italic">SMP N 4 Yogyakarta</h2>
            <div class="w-full bg-white rounded-lg shadow  md:mt-0 sm:max-w-md xl:p-0 font-openSans">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8 ">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-darkGreen md:text-2xl uppercase font-raleway text-center">
                        Daftar
                    </h1>
                    {{-- alert --}}
                    @include('layouts.alert')
                    <form class="space-y-4 md:space-y-6" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-darkGreen ">Nama</label>
                            <input type="text" name="name" id="nama"
                                class="bg-gray-50 border border-gray-300 text-biru sm:text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 "
                                placeholder="Masukan Nama" value="{{ old('name') }}" required="">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-darkGreen ">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-biru sm:text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 "
                                placeholder="Masukan Email" value="{{ old('email') }}" required="">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-darkGreen ">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-biru sm:text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 "
                                required="">
                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-biru ">Konfirmasi
                                Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-darkGreen sm:text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 "
                                required="">
                        </div>
                        <button type="submit" id="submit-link"
                            class="w-full text-white bg-darkGreen hover:bg-opacity-80 focus:ring-4 focus:outline-none focus:ring-darkGreen font-medium rounded-lg text-sm px-5 py-2.5 text-center">Daftar</button>
                        <p class="text-sm font-light text-gray-500 ">
                            Sudah punya akun? <a href="{{ route('formLogin') }}"
                                class="font-medium text-darkGreen hover:underline">Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('submit-link').onclick = function() {
            return confirm('Apakah anda sudah yakin?');
        };
    </script>

@endsection
