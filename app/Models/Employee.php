<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee';
    protected $fillable = [
    'nama',
    'tgl_lahir',
    'telepon',
    'gender',
    'pendidikan',
    'unit_kerja',
    'jabatan',
    'foto'
];
}
