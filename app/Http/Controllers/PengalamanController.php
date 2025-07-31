<?php

namespace App\Http\Controllers;

use App\Models\Pengalaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengalamanController extends Controller
{
    public function index()
    {
        $pengalaman = Pengalaman::with('user', 'gunung')->get();  // Menggunakan eager loading untuk relasi dengan gunung
        return view('index', compact('pengalaman'));
    }

    public function create()
    {
        return view('admin-pengalaman-create');
    }

    public function store(Request $request, $id)
    {
        dd($request->all());
        $request->validate([
            'tanggal_pendakian' => 'required|date',
            'sampai_puncak' => 'required',
            'tingkat_kesulitan' => 'required',
            'resiko_pendakian' => 'array|nullable',
            'catatan' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        Pengalaman::create([
            'id_user' => $user->id_user,
            'id' => $id,
            'tanggal' => now(),
            'deskripsi' => $request->catatan,
            'tanggal_pendakian' => $request->tanggal_pendakian,
            'sampai_puncak' => $request->sampai_puncak,
            'tingkat_kesulitan' => $request->tingkat_kesulitan,
            'resiko_pendakian' => is_array($request->resiko_pendakian) ? implode(', ', $request->resiko_pendakian) : null,
            'catatan' => $request->catatan,
        ]);

        return redirect()->back()->with('success', 'Pengalaman berhasil dikirim!');
    }
    public function storeGuest(Request $request, $id)
    {
        $request->validate([
            'tanggal_pendakian' => 'required|date',
            'sampai_puncak' => 'required',
            'tingkat_kesulitan' => 'required',
            'resiko_pendakian' => 'array|nullable',
            'catatan' => 'required|string|max:255',
        ]);


        Pengalaman::create([
            'id_user' => null,
            'id' => $id,
            'tanggal' => now(),
            'deskripsi' => $request->catatan,
            'tanggal_pendakian' => $request->tanggal_pendakian,
            'sampai_puncak' => $request->sampai_puncak,
            'tingkat_kesulitan' => $request->tingkat_kesulitan,
            'resiko_pendakian' => is_array($request->resiko_pendakian) ? implode(', ', $request->resiko_pendakian) : null,
            'catatan' => $request->catatan,
        ]);

        return redirect()->back()->with('success', 'Pengalaman berhasil dikirim!');
    }


    public function edit(Pengalaman $pengalaman)
    {
        return view('admin-pengalaman-edit', compact('pengalaman'));
    }

    public function update(Request $request, Pengalaman $pengalaman)
    {
        $pengalaman->update($request->all());
        return redirect()->route('admin.pengalaman.index');
    }

    public function destroy(Pengalaman $pengalaman)
    {
        $pengalaman->delete();
        return redirect()->route('admin.pengalaman.index');
    }
}
