<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;

class lapanganController extends Controller
{
    private function prepareDataLapangan($request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga_sewa' => 'required|numeric|min:0',
        ]);

        return $request->only(['foto', 'name', 'deskripsi', 'harga_sewa']);
    }

    private function storeFoto($request)
    {
        $file = $request->file('foto');
        $namaFile = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/lapangan'), $namaFile);

        return $namaFile;
    }

    private function deleteFoto($file)
    {
        if (file_exists(public_path($file))) {
            unlink(public_path($file));
        }
    }

    public function index()
    {
        $lapangan = Lapangan::all();

        return view("admin.lapangan.index", compact("lapangan"));
    }
    public function store(Request $request)
    {
        $data = $this->prepareDataLapangan($request);

        $namaFile = $this->storeFoto($request);

        Lapangan::create([
            'foto' => 'images/lapangan/' . $namaFile,
            'name' => $data['name'],
            'deskripsi' => $data['deskripsi'],
            'harga_sewa' => $data['harga_sewa'],
        ]);

        return redirect()->back()->with('success', 'Lapangan berhasil ditambahkan!');
    }
    public function update(Request $request, string $id)
    {
        $lapangan = Lapangan::findOrFail($id);

        $data = $this->prepareDataLapangan($request);

        if ($request->hasFile('foto')) {
            $this->deleteFoto($lapangan->foto);

            $namaFile = $this->storeFoto($request);
            $data['foto'] = 'images/lapangan/' . $namaFile;
        }

        $lapangan->update($data);

        return redirect()->back()->with('success', 'Data lapangan berhasil diupdate!');
    }
    public function destroy(string $id)
    {
        $lapangan = Lapangan::findOrFail($id);

        $lapangan->delete();

        return redirect()->back()->with('success', 'Behasil menghapus data');
    }
}
