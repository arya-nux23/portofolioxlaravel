<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Porject';
        $project = Project::all();
        $kategori = Kategori::all();
        // Ambil ID project dari query parameter kalau sedang mode edit
        $editId = $request->query('edit');
        $editProject = null;
        if ($editId) {
            $editProject = Project::find($editId);
        }
        return view('project.project', compact('project', 'kategori', 'title'));
    }

    public function tambah()
    {
        $title = 'Tambah|Project';
        $kategori = Kategori::all();
        return view('project.tambah', compact('kategori', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'client' => 'required',
            'tahun' => 'required|digits:4|integer|min:1900|max:2099',
            'desk' => 'required',
            'foto_pages' => 'required|image|mimes:jpeg,png,jpg|max:4048',
            'foto_dashboard' => 'required|image|mimes:jpeg,png,jpg|max:4048',
            'foto_project' => 'required|image|mimes:jpeg,png,jpg|max:4048',
            'id_kategori' => 'required|exists:kategori,id_kategori',
        ]);

        // Proses upload gambar
        $fotoPages = $request->file('foto_pages')->store('upload/foto', 'public');
        $fotoDashboard = $request->file('foto_dashboard')->store('upload/foto', 'public');
        $fotoProject = $request->file('foto_project')->store('upload/foto', 'public');

        Project::create([
            'nama_project' => $request->nama,
            'nama_client' => $request->client,
            'tahun' => $request->tahun,
            'desk_project' => $request->desk,
            'foto_pages' => $fotoPages,
            'foto_dashboard' => $fotoDashboard,
            'foto_project' => $fotoProject, // sesuai nama kolom
            'id_kategori' => $request->id_kategori,
        ]);

        return redirect('/project')->with('success', 'Data Project Berhasil Ditambah');
    }

    public function edit($id){
        $data ['title'] = 'Edit|Project';
        $data['project'] = Project::where('id_project', $id)->first();
        $data['kategori'] = Kategori::all();
        return view('project.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'client' => 'required',
            'tahun' => 'required|digits:4|integer|min:1900|max:2099',
            'desk' => 'required',
            'foto_pages' => 'nullable|image|mimes:jpeg,png,jpg|max:4048',
            'foto_dashboard' => 'nullable|image|mimes:jpeg,png,jpg|max:4048',
            'foto_project' => 'nullable|image|mimes:jpeg,png,jpg|max:4048',
            'id_kategori' => 'required|exists:kategori,id_kategori',
        ]);

        $project = Project::findOrFail($id);

        $data = [
            'nama_project' => $request->nama,
            'nama_client' => $request->client,
            'tahun' => $request->tahun,
            'desk_project' => $request->desk,
            'id_kategori' => $request->id_kategori,
        ];

        // Path base
        $storagePath = public_path('storage/');

        // Handle foto_pages
        if ($request->hasFile('foto_pages')) {
            if ($project->foto_pages && file_exists($storagePath . $project->foto_pages)) {
                unlink($storagePath . $project->foto_pages);
            }
            $data['foto_pages'] = $request->file('foto_pages')->store('upload/foto', 'public');
        }

        // Handle foto_dashboard
        if ($request->hasFile('foto_dashboard')) {
            if ($project->foto_dashboard && file_exists($storagePath . $project->foto_dashboard)) {
                unlink($storagePath . $project->foto_dashboard);
            }
            $data['foto_dashboard'] = $request->file('foto_dashboard')->store('upload/foto', 'public');
        }

        // Handle foto_project
        if ($request->hasFile('foto_project')) {
            if ($project->foto_project && file_exists($storagePath . $project->foto_project)) {
                unlink($storagePath . $project->foto_project);
            }
            $data['foto_project'] = $request->file('foto_project')->store('upload/foto', 'public');
        }

        $project->update($data);

        return redirect('/project')->with('success', 'Data Project Berhasil Diubah');
    }


    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        $storagePath = public_path('storage/');

        // Hapus foto_pages jika ada
        if ($project->foto_pages && file_exists($storagePath . $project->foto_pages)) {
            unlink($storagePath . $project->foto_pages);
        }

        // Hapus foto_dashboard jika ada
        if ($project->foto_dashboard && file_exists($storagePath . $project->foto_dashboard)) {
            unlink($storagePath . $project->foto_dashboard);
        }

        // Hapus foto_project jika ada
        if ($project->foto_project && file_exists($storagePath . $project->foto_project)) {
            unlink($storagePath . $project->foto_project);
        }

        // Hapus data dari database
        $project->delete();

        return redirect('/project')->with('success', 'Data Project dan file berhasil dihapus');
    }
}
