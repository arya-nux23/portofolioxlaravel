<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'client';
    protected $primaryKey = 'id_client';
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project', 'id_project');
    }
}
