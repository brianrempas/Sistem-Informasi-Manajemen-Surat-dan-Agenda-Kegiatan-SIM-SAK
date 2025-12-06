<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class AgendaKegiatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kegiatan',
        'jenis_agenda_id',
        'waktu_mulai',
        'waktu_selesai',
        'tempat',
        'keterangan',
        'status',
        'surat_masuk_id',
        'surat_keluar_id',
        'created_by'
    ];

    public function jenisAgenda()
    {
        return $this->belongsTo(JenisAgenda::class);
    }

    public function suratMasuk()
    {
        return $this->belongsTo(SuratMasuk::class);
    }

    public function suratKeluar()
    {
        return $this->belongsTo(SuratKeluar::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

