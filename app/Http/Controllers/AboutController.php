<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $about = About::all();
        $title = 'About';
        return view('about.about', compact('about', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'desk' => 'required'
        ]);

        About::create([
            'desk_about' => $request->desk
        ]);

        return redirect()->route('about')->with('success', 'Data about Berhasil Di Tambah');
    }

       public function update(Request $request, $id){
        $request->validate([
            'desk' => 'required'
        ]);

        $data = [
            'desk_about' => $request->desk
        ];

        About::where('id_about', $id)->update($data);
        return redirect('about')->with('success', 'Data About Berhasil Di Edit');
    }

    public function destroy($id){
        About::where('id_about', $id)->delete();
        return redirect('about')->with('success', 'Data Berhasil Di Hapus');
    }
}
