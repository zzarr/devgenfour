<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_team'; // Assuming this is your primary key

    protected $fillable = [
        'name', 'jabatan', 'foto',
    ];
}
