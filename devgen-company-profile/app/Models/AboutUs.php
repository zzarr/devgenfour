<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan oleh model ini
    protected $table = 'about_us';

    // Menentukan primary key tabel
    protected $primaryKey = 'id_about_us';

    // Menentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'title',
        'description',
        'image',
    ];
}
