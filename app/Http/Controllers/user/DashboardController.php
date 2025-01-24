<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $user_id = Auth::id();

        $reportsEnteredToday = Laporan::where('user_id', $user_id)
            ->whereDate('created_at', today())
            ->count();

        $reportsNotVerified = Laporan::where('user_id', $user_id)
            ->where('disetujui', false)
            ->count();

        $reportsVerified = Laporan::where('user_id', $user_id)
            ->where('disetujui', true)
            ->count();

        $totalReports = Laporan::where('user_id', $user_id)
            ->count();

        return view('user/dashboard', compact('reportsEnteredToday', 'reportsNotVerified', 'reportsVerified', 'totalReports'));
    }
}
