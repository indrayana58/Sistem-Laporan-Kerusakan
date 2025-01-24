<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laporan;

class RiwayatController extends Controller
{
    function index(Request $request)
    {
        $laporanQuery = Laporan::query();
        $perPage = 10;

        $laporanQuery->where('disetujui', true);
        $laporans = $laporanQuery->orderBy('created_at', 'desc')->paginate($perPage);
        $currentPage = $request->input('page', 1);
        $itemNumber = ($currentPage - 1) * $perPage + 1;

        return view('admin/riwayat', compact('laporans', 'itemNumber'));
    }

    function verifikasiLaporan($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->update([
            'disetujui' => true,
        ]);

        return redirect()->back()->with('success', 'Laporan telah diverifikasi.');
    }

    function batalkanVerifikasiLaporan($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->update([
            'disetujui' => false,
        ]);

        return redirect()->back()->with('success', 'Verifikasi laporan berhasil dibatalkan.');
    }

    function hapusLaporan($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return redirect()->back()->with('success', 'Data laporan berhasil dihapus.');
    }
}
