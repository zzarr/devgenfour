<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choose extends Model
{
    use HasFactory;

    protected $table = 'choose'; // Menentukan nama tabel yang benar

    protected $fillable = [
        'icon',
        'title',
        'description',
    ];
}
