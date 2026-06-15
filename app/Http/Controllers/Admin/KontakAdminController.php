<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Kontak::latest();
        if ($request->filled('status')) $query->where('status', $request->status);
        $kontaks = $query->paginate(15);
        $stats = [
            'total'   => Kontak::count(),
            'baru'    => Kontak::where('status','baru')->count(),
            'dibaca'  => Kontak::where('status','dibaca')->count(),
            'dibalas' => Kontak::where('status','dibalas')->count(),
        ];
        return view('admin.kontak.index', compact('kontaks','stats'));
    }
    public function show(Kontak $kontak)
    {
        if ($kontak->status === 'baru') $kontak->update(['status'=>'dibaca']);
        return view('admin.kontak.show', compact('kontak'));
    }
    public function balas(Request $request, Kontak $kontak)
    {
        $request->validate(['balasan'=>'required|string']);
        $kontak->update(['balasan'=>$request->balasan,'status'=>'dibalas']);
        return back()->with('success','Balasan berhasil disimpan!');
    }
    public function destroy(Kontak $kontak)
    {
        $kontak->delete();
        return redirect()->route('admin.kontak.index')->with('success','Pesan berhasil dihapus!');
    }
}
