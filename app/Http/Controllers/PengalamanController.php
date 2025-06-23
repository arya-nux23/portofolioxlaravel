<?php

namespace App\Http\Controllers;

use App\Models\Pengalaman;
use Illuminate\Http\Request;

class PengalamanController extends Controller
{
    public function index()
    {
        $title = 'Pengalaman';
        $pengalaman = Pengalaman::all();
        return view('pengalaman.pengalaman', compact('pengalaman', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_masuk' => 'required',
            'tahun_keluar' => 'required|string',
            'bidang_kerja' => 'required|string',
            'perusahaan' => 'required|string',
            'description' => 'required',
        ]);

        Pengalaman::create([
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
            'bidang_kerja' => $request->bidang_kerja,
            'perusahaan' => $request->perusahaan,
            'desk_pengalaman' => $request->description,
        ]);

        return redirect()->route('pengalaman')->with('success', 'Data pengalaman Berhasil Di Tambah');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun_masuk' => 'required',
            'tahun_keluar' => 'required|string',
            'bidang_kerja' => 'required|string',
            'perusahaan' => 'required|string',
            'description' => 'required',
        ]);

        $data = [
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
            'bidang_kerja' => $request->bidang_kerja,
            'perusahaan' => $request->perusahaan,
            'desk_pengalaman' => $request->description,
        ];

        Pengalaman::where('id_pengalaman', $id)->update($data);
        return redirect('pengalaman')->with('success', 'Data pengalaman Berhasil Di Edit');
    }

    public function destroy($id)
    {
        Pengalaman::where('id_pengalaman', $id)->delete();
        return redirect('pengalaman')->with('success', 'Data Berhasil Di Hapus');
    }
}
