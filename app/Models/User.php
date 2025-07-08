<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens; // ✅ Tambahkan ini

class User extends Authenticatable
{
    use HasApiTokens, HasFactory; // ✅ Tambahkan HasApiTokens di sini

    protected $table = 'users';

    protected $primaryKey = 'id_user'; // pastikan ini ada (defaultnya 'id')

    protected $fillable = [
        'username', 'password', 'nama_lengkap', 'avatar', 'bio', 'instagram', 'tiktok', 'youtube',
    ];

    protected $hidden = [
        'password',
        'remember_token'
];


public function pengalaman()
{
    return $this->hasMany(Pengalaman::class, 'id_user');
}

public function favoritGunung()
{
    return $this->hasMany(FavoritGunung::class, 'id_user', 'id_user');
}

public function Gunung()
{
    return $this->hasMany(Gunung::class, 'id', 'id');
}


}
