<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelaporanController extends Controller
{
    public function index()
    {
        return view('user.pelaporan');
    }

    public function store(Request $request)
    {
        // Pastikan pengguna yang sedang login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk melaporkan.');
        }

        $validatedData = $request->validate([
            'nama' => 'required|string',
            'no_telp' => 'required|string',
            'nama_barang' => 'required|string',
            'lokasi' => 'required|string',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
            'foto_barang' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        // Simpan laporan
        try {
            $laporan = new Laporan([
                'nama' => $validatedData['nama'],
                'no_telp' => $validatedData['no_telp'],
                'nama_barang' => $validatedData['nama_barang'],
                'lokasi' => $validatedData['lokasi'],
                'tanggal' => $validatedData['tanggal'],
                'keterangan' => $validatedData['keterangan'],
                'status' => 'Belum Disetujui',
            ]);

            // Upload foto barang
            if ($request->hasFile('foto_barang')) {
                $foto = $request->file('foto_barang');
                $namaFoto = time() . '_' . $foto->getClientOriginalName();
                $foto->move(public_path('assets/img/laporan'), $namaFoto);
                $laporan->foto_barang = $namaFoto;
            }

            $user->laporans()->save($laporan);

            return redirect()->route('user.riwayat')->with('success', 'Laporan anda berhasil disimpan');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan laporan.');
        }
    }
}
