<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProjectCounter extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'ip_address', 'visited_at'];
}
