<?php

namespace App\Http\Controllers;

use App\Models\Gunung;
use Illuminate\Http\Request;
use App\Models\Pengalaman;
use App\Models\Tour;

class AdminGunungController extends Controller
{
    public function index()
{
    // Ambil semua data gunung
    $gunungs = Gunung::all();

    // Hitung total gunung
    $totalGunung = Gunung::count();

    // Hitung total pengalaman dan tour
    $totalPengalaman = Pengalaman::count();
    $totalTour = Tour::count();

    // Kirim semua data ke view
    return view('admin-gunung', compact(
        'gunungs',
        'totalGunung',
        'totalPengalaman',
        'totalTour'
    ));
}

    // Menampilkan halaman form untuk membuat gunung baru
    public function create()
    {
        return view('admin-tambah-gunung');
    }

    // Menyimpan data gunung baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'daerah' => 'required|string|max:255',
            'ketinggian' => 'required|numeric',
            'deskripsi' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'jalur' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:5',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:5048',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $originalName = $file->getClientOriginalName();
            $newFileName = time() . '-' . $originalName;
            $file->storeAs('public/gambar-gunung', $newFileName);
            $data['gambar'] = 'gambar-gunung/' . $newFileName;
        } else {
            $data['gambar'] = 'gambar-gunung/default-image.jpg'; // Gambar default jika tidak ada file di-upload
        }

        Gunung::create($data);

        return redirect()->route('admin.gunung.index')->with('success', 'Gunung berhasil ditambahkan!');
    }



    // Memperbarui data gunung yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'daerah' => 'required|string|max:255',
            'ketinggian' => 'required|numeric',
            'deskripsi' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'jalur' => 'nullable|string',
            'rating' => 'nullable|numeric|min:0|max:5',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:5048',
        ]);

        $gunung = Gunung::findOrFail($id);
        $gunung->nama = $request->input('nama');
        $gunung->provinsi = $request->input('provinsi');
        $gunung->daerah = $request->input('daerah');
        $gunung->ketinggian = $request->input('ketinggian');
        $gunung->deskripsi = $request->input('deskripsi');
        $gunung->latitude = $request->input('latitude');
        $gunung->longitude = $request->input('longitude');
        $gunung->jalur = $request->input('jalur');
        $gunung->rating = $request->input('rating');

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($gunung->gambar && \Storage::exists('public/' . $gunung->gambar)) {
                \Storage::delete('public/' . $gunung->gambar);
            }

            // Ambil file gambar yang diupload
            $file = $request->file('gambar');
            // Ambil nama file asli
            $originalName = $file->getClientOriginalName();
            // Ubah nama file menjadi format baru
            $newFileName = time() . '-' . $originalName;
            // Simpan file gambar dengan nama baru di folder public
            $file->storeAs('public/gambar-gunung', $newFileName);
            // Simpan path gambar ke database
            $gunung->gambar = 'gambar-gunung/' . $newFileName;
        }

        $gunung->save();

        return redirect()->route('admin.gunung.index')->with('success', 'Data gunung berhasil diperbarui.');
    }

    public function edit($id)
    {
        $gunung = Gunung::findOrFail($id); // Mengambil data gunung berdasarkan $id

        return view(
            'admin-edit-gunung',
            compact('gunung')
        );
    }

    // Menghapus data gunung
    public function destroy($id)
    {
        $gunung = Gunung::findOrFail($id);
        // Hapus gambar jika ada
        if ($gunung->gambar && \Storage::exists('public/' . $gunung->gambar)) {
            \Storage::delete('public/' . $gunung->gambar);
        }
        $gunung->delete();
        return redirect()->route('admin.gunung.index')->with('success', 'Data gunung berhasil dihapus.');
    }
}
