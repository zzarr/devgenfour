<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    use HasFactory;



    protected $fillable = [

        'name_app',
        'desc',
        'logo',
        'no_contact',
        'email',
        'instagram',
        'alamat',
        'gmaap_coordinat',
    ];
}
