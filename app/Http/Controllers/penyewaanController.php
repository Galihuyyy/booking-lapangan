<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class penyewaanController extends BaseController
{
    public function index()
    {
        $penyewaan = Pemesanan::with(['user', 'lapangan'])->get();

        return view('admin.managePenyewaan.index', compact('penyewaan'));
    }

    public function update(Request $request, string $id)
    {
        $penyewaan = Pemesanan::findOrFail( $id );
        $penyewaan->update([
            'status_pemesanan'=> "dikonfirmasi",
        ]);

        return $this->success('Berhasil mengkonfirmasi pemesanan');
    }
    public function tolak(Request $request ,string $id)
    {

        $penyewaan = Pemesanan::findOrFail( $id );
        $penyewaan->update([
            'status_pemesanan' => 'ditolak'
        ]);

        return $this->success('Berhasil menolak pemesanan');
    }
}
