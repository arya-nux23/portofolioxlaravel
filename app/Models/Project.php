<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table ='project';
    protected $primaryKey = 'id_project';
    protected $guarded = [];

    public function client(){
        return $this->hasMany(Client::class, 'id_project', 'id_project');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
