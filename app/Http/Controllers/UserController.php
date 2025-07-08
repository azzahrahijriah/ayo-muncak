<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\Models\User;



class UserController extends Controller
{
    public function showRegister()
    {
            // Cek apakah sudah login dengan guard 'web'
        if (Auth::guard('web')->check()) {
            return redirect()->route('jelajah');
        }

        return view('regis');
    }

    public function register(Request $request)
    {
            // validasi...
        $user = User::create([
            'username'     => $request->username,
            'password'     => Hash::make($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'bio'          => $request->bio,
            'instagram'    => $request->instagram,
            'tiktok'       => $request->tiktok,
            'youtube'      => $request->youtube,
        ]);

            // login sekaligus regenerate session
        Auth::guard('web')->login($user);
        $request->session()->regenerate();

        return redirect()->route('jelajah');
    }

    public function showLogin()
    {
            // **Perbaikan**: harus ->check(), bukan hanya Auth::guard()
        if (Auth::guard('web')->check()) {
            return redirect()->route('jelajah');
        }

        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        Log::debug('Attempting login with credentials', [
            'username' => $credentials['username']
        ]);

        if (Auth::guard('web')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();  // Regenerasi sesi sebelum ambil ID

            Log::debug('Login successful', [
                'user_id'  => Auth::guard('web')->user()?->id,
                'username' => Auth::guard('web')->user()?->username
            ]);

            return redirect()->intended(route('beranda'));
        }

        return back()
            ->withErrors(['username' => 'Username atau password salah.'])
            ->withInput();
    }


    public function logout(Request $request)
    {
            // Gunakan guard 'web' secara eksplisit
        Auth::guard('web')->logout();

            // Invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('beranda')->with('status', 'Berhasil logout.');
    }

    public function akun()
    {
        $user = Auth::user();

        $gunung        = $user->gunung()->get();
        $pengalaman    = $user->pengalaman()->with('gunung')->get();
        $favoritGunung = $user->favoritGunung()->get();
    
        return view('akun', compact('user', 'pengalaman', 'favoritGunung', 'gunung'));
    }
    
        // Menampilkan form edit akun
    public function edit()
    {
        $user  = Auth::user();                      // Ambil user yang sedang login
        return view('akun-edit', compact('user'));  // pastikan nama view-nya sesuai
    }

        // Menangani update data user
        // Menangani update data user
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'username'     => ['required', 'string', 'max:255', Rule::unique('users')->ignore(auth()->user()->id_user, 'id_user')],
            'password'     => 'nullable|string|min:6',
            'nama_lengkap' => 'required|string|max:255',
            'bio'          => 'nullable|string',
            'instagram'    => 'nullable|string|max:255',
            'tiktok'       => 'nullable|string|max:255',
            'youtube'      => 'nullable|string|max:255',
            'avatar'       => 'nullable|image|mimes:jpg,jpeg,png|max:5048',
        ]);

            // Handle avatar upload
        if ($request->hasFile('avatar')) {
                // Hapus avatar lama jika ada
            if ($user->avatar && Storage::exists('public/' . $user->avatar)) {
                Storage::delete('public/' . $user->avatar);
            }

                // Ambil file avatar yang diupload
            $file = $request->file('avatar');
                // Ambil nama file asli
            $originalName = $file->getClientOriginalName();
                // Ubah nama file menjadi format baru
            $newFileName = time() . '-' . $originalName;
                // Simpan file avatar dengan nama baru di folder public
            $file->storeAs('avatars', $newFileName, 'public');
                // Simpan path avatar ke database
            $user->avatar = 'avatars/' . $newFileName;
        }

        $user->username     = $request->username;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->bio          = $request->bio;
        $user->instagram    = $request->instagram;
        $user->tiktok       = $request->tiktok;
        $user->youtube      = $request->youtube;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('akun')->with('success', 'Akun berhasil diperbarui');
        }
}