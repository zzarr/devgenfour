<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;



    protected $fillable = [
        'title', 'description', 'thumbnail',
    ];

    // Define the relationship to project_imgs if needed
    public function images()
    {
        return $this->hasMany(ProjectImg::class, 'id_project');
    }
}
