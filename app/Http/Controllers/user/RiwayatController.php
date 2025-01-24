<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    { {
            $userId = Auth::id();
            $laporan = Laporan::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
            return view('user.riwayat', compact('laporan'));
        }
    }
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        if ($laporan->disetujui === 0) {
            $laporan->delete();
            return redirect()->back()->with('success', 'Laporan berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Laporan tidak dapat dihapus karena sudah disetujui.');
        }
    }
}
