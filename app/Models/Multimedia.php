<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Multimedia extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image',
        'nama',
        'jenis_kelamin',
        'jabatan',
        'alamat',
    ];
}
