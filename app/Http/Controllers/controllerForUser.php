<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\Pemesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class controllerForUser extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lapangan = Lapangan::with(['pemesanan' => function($query) {
            $query->where('status_pemesanan', 'dikonfirmasi');
        }])->get();

        $riwayat_pemesanan = Pemesanan::with('lapangan')->where('user_id', auth()->user()->id)->get();




        return view("users.home", compact(["lapangan", "riwayat_pemesanan"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "lapangan_id" => "required",
            "tanggal_booking" => "date|required",
            "jam_mulai" => "required|date_format:H:i",
            "durasi" => "required|integer|min:1",
        ]);

        $input = $request->only(['lapangan_id', 'tanggal_booking', 'jam_mulai', 'durasi']);

        $jamMulai = Carbon::createFromFormat('H:i', $input['jam_mulai']);
        $durasi = (int) $input['durasi'];


        for ($i = 0; $i < $durasi; $i++) {
            $cekJam = $jamMulai->copy()->addHours($i)->format('H:i:s');

            $bentrok = Pemesanan::where('lapangan_id', $input['lapangan_id'])
                ->where('tanggal_booking', $input['tanggal_booking'])
                ->where('status_pemesanan', 'dikonfirmasi')
                ->where(function ($q) use ($cekJam) {
                    $q->whereTime('jam_mulai', '<=', $cekJam)
                    ->whereTime('jam_selesai', '>', $cekJam);
                })
                ->exists();

            if ($bentrok) {
                return redirect()->back()->with('error', "Jadwal bentrok ganti turunkan durasi atau ganti jam mulai.");
            }
        }

        $jamSelesai = $jamMulai->copy()->addHours($durasi);
        $lapangan = Lapangan::findOrFail($input['lapangan_id']);
        $totalBayar = $lapangan->harga_sewa * $durasi;

        Pemesanan::create([
            'user_id' => auth()->id(),
            'lapangan_id' => $input['lapangan_id'],
            'tanggal_booking' => $input['tanggal_booking'],
            'jam_mulai' => $jamMulai->format('H:i:s'),
            'jam_selesai' => $jamSelesai->format('H:i:s'),
            'durasi' => $durasi,
            'total_bayar' => $totalBayar,
        ]);

        return redirect()->route('home.index')->with('success', 'Booking berhasil disimpan!');



        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();
        return redirect()->back()->with('success','Booking dibatalkan');
    }
}
