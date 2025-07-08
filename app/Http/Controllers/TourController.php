<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;

class TourController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nohp' => 'required|string|max:20',
            'email' => 'nullable|string|email|max:255',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
        ]);

        Tour::create([
            'id' => $id,
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'email' => $request->email,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'tiktok' => $request->tiktok,
        ]);

        return redirect()->route('gunung.show', $id)->with('success', 'Informasi tour berhasil ditambahkan!');
    }
}
