<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class penyewaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyewaan = Pemesanan::with(['user', 'lapangan'])->get();


        return view('admin.manage_penyewaan', compact('penyewaan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $penyewaan = Pemesanan::findOrFail( $id );
        $penyewaan->update([
            'status_pemesanan'=> "dikonfirmasi",
        ]);

        return redirect()->back()->with("success","Berhasil menolak pemesanan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function tolak(Request $request ,string $id)
    {

        $penyewaan = Pemesanan::findOrFail( $id );
        $penyewaan->update([
            'status_pemesanan' => 'ditolak'
        ]);

        return redirect()->back()->with('success','Berhasil menolak pemesanan');
    }
}
