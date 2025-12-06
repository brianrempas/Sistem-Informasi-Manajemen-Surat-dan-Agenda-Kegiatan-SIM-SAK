<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\KategoriSurat;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index(Request $request)
    {
        $query = SuratKeluar::with('kategori'); // eager load kategori

        // Search filter: nomor_surat or perihal
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nomor_agenda', 'like', '%' . $request->search . '%')
                    ->orWhere('perihal', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by status (draft, ditandatangani, dikirim)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Sorting
        $sort = $request->get('sort', 'created_at'); // default sort column
        $direction = $request->get('direction', 'desc'); // default sort direction
        $query->orderBy($sort, $direction);

        // Pagination
        $items = $query->paginate(10)->withQueryString();

        return view('surat_keluar.index', compact('items'));
    }


    public function create()
    {
        $kategori = KategoriSurat::all();
        return view('surat_keluar.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $last = SuratKeluar::latest()->first();
        $next = $last ? $last->id + 1 : 1;

        $nomorAgenda = 'SK-' . date('Y') . '-' . str_pad($next, 4, '0', STR_PAD_LEFT);

        $data = $request->validate([
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'tujuan_surat' => 'required',
            'perihal' => 'required',
            'kategori_id' => 'required',
            'isi_ringkas' => 'nullable',
            'lampiran_file' => 'nullable|file',
            'status' => 'nullable|in:draft,ditandatangani,dikirim',
        ]);

        $data['created_by'] = auth()->id();
        $data['nomor_agenda'] = $nomorAgenda;

        if ($request->hasFile('lampiran_file')) {
            $data['lampiran_file'] = $request->file('lampiran_file')->store('lampiran', 'public');
        }

        SuratKeluar::create($data);

        return redirect()->route('surat-keluar.index')->with('success', 'Surat keluar ditambahkan');
    }

    public function edit(SuratKeluar $suratKeluar)
    {
        $kategori = KategoriSurat::all();
        return view('surat_keluar.edit', compact('suratKeluar', 'kategori'));
    }

    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        $data = $request->validate([
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'tujuan_surat' => 'required',
            'perihal' => 'required',
            'kategori_id' => 'required',
            'isi_ringkas' => 'nullable',
            'lampiran_file' => 'nullable|file',
            'status' => 'nullable|in:draft,ditandatangani,dikirim',
        ]);

        if ($request->hasFile('lampiran_file')) {
            $data['lampiran_file'] = $request->file('lampiran_file')->store('lampiran', 'public');
        }

        $suratKeluar->update($data);

        return redirect()->route('surat-keluar.index')->with('success', 'Surat keluar diperbarui');
    }

    public function destroy(SuratKeluar $suratKeluar)
    {
        $suratKeluar->delete();
        return back()->with('success', 'Surat keluar dihapus');
    }
}
