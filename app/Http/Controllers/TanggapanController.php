<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'mahasiswa') {
            // Ambil tanggapan yang berkaitan dengan pengaduan milik mahasiswa tersebut
            $tanggapans = Tanggapan::whereHas('pengaduan', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->with('pengaduan')->get();
        } else {
            // Untuk dosen dan admin, tampilkan semua tanggapan
            $tanggapans = Tanggapan::with('pengaduan')->get();
        }

        return view('tanggapan.index', compact('tanggapans'));
    }


    public function create(string $pengaduanId)
    {
        if (!in_array(Auth::user()->role, ['admin', 'dosen'])) {
            abort(403, 'Anda tidak memiliki akses untuk membuat tanggapan.');
        }

        $pengaduan = Pengaduan::findOrFail($pengaduanId);

        return view('tanggapan.create', compact('pengaduan'));
    }

    public function store(Request $request, string $pengaduanId)
    {
        if (!in_array(Auth::user()->role, ['admin', 'dosen'])) {
            abort(403, 'Anda tidak memiliki akses untuk menyimpan tanggapan.');
        }

        $request->validate([
            'isi_tanggapan' => 'required|string',
        ]);

        $pengaduan = Pengaduan::findOrFail($pengaduanId);

        // Buat tanggapan baru
        Tanggapan::create([
            'pengaduan_id' => $pengaduan->id,
            'isi_tanggapan' => $request->isi_tanggapan,
            'user_id' => Auth::id(),
        ]);

        /**
         * Jika sebelumnya status pengaduan adalah 'selesai',
         * dan mahasiswa menekan 'dislike', maka ubah status kembali ke 'diproses'
         */
        if ($pengaduan->status === 'selesai') {
            $pengaduan->update(['status' => 'diproses']);
        }
        // Jika belum selesai atau belum ada tanggapan, pastikan status tetap 'diproses'
        elseif ($pengaduan->status === 'menunggu') {
            $pengaduan->update(['status' => 'diproses']);
        }

        return redirect()->route('pengaduan.index')->with('success', 'Tanggapan berhasil dibuat.');
    }

    public function show(string $id)
    {
        $tanggapan = Tanggapan::with('pengaduan', 'user')->findOrFail($id);
        return view('tanggapan.show', compact('tanggapan'));
    }

    public function edit(string $id)
    {
        $tanggapan = Tanggapan::with('pengaduan')->findOrFail($id);

        if (!in_array(Auth::user()->role, ['admin', 'dosen'])) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit tanggapan ini.');
        }

        return view('tanggapan.edit', compact('tanggapan'));
    }

    public function update(Request $request, string $id)
    {
        $tanggapan = Tanggapan::findOrFail($id);

        if (!in_array(Auth::user()->role, ['admin', 'dosen'])) {
            abort(403, 'Anda tidak memiliki akses untuk memperbarui tanggapan ini.');
        }

        $request->validate([
            'isi_tanggapan' => 'required|string',
        ]);

        $tanggapan->update([
            'isi_tanggapan' => $request->isi_tanggapan,
        ]);

        return redirect()->route('tanggapan.index')->with('success', 'Tanggapan berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $tanggapan = Tanggapan::findOrFail($id);

        if (!in_array(Auth::user()->role, ['admin', 'dosen'])) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus tanggapan ini.');
        }

        $pengaduan = $tanggapan->pengaduan;
        $tanggapan->delete();

        // Jika tidak ada tanggapan tersisa, ubah status pengaduan ke 'menunggu'
        if ($pengaduan->tanggapan()->count() === 0) {
            $pengaduan->update(['status' => 'menunggu']);
        }

        return redirect()->route('tanggapan.index')->with('success', 'Tanggapan berhasil dihapus.');
    }
}
