<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $title = 'Client';
        $client = Client::all();
        $project = Project::all();
        return view('client.client', compact('client', 'project', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'desk' => 'required',
            'id_project' => 'required|exists:project,id_project',
        ]);

        Client::create([
            'nama_client' => $request->nama,
            'desk_client' => $request->desk,
            'id_project' => $request->id_project,
        ]);
        return redirect('/client')->with('success', 'Data Client Berhasil Di Tambah');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'desk' => 'required',
            'id_project' => 'required|exists:project,id_project',
        ]);

        $data = [
            'nama_client' => $request->nama,
            'desk_client' => $request->desk,
            'id_project' => $request->id_project,
        ];
        Client::where('id_client', $id)->update($data);
        return redirect('/client')->with('success', 'Data Client Berhasil Di Ubah');
    }

    public function destroy($id)
    {
        Client::where('id_client', $id)->delete();
        return redirect('/client')->with('success', 'Data Client Berhasil Di Hapus');
    }
}
