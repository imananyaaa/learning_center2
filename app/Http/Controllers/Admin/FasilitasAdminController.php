<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasAdminController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::latest()->paginate(10);
        return view('admin.fasilitas.index', compact('fasilitas'));
    }
    public function create()
    {
        return view('admin.fasilitas.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kapasitas' => 'nullable|integer',
            'jenis'     => 'required|in:utama,pendukung',
            'foto'      => 'nullable|image|max:2048',
        ]);
        $data = $request->only('nama','deskripsi','kapasitas','jenis','status');
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fasilitas','public');
        }
        Fasilitas::create($data);
        return redirect()->route('admin.fasilitas.index')->with('success','Fasilitas berhasil ditambahkan!');
    }
    public function edit(Fasilitas $fasilitas)
    {
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }
    public function update(Request $request, Fasilitas $fasilitas)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kapasitas' => 'nullable|integer',
            'jenis'     => 'required|in:utama,pendukung',
            'foto'      => 'nullable|image|max:2048',
        ]);
        $data = $request->only('nama','deskripsi','kapasitas','jenis','status');
        if ($request->hasFile('foto')) {
            if ($fasilitas->foto) Storage::disk('public')->delete($fasilitas->foto);
            $data['foto'] = $request->file('foto')->store('fasilitas','public');
        }
        $fasilitas->update($data);
        return redirect()->route('admin.fasilitas.index')->with('success','Fasilitas berhasil diperbarui!');
    }
    public function destroy(Fasilitas $fasilitas)
    {
        if ($fasilitas->foto) Storage::disk('public')->delete($fasilitas->foto);
        $fasilitas->delete();
        return redirect()->route('admin.fasilitas.index')->with('success','Fasilitas berhasil dihapus!');
    }
}
