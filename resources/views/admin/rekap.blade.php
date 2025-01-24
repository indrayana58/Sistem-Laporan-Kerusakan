@extends('layouts.admin')
@section('title', 'Rekap')
@section('content')

    <div class="md:pl-64 p-5 w-full md:pt-2">
        <div class="pt-10">
            <h1 class="text-3xl text-slate-600 font-semibold">Rekap</h1>
        </div>

        <form action="{{ route('admin.rekap.export') }}" method="post"
            class="mt-10 mx-auto p-5 flex flex-col bg-slate-50 max-w-lg rounded-xl shadow-lg shadow-slate-400 items-center justify-between space-y-4 md:space-y-6">
            @csrf
            {{-- alert --}}
            @include('layouts.alert')
            <div>
                <label for="disetujui" class="block mb-2 text-sm font-medium text-darkGreen ">Status:</label>
                <select name="disetujui" id="disetujui"
                    class="bg-gray-50 border border-gray-300 text-biru sm:text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 ">
                    <option value="all">Semua</option>
                    <option value="verified">Sudah Diverifikasi</option>
                    <option value="unverified">Belum Diverifikasi</option>
                </select>
            </div>
            <div>
                <label for="start_date" class="block mb-2 text-sm font-medium text-darkGreen ">Mulai Tanggal:</label>
                <input type="date" name="start_date" id="start_date"
                    class="bg-gray-50 border border-gray-300 text-biru sm:text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 ">
            </div>
            <div>
                <label for="end_date" class="block mb-2 text-sm font-medium text-darkGreen ">Sampai Tanggal:</label>
                <input type="date" name="end_date" id="end_date"
                    class="bg-gray-50 border border-gray-300 text-biru sm:text-sm rounded-lg focus:ring-darkGreen focus:border-darkGreen block w-full p-2.5 ">
            </div>
            <button type="submit"
                class="w-40 text-white bg-darkGreen hover:bg-opacity-80 focus:ring-4 focus:outline-none focus:ring-darkGreen font-medium rounded-lg text-sm px-5 py-2.5 text-center">Export</button>
        </form>
    </div>

@endsection
