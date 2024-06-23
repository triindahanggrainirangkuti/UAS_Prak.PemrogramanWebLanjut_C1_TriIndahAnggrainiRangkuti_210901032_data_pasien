<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;
    protected $fillable = ['nik', 'nama_pasien', 'jk', 'keluhan', 'tgl_periksa', 'alamat'];
    protected $table = 'pasien';
}
