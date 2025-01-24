@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

    <section class="md:pl-64 p-5 w-full md:pt-2 ">
        <div class="pt-10">
            <h1 class="text-3xl text-slate-600 font-semibold">Dashboard</h1>
        </div>

        <div class="w-full flex justify-center font-openSans">
            <h3 class="font-semibold text-gray-500 tracking-wider uppercase p-4 text-center font-raleway">Data Laporan</h3>
        </div>

        <div class="flex flex-wrap justify-center items-center">
            {{-- Jumlah laporan yang masuk hari ini --}}
            <div class="w-full px-4 md:w-1/4 mb-10">
                <div
                    class="border-l-4 border-darkGreen bg-slate-50  shadow-slate-400  lg:border-none shadow-lg p-10 rounded-lg h-full">
                    <div class="flex w-full justify-center items-center text-2xl p-4">
                        <i class="fa-solid fa-envelope-open-text text-darkGreen"></i>
                    </div>
                    <div class="flex flex-row justify-center items-center space-x-4">
                        <h5 class="text-darkGreen">Laporan masuk hari ini:</h5>
                        <span class="text-2xl font-bold text-darkGreen">{{ $reportsEnteredToday }}</span>
                    </div>
                </div>
            </div>
            {{-- Jumlah Belum di verifikasi --}}
            <div class="w-full px-4 md:w-1/4 mb-10">
                <div
                    class="border-l-4 border-darkGreen bg-slate-50  shadow-slate-400  lg:border-none shadow-lg p-10 rounded-lg h-full">
                    <div class="flex w-full justify-center items-center text-2xl p-4">
                        <i class="fa-solid fa-circle-xmark text-red-500"></i>
                    </div>
                    <div class="flex flex-row justify-center items-center space-x-4">
                        <h5 class="text-darkGreen">Belum di verifikasi:</h5>
                        <span class="text-2xl font-bold text-darkGreen">{{ $reportsNotVerified }}</span>
                    </div>
                </div>
            </div>
            {{-- Jumlah Sudah di verifikasi --}}
            <div class="w-full px-4 md:w-1/4 mb-10">
                <div
                    class="border-l-4 border-darkGreen bg-slate-50  shadow-slate-400  lg:border-none shadow-lg p-10 rounded-lg h-full">
                    <div class="flex w-full justify-center items-center text-2xl p-4">
                        <i class="fa-solid fa-circle-check text-green-500"></i>
                    </div>
                    <div class="flex flex-row justify-center items-center space-x-4">
                        <h5 class="text-darkGreen">Sudah di verifikasi:</h5>
                        <span class="text-2xl font-bold text-darkGreen">{{ $reportsVerified }}</span>
                    </div>
                </div>
            </div>
            {{-- Total Laporan yang masuk --}}
            <div class="w-full px-4 md:w-1/4 mb-10">
                <div
                    class="border-l-4 border-darkGreen bg-slate-50  shadow-slate-400  lg:border-none shadow-lg p-10 rounded-lg h-full">
                    <div class="flex w-full justify-center items-center text-2xl p-4">
                        <i class="fa-solid fa-book-open text-[#C99A03]"></i>
                    </div>
                    <div class="flex flex-row justify-center items-center space-x-4">
                        <h5 class="text-darkGreen">Total laporan masuk:</h5>
                        <span class="text-2xl font-bold text-darkGreen">{{ $totalReports }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
