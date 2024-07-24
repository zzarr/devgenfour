<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;


    protected $keyType = 'string';

    protected $fillable = [
        'name', 'jabatan', 'foto',
    ];
}
