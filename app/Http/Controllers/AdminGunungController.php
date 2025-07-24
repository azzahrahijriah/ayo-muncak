<?php

namespace App\Http\Controllers;

use App\Models\Gunung;
use Illuminate\Http\Request;
use App\Models\Pengalaman;
use App\Models\Tour;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


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
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'daerah' => 'required|string|max:255',
            'ketinggian' => 'required|numeric',
            'deskripsi' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'jalur' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:5',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:10948',
        ]);

        DB::beginTransaction();

        try {
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $newFileName = time() . '-' . $file->getClientOriginalName();

                // Simpan ke public disk (storage/app/public/gambar-gunung)
                $path = $file->storeAs('gambar-gunung', $newFileName, 'public');

                $validated['gambar'] = $path;
                Log::info('Gambar berhasil diupload.', ['path' => $path]);
            } else {
                $validated['gambar'] = 'gambar-gunung/default-image.jpg';
            }

            $gunung = Gunung::create($validated);

            Log::info('Gunung baru berhasil ditambahkan.', [
                'user_id' => auth()->id(),
                'gunung_id' => $gunung->id,
                'nama' => $gunung->nama,
            ]);

            DB::commit();

            return redirect()->route('admin.gunung.index')->with('success', 'Gunung berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Gagal menambahkan gunung.', [
                'user_id' => auth()->id(),
                'error' => $e->getMessage(),
            ]);

            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.'])->withInput();
        }
    }


    // Memperbarui data gunung yang sudah ada
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'daerah' => 'required|string|max:255',
            'ketinggian' => 'required|numeric',
            'deskripsi' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'jalur' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:10948',
        ]);
    
        DB::beginTransaction();
    
        try {
            $gunung = Gunung::findOrFail($id);
            $oldData = $gunung->toArray();
    
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika bukan default
                if ($gunung->gambar && $gunung->gambar !== 'gambar-gunung/default-image.jpg') {
                    Storage::disk('public')->delete($gunung->gambar);
                }
    
                $file = $request->file('gambar');
                $newFileName = time() . '-' . $file->getClientOriginalName();
    
                $path = $file->storeAs('gambar-gunung', $newFileName, 'public');
                $validated['gambar'] = $path;
    
                Log::info('Gambar berhasil diupdate.', ['path' => $path]);
            }
    
            $gunung->update($validated);
    
            Log::info('Data gunung diperbarui.', [
                'user_id' => auth()->id(),
                'gunung_id' => $gunung->id,
                'before' => $oldData,
                'after' => $validated,
            ]);
    
            DB::commit();
    
            return redirect()->route('admin.gunung.index')->with('success', 'Data gunung berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
    
            Log::error('Gagal memperbarui data gunung.', [
                'user_id' => auth()->id(),
                'gunung_id' => $id,
                'error' => $e->getMessage(),
            ]);
    
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data.'])->withInput();
        }
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
