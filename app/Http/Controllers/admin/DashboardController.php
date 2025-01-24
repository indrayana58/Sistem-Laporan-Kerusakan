<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laporan;

class DashboardController extends Controller
{
    public function index()
    {
        $reportsEnteredToday = Laporan::whereDate('created_at', today())->count();
        $reportsNotVerified = Laporan::where('disetujui', false)->count();
        $reportsVerified = Laporan::where('disetujui', true)->count();
        $totalReports = Laporan::count();

        return view('admin/dashboard', compact('reportsEnteredToday', 'reportsNotVerified', 'reportsVerified', 'totalReports'));
    }
}
