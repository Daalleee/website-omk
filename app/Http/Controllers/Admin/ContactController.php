<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first() ?? new Contact();
        return view('admin.contact.index', compact('contact'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'address' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'maps' => 'nullable|string',
        ]);

        $contact = Contact::first() ?? new Contact();
        $contact->fill($request->except(['_token', '_method']))->save();

        return redirect()->route('admin.contact.index')->with('success', 'Kontak berhasil diperbarui.');
    }
}
