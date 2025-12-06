<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class SuratMasuk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_agenda',
        'nomor_surat_asal',
        'tanggal_surat',
        'tanggal_diterima',
        'asal_surat',
        'perihal',
        'kategori_id',
        'isi_ringkas',
        'lampiran_file',
        'status_disposisi',
        'created_by'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriSurat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function agenda()
    {
        return $this->hasOne(AgendaKegiatan::class, 'surat_masuk_id');
    }
}

