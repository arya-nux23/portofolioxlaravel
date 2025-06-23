<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'profil';
        $project = Project::first();
        return view('page.profile', compact('project', 'title'));
    }

    public function about(){
        $title = 'tentang saya';
        $about = About::first();
        $pengalaman = Pengalaman::all();
        $pendidikan = Pendidikan::all();
        return view('page.about', compact('pendidikan', 'pengalaman', 'about', 'title'));
    }

    public function credentials(){
        $title = 'credentials';
        $about = About::first();
        $pengalaman = Pengalaman::all();
        $pendidikan = Pendidikan::all();
        $skil = Skill::all();
        return view('page.credential', compact('pendidikan', 'pengalaman', 'skil', 'about', 'title'));
    }

    public function project(){
        $title = 'pekerjaan';
        $project = Project::all();
        return view('page.pekerjaan', compact('project', 'title'));
    }

    public function detailProject($id){
        $title = 'detail project';
        $project = Project::findOrFail($id);
        return view('page.detail-pekerjaan', compact('project', 'title'));
    }

    public function contact(){
        $title = 'tentang kami';
        return view('page.contact', compact('title'));
    }
}
