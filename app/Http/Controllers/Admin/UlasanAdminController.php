<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Ulasan::latest();
        if ($request->filled('status')) $query->where('status', $request->status);
        if ($request->filled('rating')) $query->where('rating', $request->rating);
        $ulasan = $query->paginate(15);
        $stats = [
            'total'    => Ulasan::count(),
            'pending'  => Ulasan::where('status','pending')->count(),
            'approved' => Ulasan::where('status','approved')->count(),
            'rejected' => Ulasan::where('status','rejected')->count(),
            'avg'      => round(Ulasan::where('status','approved')->avg('rating') ?? 0, 1),
        ];
        return view('admin.ulasan.index', compact('ulasan','stats'));
    }
    public function approve(Ulasan $ulasan)
    {
        $ulasan->update(['status'=>'approved']);
        return back()->with('success','Ulasan berhasil disetujui!');
    }
    public function reject(Ulasan $ulasan)
    {
        $ulasan->update(['status'=>'rejected']);
        return back()->with('success','Ulasan ditolak.');
    }
    public function destroy(Ulasan $ulasan)
    {
        $ulasan->delete();
        return back()->with('success','Ulasan berhasil dihapus!');
    }
}
