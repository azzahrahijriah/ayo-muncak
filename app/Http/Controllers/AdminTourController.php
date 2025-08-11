<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Gunung;
use Illuminate\Http\Request;

class AdminTourController extends Controller
{
    public function index()
    {
        $tours = Tour::with('gunung')->get();
        return view('admin-tour', compact('tours'));
    }

    public function create()
    {
        $gunungs = Gunung::all();
        return view('admin-tambah-tour', compact('gunungs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:gunung,id',  
            'nama' => 'required|string|max:255',
            'nohp' => 'required|string|max:15',
            'email' => 'nullable|email|max:255',  // Validasi untuk kolom email
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
        ]);

        Tour::create($request->all());  // Simpan data pengalaman

        return redirect()->route('admin.tour.index')->with('success', 'Tour berhasil ditambahkan!');
    }

    public function edit(Tour $tour)
    {
        $gunungs = Gunung::all();
        return view('admin-edit-tour', compact('tour', 'gunungs'));
    }

    public function update(Request $request, Tour $tour)
    {
        $request->validate([
            'id' => 'required|exists:gunung,id',
            'nama' => 'required|string|max:255',
            'nohp' => 'required|string|max:15',
            'email' => 'nullable|email|max:255',  // Validasi untuk kolom email
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
        ]);

        $tour->update([
            'gunung_id' => $request->id,
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'tiktok' => $request->tiktok,
        ]);

        return redirect()->route('admin.tour.index')->with('success', 'Tour berhasil diperbarui!');
    }

    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect()->route('admin.tour.index')->with('success', 'Tour berhasil dihapus!');
    }
}
