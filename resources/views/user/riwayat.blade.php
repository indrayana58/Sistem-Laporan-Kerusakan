@extends('layouts.user')
@section('title', 'Riwayat')
@section('content')

    <section class="md:pl-64 p-5 w-full md:pt-2 text-darkGreen font-openSans">
        <div class="pt-10">
            @include('layouts.alert')
            <h1 class="text-3xl text-slate-600 font-semibold font-raleway">Riwayat</h1>
            <div class="p-5 bg-gray-100 overflow-auto rounded-lg shadow-lg mt-5">
                <h2 class="mb-4 text-xl font-semi-bold font-raleway">Riwayat Laporan</h2>
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
                            @if ($laporan->contains('disetujui', 0))
                                <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan as $index => $laporans)
                            <tr class="bg-white border-b-2">
                                <td class="p-3 text-sm text-gray-500">{{ $index + 1 }}</td>
                                <td class="p-3 text-sm text-gray-500">{{ $laporans->nama }}</td>
                                <td class="p-3 text-sm text-gray-500">{{ $laporans->no_telp }}</td>
                                <td class="p-3 text-sm text-gray-500">{{ $laporans->nama_barang }}</td>
                                <td class="p-3 text-sm text-gray-500">{{ $laporans->lokasi }}</td>
                                <td class="p-3 text-sm text-gray-500">{{ $laporans->tanggal }}</td>
                                <td class="text-center py-3 px-4 flex-col items-center justify-center">
                                    <img src="{{ asset('assets/img/laporan/' . $laporans->foto_barang) }}" alt=""
                                        width="200" class="rounded-lg overflow-hidden mb-1">
                                    <a href="{{ asset('assets/img/laporan/' . $laporans->foto_barang) }}" target="_blank">
                                        <i class="fa-solid fa-eye text-darkGreen"></i></a>
                                </td>
                                <td class="p-3 text-sm text-gray-500">{{ $laporans->keterangan }}
                                <td class="p-3 text-sm {{ $laporans->disetujui == 0 ? 'text-red-500' : 'text-green-500' }}">
                                    {{ $laporans->disetujui == 0 ? 'Belum Disetujui' : 'Disetujui' }}
                                </td>
                                </td>
                                @if ($laporans->disetujui === 0)
                                    <td>
                                        <form action="{{ route('user.laporan.destroy', $laporans->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                class="text-red-500 hover:scale-125">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
