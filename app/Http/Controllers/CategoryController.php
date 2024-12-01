<?php

namespace App\Http\Controllers;

  // Pastikan sudah ada model Category
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
{
    // Ambil query pencarian dari input
    $search = $request->input('search');

    // Filter kategori berdasarkan pencarian
    $categories = CategoryModel::when($search, function ($query, $search) {
        return $query->where('nama_kategori', 'like', '%' . $search . '%');
    })->paginate(5);

    // Mengirim data kategori ke view
    return view('kategori', compact('categories', 'search'));
}

    public function create()
{
    // Mendapatkan ID kategori terakhir
    $lastCategory = CategoryModel::latest('id_kategori')->first();
    $nextId = $lastCategory ? $lastCategory->id_kategori + 1 : 1;

    // Menampilkan form tambah kategori dengan nextId
    return view('tambahkategori', compact('nextId'));
}


    public function store(Request $request)
    {
        // Validasi input kategori
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:500',  // Tambahkan validasi untuk 'keterangan'
        ]);

        // Menyimpan data kategori baru ke database
        CategoryModel::create([
            'nama_kategori' => $request->input('nama_kategori'),
            'keterangan' => $request->input('keterangan'),  // Simpan keterangan
        ]);

        // Redirect kembali ke halaman kategori dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function destroy($id_kategori)
    {
        // Cari kategori berdasarkan ID
        $kategori = CategoryModel::findOrFail($id_kategori);

        // Hapus kategori
        $kategori->delete();

        // Redirect kembali ke halaman kategori dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }

    public function edit($id_kategori)
    {
        $kategori = CategoryModel::findOrFail($id_kategori);
        $nextId = CategoryModel::where('id_kategori', '>', $id_kategori)->min('id_kategori');
        return view('editkategori', compact('kategori', 'nextId'));
    }

    public function update(Request $request, $id_kategori)
    {
        // Validasi input kategori
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:500',  // Tambahkan validasi untuk 'keterangan'
        ]);

        // Cari kategori berdasarkan ID
        $kategori = CategoryModel::findOrFail($id_kategori);

        // Mengupdate data kategori
        $kategori->update([
            'nama_kategori' => $request->input('nama_kategori'),
            'keterangan' => $request->input('keterangan'),  // Update keterangan
        ]);

        // Redirect kembali ke halaman kategori dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

}
