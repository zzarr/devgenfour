<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    use HasFactory;

    protected $table = 'app_settings';

    protected $primaryKey = 'id_setting';

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
