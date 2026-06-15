<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventAdminController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.event.index', compact('events'));
    }
    public function create()
    {
        return view('admin.event.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal'   => 'required|date',
            'waktu'     => 'required',
            'lokasi'    => 'required|string|max:255',
            'jenis'     => 'required|in:internal,eksternal',
            'kuota'     => 'nullable|integer',
            'foto'      => 'nullable|image|max:2048',
        ]);
        $data = $request->only('nama','deskripsi','tanggal','waktu','lokasi','jenis','kuota','status');
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('event','public');
        }
        Event::create($data);
        return redirect()->route('admin.event.index')->with('success','Event berhasil ditambahkan!');
    }
    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal'   => 'required|date',
            'waktu'     => 'required',
            'lokasi'    => 'required|string|max:255',
            'jenis'     => 'required|in:internal,eksternal',
            'kuota'     => 'nullable|integer',
            'foto'      => 'nullable|image|max:2048',
        ]);
        $data = $request->only('nama','deskripsi','tanggal','waktu','lokasi','jenis','kuota','status');
        if ($request->hasFile('foto')) {
            if ($event->foto) Storage::disk('public')->delete($event->foto);
            $data['foto'] = $request->file('foto')->store('event','public');
        }
        $event->update($data);
        return redirect()->route('admin.event.index')->with('success','Event berhasil diperbarui!');
    }
    public function destroy(Event $event)
    {
        if ($event->foto) Storage::disk('public')->delete($event->foto);
        $event->delete();
        return redirect()->route('admin.event.index')->with('success','Event berhasil dihapus!');
    }
}
