<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = "pemesanan";
    protected $guarded = [];
    

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function lapangan() {
        return $this->belongsTo(Lapangan::class, 'lapangan_id', 'id');
    }

}
