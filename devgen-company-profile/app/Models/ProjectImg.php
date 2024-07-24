<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\ForeignKeyDefinition;

class ProjectImg extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_img';
    protected $fillable = [
        'id_project', 
        'image_name'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project');
    }
}
