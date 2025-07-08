<?php

namespace App\Http\Controllers;

use App\Models\Pengalaman;
use App\Models\Gunung;  // Import Gunung model
use Illuminate\Http\Request;

class AdminPengalamanController extends Controller
{
    public function index()
    {
        $pengalamans = Pengalaman::with('gunung')->get();  // Mengambil semua pengalaman dengan relasi gunung
        return view('admin-pengalaman', compact('pengalamans'));  // Pass 'pengalamans' ke view
    }

    public function create()
    {
        $gunungs = Gunung::all();  // Ambil semua gunung
        return view('admin-tambah-pengalaman', compact('gunungs'));  // Pass 'gunungs' ke view
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:gunung,id',  // Validasi untuk 'id' yang merujuk ke gunung
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string',
        ]);

        Pengalaman::create($request->all());  // Simpan data pengalaman

        return redirect()->route('admin.pengalaman.index')->with('success', 'Pengalaman added successfully.');
    }

    public function edit($id)
    {
        $pengalaman = Pengalaman::findOrFail($id);
        $gunungs = Gunung::all();  // Ambil semua gunung
        return view('admin-edit-pengalaman', compact('pengalaman', 'gunungs'));  // Pass 'pengalaman' dan 'gunungs' ke view
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required|exists:gunung,id',  // Validasi untuk 'id' yang merujuk ke gunung
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string',
        ]);

        $pengalaman = Pengalaman::findOrFail($id);
        $pengalaman->update($request->all());  // Update data pengalaman

        return redirect()->route('admin.pengalaman.index')->with('success', 'Pengalaman updated successfully.');
    }

    public function destroy($id)
    {
        $pengalaman = Pengalaman::findOrFail($id);
        $pengalaman->delete();  // Hapus data pengalaman

        return redirect()->route('admin.pengalaman.index')->with('success', 'Pengalaman deleted successfully.');
    }
}
