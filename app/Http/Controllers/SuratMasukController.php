<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\KategoriSurat;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index(Request $request)
    {
        $query = SuratMasuk::with('kategori');

        // Search filter: nomor_surat or perihal
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nomor_agenda', 'like', '%' . $request->search . '%')
                    ->orWhere('perihal', 'like', '%' . $request->search . '%');
            });
        }

        // Optional filter by status
        if ($request->filled('status')) {
            $query->where('status_disposisi', $request->status);
        }

        // Sorting
        $sort = $request->get('sort', 'created_at'); // default sort column
        $direction = $request->get('direction', 'desc'); // default sort direction

        $query->orderBy($sort, $direction);

        // Pagination
        $items = $query->paginate(10)->withQueryString();

        return view('surat_masuk.index', compact('items'));
    }



    public function create()
    {
        $kategori = KategoriSurat::all();
        return view('surat_masuk.create', compact('kategori'));
    }

    public function store(Request $request)
    {

        $last = SuratMasuk::latest()->first();
        $next = $last ? $last->id + 1 : 1;

        $nomorAgenda = 'SM-' . date('Y') . '-' . str_pad($next, 4, '0', STR_PAD_LEFT);

        $data = $request->validate([
            'nomor_surat_asal' => 'required',
            'tanggal_surat' => 'required|date',
            'tanggal_diterima' => 'required|date',
            'asal_surat' => 'required',
            'perihal' => 'required',
            'kategori_id' => 'required',
            'isi_ringkas' => 'nullable',
            'lampiran_file' => 'nullable|file|max:4096',
            'status_disposisi' => 'nullable|in:belum,proses,selesai',
        ]);

        $data['created_by'] = auth()->id();
        $data['nomor_agenda'] = $nomorAgenda;

        // Upload file
        if ($request->hasFile('lampiran_file')) {
            $data['lampiran_file'] = $request->file('lampiran_file')->store('lampiran', 'public');
        }

        SuratMasuk::create($data);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil ditambahkan');
    }


    public function edit(SuratMasuk $suratMasuk)
    {
        $kategori = KategoriSurat::all();
        return view('surat_masuk.edit', compact('suratMasuk', 'kategori'));
    }

    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        $data = $request->validate([
            'nomor_surat_asal' => 'required',
            'tanggal_surat' => 'required|date',
            'tanggal_diterima' => 'required|date',
            'asal_surat' => 'required',
            'perihal' => 'required',
            'kategori_id' => 'required',
            'isi_ringkas' => 'nullable',
            'lampiran_file' => 'nullable|file|max:4096',
            'status_disposisi' => 'required|in:belum,proses,selesai', // untuk update
        ]);

        if ($request->hasFile('lampiran_file')) {
            $data['lampiran_file'] = $request->file('lampiran_file')->store('lampiran', 'public');
        }

        $suratMasuk->update($data);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil diperbarui');
    }

    public function destroy(SuratMasuk $suratMasuk)
    {
        $suratMasuk->delete();
        return back()->with('success', 'Surat masuk berhasil dihapus');
    }
}
