<?php

namespace App\Http\Controllers;

use App\Models\KategoriSurat;
use Illuminate\Http\Request;

class KategoriSuratController extends Controller
{
    public function index(Request $request)
    {
        $query = KategoriSurat::query();

        // Search filter
        if ($request->filled('search')) {
            $query->where('nama_kategori', 'like', '%' . $request->search . '%');
        }

        // Sorting
        if ($request->filled('sort')) {
            $direction = $request->direction === 'desc' ? 'desc' : 'asc';
            $query->orderBy($request->sort, $direction);
        }

        // Default latest
        $items = $query->latest()->paginate(10)->withQueryString();

        return view('kategori-surat.index', compact('items'));
    }


    public function create()
    {
        return view('kategori-surat.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'nullable'
        ]);

        KategoriSurat::create($data);

        return redirect()->route('kategori-surat.index')->with('success', 'Kategori ditambahkan');
    }

    public function edit(KategoriSurat $kategoriSurat)
    {
        return view('kategori-surat.edit', compact('kategoriSurat'));
    }

    public function update(Request $request, KategoriSurat $kategoriSurat)
    {
        $data = $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'nullable'
        ]);

        $kategoriSurat->update($data);

        return redirect()->route('kategori-surat.index')->with('success', 'Kategori diperbarui');
    }

    public function destroy(KategoriSurat $kategoriSurat)
    {
        $kategoriSurat->delete();
        return back()->with('success', 'Kategori dihapus');
    }
}
