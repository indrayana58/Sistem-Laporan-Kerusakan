@extends('layouts.user')
@section('title', 'Pelaporan')
@section('content')

    <section class="md:pl-64 p-5 w-full md:pt-2 font-openSans">
        <div class="pt-10">
            <h1 class="text-3xl text-slate-600 font-semibold font-raleway">Pelaporan</h1>
        </div>
        <div class="py-2">
            <p class="text-sm text-darkGreen font-raleway">*Silahkan isi form pengaduan dibawah ini</p>
        </div>
        <form action="{{ route('storeLaporan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div
                class="grid gap-4 sm:grid-cols-2 sm:gap-6 p-4 xl:p-10 shadow-md shadow-slate-400 xl:w-1/2 xl:mx-auto bg-slate-50 rounded-xl mx-4">
                {{-- Message --}}
                <div class="col-span-2">
                    @include('layouts.alert')
                </div>
                <div class="col-span-2">
                    <h5 class="text-darkGreen xl:text-center font-semibold text-lg mb-5 font-raleway">Form Pelaporan
                        Kerusakan Barang</h5>
                </div>
                <div class="w-full">
                    <label for="nama" class="block mb-2 text-sm font-medium">Nama</label>
                    <input type="text" name="nama" id="nama"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-darkGreen focus:border-pine block w-full p-2.5"
                        placeholder="Nama Pelapor" required>
                </div>
                <div class="w-full">
                    <label for="no_telp" class="block mb-2 text-sm font-medium">Nomor HP</label>
                    <input type="number" name="no_telp" id="no_telp"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-darkGreen focus:border-pine block w-full p-2.5"
                        placeholder="Nomor HP / WhatsApp" required>
                </div>
                <div class="w-full">
                    <label for="nama_barang" class="block mb-2 text-sm font-medium">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-darkGreen focus:border-pine block w-full p-2.5"
                        placeholder="Nama Barang" required>
                </div>
                <div class="w-full">
                    <label for="lokasi" class="block mb-2 text-sm font-medium">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-darkGreen focus:border-pine block w-full p-2.5"
                        placeholder="Lokasi Barang" required>
                </div>
                <div class="w-full">
                    <label for="tanggal" class="block mb-2 text-sm font-semibold">
                        Tanggal
                    </label>
                    <input type="date" name="tanggal" id="tanggal"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-darkGreen focus:border-pine block w-full p-2.5"
                        required>
                </div>
                <div class="w-full">
                    <label for="foto_barang" class="block mb-2 text-sm font-medium ">Uploud Foto Barang</label>
                    <input type="file" name="foto_barang" id="foto_barang"
                        class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-darkGreen  focus:border-pine block w-full p-2.5 "
                        required>
                </div>
                <div class="col-span-2">
                    <label for="keterangan" class="block mb-2 text-sm font-medium">keterangan</label>
                    <textarea name="keterangan" id="keterangan"
                        class="w-full bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-darkGreen focus:border-pine block p-2.5"></textarea>
                </div>
                <button type="submit" id="submit-link"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-darkGreen  rounded-lg focus:ring-4 focus:ring-pine  hover:bg-opacity-80">
                    Simpan
                </button>
            </div>
        </form>
    </section>

    <script>
        document.getElementById('submit-link').onclick = function() {
            return confirm('Apakah anda sudah yakin?');
        };
    </script>
@endsection
