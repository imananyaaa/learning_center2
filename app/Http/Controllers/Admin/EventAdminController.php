<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// ============================================================
// FILE: app/Http/Controllers/Admin/EventAdminController.php
// FUNGSI: CRUD Event (admin panel)
// ROUTE resource: admin.events.*
// ============================================================

class EventAdminController extends Controller
{
    /** Daftar event dengan search + pagination */
    public function index(Request $request)
    {
        $query = Event::query();

        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
        }

        $events = $query->latest('tanggal')->paginate(10);

        return view('admin.events.index', compact('events'));
    }

    /** Form tambah event */
    public function create()
    {
        return view('admin.events.create');
    }

    /** Simpan event baru */
    public function store(Request $request)
    {
        $request->validate([
            'judul'     => ['required', 'string', 'max:200'],
            'tanggal'   => ['required', 'date'],
            'deskripsi' => ['required', 'string'],
            'foto'      => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ], [
            'judul.required'     => 'Judul event wajib diisi.',
            'tanggal.required'   => 'Tanggal event wajib diisi.',
            'tanggal.date'       => 'Format tanggal tidak valid.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
        ]);

        $data = $request->only(['judul', 'tanggal', 'deskripsi']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('events', 'public');
        }

        Event::create($data);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil ditambahkan!');
    }

    /** Detail event */
    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    /** Form edit event */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /** Update event */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'judul'     => ['required', 'string', 'max:200'],
            'tanggal'   => ['required', 'date'],
            'deskripsi' => ['required', 'string'],
            'foto'      => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $data = $request->only(['judul', 'tanggal', 'deskripsi']);

        if ($request->hasFile('foto')) {
            if ($event->foto) Storage::disk('public')->delete($event->foto);
            $data['foto'] = $request->file('foto')->store('events', 'public');
        }

        $event->update($data);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil diperbarui!');
    }

    /** Hapus event */
    public function destroy(Event $event)
    {
        if ($event->foto) Storage::disk('public')->delete($event->foto);
        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil dihapus!');
    }
}
