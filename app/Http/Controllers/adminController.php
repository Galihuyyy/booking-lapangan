<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends BaseController
{

    private function prepareDataAdmin($request) {
         $data = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        $data['role'] = 'admin';

        return $data;
    }

    public function index()
    {
        $admin = User::where('role', 'admin')->get();

        return view("admin.index", compact("admin"));
    }

    public function store(Request $request)
    {
        $data = $this->prepareDataAdmin($request);
        User::create($data);

        return $this->success('Berhasil menyimpan data!');
    }

    public function update(Request $request, $id) {
        $data = $this->prepareDataAdmin($request);
        User::findOrFail($id)->update($data);
        
        return $this->success('Berhasil merubah data');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return $this->success('Berhasil menghapus data!');
    }

    
}
