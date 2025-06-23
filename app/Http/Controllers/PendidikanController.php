<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    public function index()
    {
        $title = 'Pendidikan';
        $pendidikan = Pendidikan::all();
        return view('pendidikan.pendidikan', compact('pendidikan', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_masuk' => 'required',
            'tahun_keluar' => 'required|string',
            'jurusan' => 'required|string',
            'sekolah' => 'required|string',
            'description' => 'required',
        ]);

        Pendidikan::create([
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
            'jurusan' => $request->jurusan,
            'sekolah' => $request->sekolah,
            'desk_pendidikan' => $request->description,
        ]);

        return redirect()->route('pendidikan')->with('success', 'Data pendidikan Berhasil Di Tambah');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun_masuk' => 'required',
            'tahun_keluar' => 'required|string',
            'jurusan' => 'required|string',
            'sekolah' => 'required|string',
            'description' => 'required',
        ]);

        $data = [
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
            'jurusan' => $request->jurusan,
            'sekolah' => $request->sekolah,
            'desk_pendidikan' => $request->description,
        ];

        Pendidikan::where('id_pendidikan', $id)->update($data);
        return redirect('pendidikan')->with('success', 'Data pendidikan Berhasil Di Edit');
    }

    public function destroy($id)
    {
        Pendidikan::where('id_pendidikan', $id)->delete();
        return redirect('pendidikan')->with('success', 'Data Berhasil Di Hapus');
    }
}
