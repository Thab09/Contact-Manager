<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function createContact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'number' => 'required',
            'email' => 'required',
        ]);

        $data['name'] = strip_tags($data['name']);
        $data['number'] = strip_tags($data['number']);
        $data['email'] = strip_tags($data['email']);
        $data['user_id'] = auth()->id();

        Contact::create($data);

        return redirect('/dashboard');
    }

    public function editContactCheck(Contact $contact)
    {
        if (auth()->user()->id !== $contact["user_id"]) {
            return redirect('/dashboard');
        }
        return view('edit-contact', ["contact" => $contact]);
    }

    public function editContact(Contact $contact, Request $request)
    {
        if (auth()->user()->id !== $contact["user_id"]) {
            return redirect('/dashboard');
        }
        $data = $request->validate([
            'name' => 'required',
            'number' => ['required', 'numeric'],
            'email' => ['required', 'email'],
        ]);

        $data['name'] = strip_tags($data['name']);
        $data['number'] = strip_tags($data['number']);
        $data['email'] = strip_tags($data['email']);
        $data['user_id'] = auth()->id();

        $contact->update($data);
        return redirect('/dashboard');
    }

    public function deleteContact(Contact $contact)
    {
        if (auth()->user()->id === $contact["user_id"]) {
            $contact->delete();
        }
        return redirect('/dashboard');
    }
}
