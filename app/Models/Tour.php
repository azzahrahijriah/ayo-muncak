<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $table = 'tour';

    protected $fillable = [
        'id', 'nama', 'nohp', 'email', 'instagram', 'facebook', 'tiktok'
    ];

    public function gunung()
    {
        return $this->belongsTo(Gunung::class, 'id');  // Sesuaikan dengan 'id'
    }

    public $timestamps = false;
}
