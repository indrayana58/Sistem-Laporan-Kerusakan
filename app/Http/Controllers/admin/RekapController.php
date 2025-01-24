<?php

namespace App\Http\Controllers\admin;

use App\Exports\RekapExport;
use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RekapController extends Controller
{
    public function index()
    {
        return view('admin/rekap');
    }

    public function export(Request $request)
    {
        $disetujui = $request->input('disetujui');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Mulai dengan menginisialisasi query builder untuk model Laporan
        $laporans = Laporan::query();

        // Sesuaikan dengan kondisi di database (status 0 untuk 'Disetujui', status 1 untuk 'Belum Disetujui')
        if ($disetujui === 'verified') {
            $laporans->where('disetujui', 1);
        } elseif ($disetujui === 'unverified') {
            $laporans->where('disetujui', 0);
        }

        // Pastikan filter tanggal diaplikasikan jika ada
        if ($startDate && $endDate) {
            // Pastikan format tanggal sesuai dengan yang diharapkan (Y-m-d H:i:s)
            $startDate = date('Y-m-d H:i:s', strtotime($startDate));
            $endDate = date('Y-m-d H:i:s', strtotime($endDate));

            $laporans->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Ambil data laporan yang sesuai dengan kriteria dan pilih kolom yang diinginkan
        $laporans = $laporans->select('nama', 'no_telp', 'nama_barang', 'lokasi', 'tanggal', 'keterangan')->get();

        // Pastikan ada data yang sesuai dengan kriteria
        if ($laporans->isEmpty()) {
            return back()->with('error', 'Tidak ada data yang sesuai dengan filter yang diberikan.');
        }

        // Jika ada data yang sesuai, lakukan ekspor
        return Excel::download(new RekapExport($laporans), 'rekap.xlsx');
    }
}
