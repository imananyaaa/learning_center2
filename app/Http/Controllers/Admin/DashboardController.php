<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use App\Models\Event;
use App\Models\Fasilitas;
use App\Models\Kontak;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Stat cards
        $stats = [
            'fasilitas'   => Fasilitas::count(),
            'event'       => Event::count(),
            'event_aktif' => Event::where('status','aktif')->count(),
            'ulasan'      => Ulasan::where('status','approved')->count(),
            'rating'      => round(Ulasan::where('status','approved')->avg('rating') ?? 0, 1),
            'kontak'      => Kontak::count(),
            'kontak_baru' => Kontak::where('status','baru')->count(),
        ];

        // Chart ulasan per bulan tahun ini
        $months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
        $chartData = [];
        for ($m = 1; $m <= 12; $m++) {
            $chartData[] = Ulasan::where('status','approved')
                ->whereYear('created_at', date('Y'))
                ->whereMonth('created_at', $m)
                ->count();
        }

        // Distribusi rating
        $ratingDist = collect([5,4,3,2,1])->map(function($star) use ($stats) {
            $count = Ulasan::where('status','approved')->where('rating',$star)->count();
            $pct = $stats['ulasan'] > 0 ? round(($count/$stats['ulasan'])*100) : 0;
            return ['star' => $star, 'count' => $count, 'pct' => $pct];
        });

        $recentUlasan = Ulasan::where('status','approved')->latest()->take(4)->get();
        $recentEvent  = Event::where('tanggal','>=',now())->orderBy('tanggal')->take(4)->get();

        return view('admin.dashboard', compact(
            'stats','chartData','months','ratingDist',
            'recentUlasan','recentEvent'
        ))->with('chartLabels', $months);
    }
}
