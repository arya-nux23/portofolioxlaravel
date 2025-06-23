<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        $title = 'Users';
        $operator = User::all();
        return view('operator.operator', compact('operator', 'title'));
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required|min:3'
        ]);

        $data = [
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
        User::create($data);
        return redirect()->route('users')->with('success', 'Data users Berhasil Di Tambah');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'nullable|min:3'
        ]);

        $data = [
            'name' => $request->nama,
            'email' => $request->email,
        ];
        // Kalau password diisi, baru update password
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        User::where('id', $id)->update($data);

        return redirect('/users')->with('success', 'Data users Berhasil Di ubah');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect('/users')->with('success', 'Data users Berhasil Di Hapus');
    }
}
