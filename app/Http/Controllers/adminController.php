<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{

    public function index()
    {
        $admin = User::where('role', 'admin')->get();

        return view("admin.list_admin", compact("admin"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        User::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'role' => "admin"
        ]);

        return back()->with('success', 'Berhasil menyimpan data!');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name'=> 'required',
        ]);

        User::findOrFail($id)->update([
            'name'=> $request->name
        ]);
        return back()->with('success','Berhasil merubah data');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success','Berhasil menghapus data');
    }

    
}
