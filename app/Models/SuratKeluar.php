<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class SuratKeluar extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_agenda',
        'nomor_surat',
        'tanggal_surat',
        'tujuan_surat',
        'perihal',
        'status',
        'kategori_id',
        'isi_ringkas',
        'lampiran_file',
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
}

