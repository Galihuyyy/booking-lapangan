<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;

class lapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lapangan = Lapangan::all();

        return view("admin.list_lapangan", compact("lapangan"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga_sewa' => 'required|numeric|min:0',
        ]);

        $file = $request->file('foto');
        $namaFile = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/lapangan'), $namaFile);

        Lapangan::create([
            'foto' => 'images/lapangan/' . $namaFile,
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'harga_sewa' => $request->harga_sewa,
        ]);

        return redirect()->back()->with('success', 'Lapangan berhasil ditambahkan!');
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lapangan = Lapangan::findOrFail($id);

        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga_sewa' => 'required|numeric|min:0',
        ]);

        $data = [
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'harga_sewa' => $request->harga_sewa,
        ];

        if ($request->hasFile('foto')) {
            if (file_exists(public_path($lapangan->foto))) {
                unlink(public_path($lapangan->foto));
            }

            $file = $request->file('foto');
            $namaFile = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/lapangan'), $namaFile);
            $data['foto'] = 'images/lapangan/' . $namaFile;
        }

        $lapangan->update($data);

        return redirect()->back()->with('success', 'Data lapangan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lapangan = Lapangan::findOrFail($id);

        $lapangan->delete();

        return redirect()->back()->with('success','Behasil menghapus data');
    }
}
