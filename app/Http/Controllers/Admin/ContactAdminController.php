<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

// ============================================================
// FILE: app/Http/Controllers/Admin/ContactAdminController.php
// FUNGSI: CRUD Kontak (admin panel)
// ROUTE resource: admin.contacts.*
// ============================================================

class ContactAdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'whatsapp' => ['required', 'string', 'max:20'],
            'email'    => ['required', 'email', 'max:100'],
            'alamat'   => ['required', 'string'],
            'maps'     => ['nullable', 'string'],
        ], [
            'whatsapp.required' => 'Nomor WhatsApp wajib diisi.',
            'email.required'    => 'Email wajib diisi.',
            'alamat.required'   => 'Alamat wajib diisi.',
        ]);

        Contact::create($request->only(['whatsapp', 'email', 'alamat', 'maps']));

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Data kontak berhasil disimpan!');
    }

    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'whatsapp' => ['required', 'string', 'max:20'],
            'email'    => ['required', 'email', 'max:100'],
            'alamat'   => ['required', 'string'],
            'maps'     => ['nullable', 'string'],
        ]);

        $contact->update($request->only(['whatsapp', 'email', 'alamat', 'maps']));

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Data kontak berhasil diperbarui!');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')
            ->with('success', 'Data kontak berhasil dihapus!');
    }
}
