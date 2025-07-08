<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gunung extends Model
{
    protected $table = 'gunung'; // sesuaikan dengan nama tabel di database

    protected $primaryKey = 'id'; 

    // Menonaktifkan timestamps
    public $timestamps = false;

    // tentukan atribut yang bisa diisi
    protected $fillable = [
        'nama',
        'provinsi',
        'daerah',
        'ketinggian',
        'deskripsi',
        'latitude',
        'longitude',
        'jalur',
        'rating',
        'gambar',
    ];


    protected $casts = [
        'ketinggian' => 'float',
        'rating' => 'float',
    ];

    public function pengalaman()
    {
        return $this->hasMany(Pengalaman::class, 'id_pengalaman');
    }

    public function tour()
    {
        return $this->hasMany(Tour::class, 'id');
    }

    public function favorit()
    {
        return $this->hasMany(FavoritGunung::class, 'id_gunung');
    }

    
}
