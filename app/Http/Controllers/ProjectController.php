<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

        // Buat nama unik
        $fotoPagesName = Str::random(20) . '.' . $request->file('foto_pages')->getClientOriginalExtension();
        $fotoDashboardName = Str::random(20) . '.' . $request->file('foto_dashboard')->getClientOriginalExtension();
        $fotoProjectName = Str::random(20) . '.' . $request->file('foto_project')->getClientOriginalExtension();

        // Simpan ke folder upload/foto (tanpa public_path)
        $request->file('foto_pages')->move('upload/foto', $fotoPagesName);
        $request->file('foto_dashboard')->move('upload/foto', $fotoDashboardName);
        $request->file('foto_project')->move('upload/foto', $fotoProjectName);

        Project::create([
            'nama_project' => $request->nama,
            'nama_client' => $request->client,
            'tahun' => $request->tahun,
            'desk_project' => $request->desk,
            'foto_pages' => 'upload/foto/' . $fotoPagesName,
            'foto_dashboard' => 'upload/foto/' . $fotoDashboardName,
            'foto_project' => 'upload/foto/' . $fotoProjectName,
            'id_kategori' => $request->id_kategori,
        ]);

        return redirect('/project')->with('success', 'Data Project Berhasil Ditambah');
    }


    public function edit($id)
    {
        $data['title'] = 'Edit|Project';
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

        // Folder relatif
        $folder = 'upload/foto/';

        // Foto Pages
        if ($request->hasFile('foto_pages')) {
            if ($project->foto_pages && file_exists(base_path('public/' . $project->foto_pages))) {
                unlink(base_path('public/' . $project->foto_pages));
            }
            $newName = Str::random(20) . '.' . $request->file('foto_pages')->getClientOriginalExtension();
            $request->file('foto_pages')->move($folder, $newName);
            $data['foto_pages'] = $folder . $newName;
        }

        // Foto Dashboard
        if ($request->hasFile('foto_dashboard')) {
            if ($project->foto_dashboard && file_exists(base_path('public/' . $project->foto_dashboard))) {
                unlink(base_path('public/' . $project->foto_dashboard));
            }
            $newName = Str::random(20) . '.' . $request->file('foto_dashboard')->getClientOriginalExtension();
            $request->file('foto_dashboard')->move($folder, $newName);
            $data['foto_dashboard'] = $folder . $newName;
        }

        // Foto Project
        if ($request->hasFile('foto_project')) {
            if ($project->foto_project && file_exists(base_path('public/' . $project->foto_project))) {
                unlink(base_path('public/' . $project->foto_project));
            }
            $newName = Str::random(20) . '.' . $request->file('foto_project')->getClientOriginalExtension();
            $request->file('foto_project')->move($folder, $newName);
            $data['foto_project'] = $folder . $newName;
        }

        $project->update($data);

        return redirect('/project')->with('success', 'Data Project Berhasil Diubah');
    }


    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        if ($project->foto_pages && file_exists(base_path('public/' . $project->foto_pages))) {
            unlink(base_path('public/' . $project->foto_pages));
        }

        if ($project->foto_dashboard && file_exists(base_path('public/' . $project->foto_dashboard))) {
            unlink(base_path('public/' . $project->foto_dashboard));
        }

        if ($project->foto_project && file_exists(base_path('public/' . $project->foto_project))) {
            unlink(base_path('public/' . $project->foto_project));
        }

        $project->delete();

        return redirect('/project')->with('success', 'Data Project dan file berhasil dihapus');
    }
}
