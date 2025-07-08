<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gunung;
use App\Models\Tour;
use App\Models\Pengalaman;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.index');
        }

        return view('admin-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.index'));
        }

        return back()->withErrors([
            'username' => 'Username atau password tidak sesuai.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function index()
    {
        $totalGunung = Gunung::count();
        $highestGunung = Gunung::orderBy('ketinggian', 'desc')->first();
        $lowestGunung = Gunung::orderBy('ketinggian', 'asc')->first();
        $totalPengalaman = Pengalaman::count();
        $totalTour = Tour::count();

        return view('admin-index', compact(
            'totalGunung',
            'highestGunung',
            'lowestGunung',
            'totalPengalaman',
            'totalTour'
        ));
    }
}
