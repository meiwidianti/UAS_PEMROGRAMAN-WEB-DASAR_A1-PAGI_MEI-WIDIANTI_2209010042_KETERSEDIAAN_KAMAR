<?php

// app/Models/Kamar.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $fillable = ['tipe', 'deskripsi', 'harga', 'jumlah'];

    public function pasiens()
    {
        return $this->hasMany(Pasien::class);
    }
}
