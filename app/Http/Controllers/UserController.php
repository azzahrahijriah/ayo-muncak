<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
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
        
            $validated = $request->validate([
                'username'     => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id_user, 'id_user')],
                'password'     => 'nullable|string|min:6',
                'nama_lengkap' => 'required|string|max:255',
                'bio'          => 'nullable|string',
                'instagram'    => 'nullable|string|max:255',
                'tiktok'       => 'nullable|string|max:255',
                'youtube'      => 'nullable|string|max:255',
                'avatar'       => 'nullable|image|mimes:jpg,jpeg,png|max:5048',
            ]);
        
            DB::beginTransaction();
        
            try {
                $oldData = $user->toArray(); // untuk log perbandingan data lama
        
                // Handle avatar upload
                if ($request->hasFile('avatar')) {
                    // Hapus avatar lama jika bukan default dan ada di disk
                    if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                        Storage::disk('public')->delete($user->avatar);
                        Log::info('Avatar lama dihapus', ['path' => $user->avatar]);
                    }
        
                    // Simpan avatar baru
                    $file = $request->file('avatar');
                    $newFileName = time() . '-' . $file->getClientOriginalName();
                    $path = $file->storeAs('avatars', $newFileName, 'public');
        
                    $validated['avatar'] = $path;
        
                    Log::info('Avatar baru diupload', ['path' => $path]);
                }
        
                // Update data user
                $user->username     = $validated['username'];
                $user->nama_lengkap = $validated['nama_lengkap'];
                $user->bio          = $validated['bio'] ?? null;
                $user->instagram    = $validated['instagram'] ?? null;
                $user->tiktok       = $validated['tiktok'] ?? null;
                $user->youtube      = $validated['youtube'] ?? null;
        
                if (!empty($validated['avatar'])) {
                    $user->avatar = $validated['avatar'];
                }
        
                if ($request->filled('password')) {
                    $user->password = Hash::make($validated['password']);
                }
        
                $user->save();
        
                Log::info('Akun pengguna diperbarui.', [
                    'user_id' => $user->id_user,
                    'before' => $oldData,
                    'after' => $user->toArray(),
                ]);
        
                DB::commit();
        
                return redirect()->route('akun')->with('success', 'Akun berhasil diperbarui');
            } catch (\Exception $e) {
                DB::rollBack();
        
                Log::error('Gagal memperbarui akun.', [
                    'user_id' => $user->id_user,
                    'error' => $e->getMessage(),
                ]);
        
                return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui akun.'])->withInput();
            }
        }
}