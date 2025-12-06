<?php

namespace App\Http\Controllers;

use App\Models\AgendaKegiatan;
use App\Models\JenisAgenda;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class AgendaKegiatanController extends Controller
{
    public function index(Request $request)
    {
        $query = AgendaKegiatan::with(['jenisAgenda', 'suratMasuk', 'suratKeluar']);

        // Search filter
        if ($request->filled('search')) {
            $query->where('nama_kegiatan', 'like', '%' . $request->search . '%');
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if (request('sort')) {
            $direction = request('direction') === 'desc' ? 'desc' : 'asc';
            $query->orderBy(request('sort'), $direction);
        }

        $items = $query->latest()->paginate(10);

        return view('agenda-kegiatan.index', compact('items'));
    }


    public function create()
    {
        return view('agenda-kegiatan.create', [
            'jenisAgenda' => JenisAgenda::all(),
            'suratMasuk' => SuratMasuk::all(),
            'suratKeluar' => SuratKeluar::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kegiatan' => 'required',
            'jenis_agenda_id' => 'required',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date',
            'tempat' => 'required',
            'keterangan' => 'nullable',
            'status' => 'required',
            'surat_masuk_id' => 'nullable',
            'surat_keluar_id' => 'nullable',
        ]);

        $data['created_by'] = auth()->id();

        AgendaKegiatan::create($data);

        return redirect()->route('agenda-kegiatan.index')->with('success', 'Agenda kegiatan ditambahkan');
    }

    public function edit(AgendaKegiatan $agendaKegiatan)
    {
        $jenisAgenda = JenisAgenda::all();
        $suratMasuk = SuratMasuk::all();
        $suratKeluar = SuratKeluar::all();

        return view('agenda-kegiatan.edit', [
            'agenda' => $agendaKegiatan,
            'jenisAgenda' => $jenisAgenda,
            'suratMasuk' => $suratMasuk,
            'suratKeluar' => $suratKeluar,
        ]);
    }

    public function update(Request $request, AgendaKegiatan $agendaKegiatan)
    {
        $data = $request->validate([
            'nama_kegiatan' => 'required',
            'jenis_agenda_id' => 'required',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date',
            'tempat' => 'required',
            'keterangan' => 'nullable',
            'status' => 'required',
            'surat_masuk_id' => 'nullable',
            'surat_keluar_id' => 'nullable',
        ]);

        $data['surat_masuk_id'] = $data['surat_masuk_id'] ?: null;
        $data['surat_keluar_id'] = $data['surat_keluar_id'] ?: null;
        $agendaKegiatan->update($data);

        return redirect()->route('agenda-kegiatan.index')->with('success', 'Agenda kegiatan diperbarui');
    }

    public function destroy(AgendaKegiatan $agendaKegiatan)
    {
        $agendaKegiatan->delete();
        return back()->with('success', 'Agenda kegiatan dihapus');
    }
}
