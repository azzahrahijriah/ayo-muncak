<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengalaman;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    public function index()
    {
        try {
            $users = User::all();
            $totalUser = User::count();
            $totalPengalaman = Pengalaman::count();
            $totalTour = Tour::count();

            return view('admin-user', compact(
                'users',
                'totalUser',
                'totalPengalaman',
                'totalTour'
            ));
        } catch (\Exception $e) {
            Log::error('Error in AdminUserController@index: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memuat data pengguna.');
        }
    }

    public function create()
    {
        return view('admin-tambah-user');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        
        try {
            $validated = $request->validate([
                'nama_lengkap' => 'required|string|max:255',
                'username' => 'required|unique:users,username|min:3|max:30',
                'password' => 'required|min:6',
                'bio' => 'nullable|string|max:500',
                'instagram' => 'nullable|string',
                'tiktok' => 'nullable|string',
                'youtube' => 'nullable|string',
                'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            $validated['password'] = Hash::make($validated['password']);

            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $fileName = time() . '-' . $file->getClientOriginalName();
                $validated['avatar'] = $file->storeAs('avatars', $fileName, 'public');
            }

            User::create($validated);
            
            DB::commit();
            
            Log::info('User created: ' . $validated['username']);
            return redirect()->route('admin.user.index')->with('success', 'Pengguna berhasil ditambahkan!');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            Log::warning('Validation error in AdminUserController@store: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
            
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in AdminUserController@store: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menambahkan pengguna.')->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('admin-edit-user', compact('user'));
        } catch (\Exception $e) {
            Log::error('Error in AdminUserController@edit: ' . $e->getMessage());
            return redirect()->route('admin.user.index')->with('error', 'Pengguna tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        
        try {
            $user = User::findOrFail($id);

            $validated = $request->validate([
                'username' => 'required|unique:users,username,' . $id . ',id_user|min:3|max:30',
                'nama_lengkap' => 'required|string|max:255',
                'bio' => 'nullable|string|max:500',
                'instagram' => 'nullable|string',
                'tiktok' => 'nullable|string',
                'youtube' => 'nullable|string',
                'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'password' => 'nullable|min:6',
            ]);

            if ($request->filled('password')) {
                $validated['password'] = Hash::make($validated['password']);
            } else {
                unset($validated['password']);
            }

            if ($request->hasFile('avatar')) {
                if ($user->avatar) {
                    Storage::disk('public')->delete($user->avatar);
                }
                $file = $request->file('avatar');
                $fileName = time() . '-' . $file->getClientOriginalName();
                $validated['avatar'] = $file->storeAs('avatars', $fileName, 'public');
            }

            $user->update($validated);
            
            DB::commit();
            
            Log::info('User updated: ' . $user->username);
            return redirect()->route('admin.user.index')->with('success', 'Data pengguna berhasil diperbarui.');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            Log::warning('Validation error in AdminUserController@update: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
            
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in AdminUserController@update: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui pengguna.')->withInput();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        
        try {
            $user = User::findOrFail($id);
            
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            
            $username = $user->username;
            $user->delete();
            
            DB::commit();
            
            Log::info('User deleted: ' . $username);
            return redirect()->route('admin.user.index')->with('success', 'Data pengguna berhasil dihapus.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in AdminUserController@destroy: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus pengguna.');
        }
    }
}