<?php

namespace App\Http\Controllers;

use App\Models\JenisAgenda;
use Illuminate\Http\Request;

class JenisAgendaController extends Controller
{
    public function index(Request $request)
    {
        $query = JenisAgenda::query();

        // Search filter
        if ($request->filled('search')) {
            $query->where('nama_jenis', 'like', '%' . $request->search . '%');
        }

        // Sorting
        if ($request->filled('sort')) {
            $direction = $request->direction === 'desc' ? 'desc' : 'asc';
            $query->orderBy($request->sort, $direction);
        }

        // Default latest
        $items = $query->latest()->paginate(10)->withQueryString();

        return view('jenis-agenda.index', compact('items'));
    }


    public function create()
    {
        return view('jenis-agenda.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_jenis' => 'required',
            'deskripsi' => 'nullable'
        ]);

        JenisAgenda::create($data);

        return redirect()->route('jenis-agenda.index')->with('success', 'Jenis agenda ditambahkan');
    }

    public function edit(JenisAgenda $jenisAgenda)
    {
        return view('jenis-agenda.edit', compact('jenisAgenda'));
    }

    public function update(Request $request, JenisAgenda $jenisAgenda)
    {
        $data = $request->validate([
            'nama_jenis' => 'required',
            'deskripsi' => 'nullable'
        ]);

        $jenisAgenda->update($data);

        return redirect()->route('jenis-agenda.index')->with('success', 'Jenis agenda diperbarui');
    }

    public function destroy(JenisAgenda $jenisAgenda)
    {
        $jenisAgenda->delete();
        return back()->with('success', 'Jenis agenda dihapus');
    }
}
