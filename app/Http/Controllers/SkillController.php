<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $title = 'Skill';
        $skill = Skill::all();
        return view('skill.skil', compact('skill', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'skil' => 'required',
            'tingkat_skil' => 'required|string',
        ]);

        Skill::create([
            'nama_skil' => $request->skil,
            'tingkat_skil' => $request->tingkat_skil,
        ]);

        return redirect()->route('skil')->with('success', 'Data skil Berhasil Di Tambah');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'skil' => 'required',
        ]);

        $data = [
            'nama_skil' => $request->skil,
        ];

        skill::where('id_skil', $id)->update($data);
        return redirect('skil')->with('success', 'Data skil Berhasil Di Edit');
    }

    public function destroy($id)
    {
        skill::where('id_skil', $id)->delete();
        return redirect('skil')->with('success', 'Data Berhasil Di Hapus');
    }
}
