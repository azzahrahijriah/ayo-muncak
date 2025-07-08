<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FavoritGunung extends Model
{
    use HasFactory;

    protected $table = 'favorit_gunung';

    // Biar Laravel tetap otomatis isi created_at & updated_at
    public $timestamps = true;

    protected $fillable = [
        'id_user',
        'id_gunung', // jangan lupa ini perbaikannya
    ];

    public function gunung()
    {
        return $this->belongsTo(Gunung::class, 'id_gunung', 'id');
    }
}



?>