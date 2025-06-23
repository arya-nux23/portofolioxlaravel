<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Project;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $title = 'Kategori';
        $kategori = Kategori::all();
        return view('kategori.kategori', compact('kategori', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required'
        ]);

        Kategori::create([
            'nama_kategori' => $request->kategori
        ]);

        return redirect()->route('kategori')->with('success', 'Data Kategori Berhasil Di Tambah');
    }

    public function update(Request $request, $id){
        $request->validate([
            'kategori' => 'required'
        ]);

        $data = [
            'nama_kategori' => $request->kategori
        ];

        Kategori::where('id_kategori', $id)->update($data);
        return redirect('kategori')->with('success', 'Data Kategori Berhasil Di Edit');
    }

    public function destroy($id)
    {
        $projectCount = Project::where('id_kategori', $id)->count();

        if ($projectCount > 0) {
            return redirect('kategori')->with('error', 'Tidak bisa menghapus kategori karena masih digunakan oleh project.');
        }

        Kategori::where('id_kategori', $id)->delete();

        return redirect('kategori')->with('success', 'Data kategori berhasil dihapus.');
    }
}
