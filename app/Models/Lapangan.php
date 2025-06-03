<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    protected $table = "lapangan";
    protected $fillable = ['foto', 'name', 'deskripsi', 'harga_sewa'];


    public function pemesanan() {
        return $this->hasMany(Pemesanan::class);
    }
}
