<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    use HasFactory;

    protected $table = 'pengalaman';

    protected $primaryKey = 'id_pengalaman';

    protected $fillable = [
        'id_pengalaman',
        'id',             
        'id_user',
        'tanggal',
        'deskripsi',
        'id',
        'tanggal_pendakian',
        'sampai_puncak',
        'tingkat_kesulitan',
        'resiko_pendakian',
        'catatan',
    ];
    
    public function gunung()
    {
        return $this->belongsTo(Gunung::class, 'id', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    
    
    protected $casts = [
        'resiko_pendakian' => 'array',
    ];


    public $timestamps = false;
}
