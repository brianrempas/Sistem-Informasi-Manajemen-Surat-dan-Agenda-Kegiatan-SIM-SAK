<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class JenisAgenda extends Model
{
    use HasFactory;
    protected $fillable = ['nama_jenis', 'deskripsi'];

    public function agenda()
    {
        return $this->hasMany(AgendaKegiatan::class);
    }
}

