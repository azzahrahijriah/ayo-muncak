<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gunung;
use App\Models\Pengalaman;
use App\Models\Tour;
use App\Models\FavoritGunung;
use App\Services\WeatherService;
use Illuminate\Support\Facades\Auth;


class GunungController extends Controller
{
    public function index()
    {
        $gunungs = Gunung::all();
        $jumlahGunung = Gunung::count();
        $gunungTertinggi = Gunung::orderBy('ketinggian', 'desc')->first();
        $gunungTerendah = Gunung::orderBy('ketinggian', 'asc')->first();
        $pengalamans = Pengalaman::with('gunung')->get();
        $pengalaman = Pengalaman::with('user','gunung')->get();

        return view('index', compact('gunungs', 'pengalamans', 'jumlahGunung', 'gunungTertinggi', 'gunungTerendah', 'pengalaman'));
    }

    public function jelajah(Request $request)
    {
        $query = Gunung::query();
    
        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }
    
        $gunungs = $query->paginate(6)->appends(['search' => $request->search]);
    
        return view('jelajah', compact('gunungs'));
    }
    

    public function show($id, WeatherService $weatherService)
    {
        $gunung = Gunung::findOrFail($id);

        $forecast = $weatherService->get5DayForecast($gunung->latitude, $gunung->longitude);
    
        $pengalaman = Pengalaman::where('id', $id)->get();
        $tour = Tour::where('id', $id)->get();
        
        $pengalamans = $gunung->pengalaman;
        $tours = $gunung->tour;
        $favoritCount = $gunung->favorit->count();
    
        // Jumlah
        $jumlahPengalaman = $pengalamans->count();
        $jumlahTour = $tours->count();
    
        return view('detail-gunung', compact('gunung', 'pengalamans', 'tours' , 'jumlahPengalaman' , 'jumlahTour' , 'favoritCount' , 'pengalaman', 'tour', 'pengalamans', 'forecast'));
    }
    
    
    public function storePengalaman(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        Pengalaman::create([
            'id' => $id,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tanggal' => now(),
        ]);


        return redirect()->route('gunung.show', $id)->with('success', 'Pengalaman berhasil ditambahkan!');
    }

    public function favorit($id)
    {
        $userId = Auth::id();

        // Cek apakah sudah ada di favorit sebelumnya
        $favorit = FavoritGunung::where('id_user', $userId)
                    ->where('id_gunung', $id)
                    ->first();

        if (!$favorit) {
            FavoritGunung::create([
                'id_user' => $userId,
                'id_gunung' => $id,
            ]);
        }

        return redirect()->back()->with('success', 'Gunung berhasil disimpan ke favorit!');
    }

    public function hapusFavorit($id)
    {
        $userId = Auth::id();

        FavoritGunung::where('id_user', $userId)
            ->where('id_gunung', $id)
            ->delete();

        return redirect()->back()->with('success', 'Gunung dihapus dari favorit!');
    }


}
