@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

    <div class="md:pl-64 p-5 w-full md:pt-2">
        <div class="pt-10">
            <h1 class="text-3xl text-slate-600 font-semibold">Riwayat</h1>
        </div>

        <div class="pt-10">
            {{-- Message --}}
            @include('layouts.alert')

            <div class="flex items-center gap-2 text-sm font-openSans text-gray-500">
                <i class="fa-solid fa-circle-check text-green-500"></i>
                <h5 class="">Laporan yang sudah diverfikasi</h5>
            </div>
            <div class="p-5 bg-gray-100 overflow-auto rounded-lg shadow-lg mt-5">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">No.</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">Nama Pelapor</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">Nomor HP</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">Nama Barang</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">Lokasi</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">Tanggal</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">Foto Barang</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">Keterangan</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">Status</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporans as $index => $laporan)
                            @if ($laporan->disetujui)
                                <tr class="bg-white border-b-2">
                                    <td class="p-3 text-sm text-gray-500">{{ $index + 1 }}</td>
                                    <td class="p-3 text-sm text-gray-500">{{ $laporan->nama }}</td>
                                    <td class="p-3 text-sm text-gray-500">{{ $laporan->no_telp }}</td>
                                    <td class="p-3 text-sm text-gray-500">{{ $laporan->nama_barang }}</td>
                                    <td class="p-3 text-sm text-gray-500">{{ $laporan->lokasi }}</td>
                                    <td class="p-3 text-sm text-gray-500">{{ $laporan->tanggal }}</td>
                                    <td class="text-center py-3 px-4 flex-col items-center justify-center">
                                        <img src="{{ asset('assets/img/laporan/' . $laporan->foto_barang) }}" alt=""
                                            width="200" class="rounded-lg overflow-hidden mb-1">
                                        <a href="{{ asset('assets/img/laporan/' . $laporan->foto_barang) }}"
                                            target="_blank">
                                            <i class="fa-solid fa-eye text-darkGreen"></i></a>
                                    </td>
                                    <td class="p-3 text-sm text-gray-500">{{ $laporan->keterangan }}</td>
                                    <td class="text-center py-3 px-4 text-sm">
                                        @if ($laporan->disetujui)
                                            <form action="{{ route('batalkan.verifikasi.laporan', $laporan->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="bg-red-500 text-white px-4 py-2 rounded-md">Batalkan
                                                    Verifikasi</button>
                                            </form>
                                        @else
                                            <span class="text-red-500">Belum diverifikasi</span>
                                        @endif
                                        @if (!$laporan->disetujui)
                                            <form action="{{ route('verifikasi.laporan', $laporan->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="bg-green-500 text-white px-4 py-2 rounded-md">Verifikasi</button>
                                            </form>
                                        @else
                                            <span class="text-green-500">Sudah diverifikasi</span>
                                        @endif
                                    </td>
                                    <td class="text-center py-3 px-4">
                                        <form action="{{ route('hapus.laporan', $laporan->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                class="text-red-500 hover:scale-125">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <div class="flex justify-between items-center mt-2 flex-wrap">
                    @if ($laporans->count() > 0)
                        <div>
                            <p class="text-sm text-gray-600">
                                Showing {{ $laporans->firstItem() }} to {{ $laporans->lastItem() }} of
                                {{ $laporans->total() }} entries
                            </p>
                        </div>
                        <div>
                            {{ $laporans->links() }}
                        </div>
                    @else
                        <div class="translate-x-2">
                            <p class="text-gray-500 font-openSans text-sm">*Tidak ada data laporan yang telah diverifikasi.
                            </p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>



@endsection
