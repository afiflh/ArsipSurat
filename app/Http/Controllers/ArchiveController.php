<?php

namespace App\Http\Controllers;

use App\Models\ArsipSurat;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArchiveController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query from the request
        $search = $request->input('search');
        $r = new Request();

        // Query the ArsipSurat model with the search term and order by 'waktu_pengarsipan'
        $arsipSurats = ArsipSurat::with('kategori')
            ->when($search, function ($query, $search) {
                return $query->where('nomor_surat', 'like', "%{$search}%")
                            ->orWhere('judul', 'like', "%{$search}%");
            })
            ->orderBy('waktu_pengarsipan', 'desc')  // Mengurutkan berdasarkan waktu_pengarsipan terbaru
            ->paginate(5);

        return view('arsip', compact('arsipSurats'));
    }


    public function create()
    {
        $kategori = CategoryModel::all(); // Mengambil semua kategori surat
        return view('tambaharsip', compact('kategori'));
    }

    public function store(Request $request)
    {
        // Validasi inputan
        $validatedData = $request->validate([
            'nomor_surat' => 'required|string|max:100',
            'id_kategori' => 'required|exists:categories,id_kategori', // Pastikan kategori ada
            'judul' => 'required|string|max:255',
            'file_pdf' => 'required|mimes:pdf|max:10240', // Maksimal file 10MB
        ]);

        // Simpan file PDF ke storage
        $originalName = pathinfo($validatedData['file_pdf']->getClientOriginalName());
        $uniqueIdentifier = Str::slug($originalName['filename'], '-') . '-' . time() . '.' . $originalName['extension'];
        $filePath = $validatedData['file_pdf']->storeAs('arsip_surat', $uniqueIdentifier, 'public');

         // Simpan data ke database
         ArsipSurat::create([
            'nomor_surat' => $validatedData['nomor_surat'],
            'id_kategori' => $validatedData['id_kategori'],
            'judul' => $validatedData['judul'],
            'file_pdf' => $filePath,  // Kolom file_surat di database
        ]);

        // Redirect ke halaman arsip dengan pesan sukses
        return redirect()->route('arsip.index')->with('success', 'Arsip surat berhasil disimpan!');
    } 

    public function destroy($id_surat)
    {
        // Cari arsip surat berdasarkan ID
        $arsipSurat = ArsipSurat::findOrFail($id_surat);

        // Hapus file PDF dari storage
        if (file_exists(storage_path('app/public/' . $arsipSurat->file_pdf))) {
            unlink(storage_path('app/public/' . $arsipSurat->file_pdf));
        }

        // Hapus data arsip surat dari database
        $arsipSurat->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('arsip.index')->with('success', 'Arsip surat berhasil dihapus!');
    }

    public function download($id_surat)
    {
        // Cari arsip surat berdasarkan ID
        $arsipSurat = ArsipSurat::findOrFail($id_surat);

        // Tentukan path file PDF yang ingin diunduh
        $filePath = storage_path('app/public/' . $arsipSurat->file_pdf);

        // Periksa apakah file ada
        if (file_exists($filePath)) {
            // Kembalikan file untuk diunduh
            return response()->download($filePath);
        } else {
            // Jika file tidak ditemukan, beri respons error
            return redirect()->route('arsip.index')->with('error', 'File tidak ditemukan.');
        }
    }

    public function viewPdf($id_surat)
    {
        // Cari arsip surat berdasarkan ID
        $arsipSurat = ArsipSurat::findOrFail($id_surat);

        // Pastikan file PDF ada
        $filePath = storage_path('app/public/' . $arsipSurat->file_pdf);

        if (file_exists($filePath)) {
            return view('lihatpdf', compact('arsipSurat'));
        } else {
            return redirect()->route('arsip.index')->with('error', 'File PDF tidak ditemukan.');
        }
    }

    public function edit($id_surat)
    {
        // Cari arsip surat berdasarkan ID
        $arsipSurat = ArsipSurat::findOrFail($id_surat);

        // Ambil semua kategori untuk dropdown kategori
        $kategori = CategoryModel::all();

        // Tampilkan view edit dengan data arsip dan kategori
        return view('editarsip', compact('arsipSurat', 'kategori'));
    }

    public function update(Request $request, $id_surat)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nomor_surat' => 'required|string|max:100',
            'id_kategori' => 'required|exists:categories,id_kategori', // Pastikan kategori ada
            'judul' => 'required|string|max:255',
            'file_pdf' => 'nullable|mimes:pdf|max:10240', // File PDF opsional
        ]);

        // Cari arsip surat berdasarkan ID
        $arsipSurat = ArsipSurat::findOrFail($id_surat);

        // Periksa apakah file PDF baru diunggah
        if ($request->hasFile('file_pdf')) {
            // Hapus file PDF lama jika ada
            if ($arsipSurat->file_pdf && file_exists(storage_path('app/public/' . $arsipSurat->file_pdf))) {
                unlink(storage_path('app/public/' . $arsipSurat->file_pdf));
            }

            // Simpan file PDF baru
            $originalName = $request->file('file_pdf')->getClientOriginalName();
            $uniqueIdentifier = pathinfo($originalName, PATHINFO_FILENAME) . '-' . time() . '.' . $request->file('file_pdf')->getClientOriginalExtension();
            $filePath = $request->file('file_pdf')->storeAs('arsip_surat', $uniqueIdentifier, 'public');

            // Perbarui path file PDF di database
            $arsipSurat->file_pdf = $filePath;
        }

        // Perbarui data lainnya
        $arsipSurat->nomor_surat = $validatedData['nomor_surat'];
        $arsipSurat->id_kategori = $validatedData['id_kategori'];
        $arsipSurat->judul = $validatedData['judul'];
        $arsipSurat->save();

        // Redirect dengan pesan sukses
        return redirect()->route('arsip.index')->with('success', 'Arsip surat berhasil diperbarui!');
    }
}
