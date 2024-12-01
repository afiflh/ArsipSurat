@extends('layout.main')

@section('content')
<div class="w-full px-6 py-6 mx-auto">
    <div class="bg-gray-200 rounded-lg shadow-md p-6">
        <div class="mb-2 border-b border-gray-300">
            <h2 class="text-left text-xl font-semibold mb-2">Tambah Arsip Surat</h2>
            <div class="border-b-4"></div>
        </div>

        <p class="text-sm text-gray-600">
            Unggah surat yang telah terbit pada form ini untuk diarsipkan. <br>
            Catatan: Gunakan file berformat PDF untuk mengunggah surat.
        </p>


        <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Input Nomor Surat -->
            <div class="mb-4">
                <label for="nomor_surat" class="block text-sm font-medium text-gray-600">Nomor Surat</label>
                <input 
                    type="text" 
                    id="nomor_surat" 
                    name="nomor_surat" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg" 
                    required>
            </div>

            <!-- Dropdown Kategori Surat -->
            <div class="mb-4">
                <label for="kategori_surat" class="block text-sm font-medium text-gray-600">Kategori Surat</label>
                <select 
                    id="id_kategori" 
                    name="id_kategori" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg" 
                    required>
                    <option value="" disabled selected hidden>Pilih Kategori</option>
                    @foreach($kategori as $k)
                        <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Input Judul Surat -->
            <div class="mb-4">
                <label for="judul_surat" class="block text-sm font-medium text-gray-600">Judul Surat</label>
                <input 
                    type="text" 
                    id="judul_surat" 
                    name="judul" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg" 
                    required>
            </div>

            <!-- Upload File PDF -->
            <div class="mb-4">
                <label for="file_pdf" class="block text-sm font-medium text-gray-600">File Surat (PDF)</label>
                <input 
                    type="file" 
                    id="file_pdf" 
                    name="file_pdf" 
                    accept=".pdf" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg" 
                    required>
            </div>

            <!-- Button Actions -->
            <div class="mb-4 flex space-x-4">
                <!-- Tombol Kembali -->
                <a href="{{ route('arsip.index') }}" class="px-4 py-2 text-white rounded-lg border-2 mt-2 shadow-soft-md bg-gray-500 hover:bg-gray-600">
                    Kembali
                </a>
                <!-- Tombol Simpan -->
                <button type="submit" style="background-color: green;" class="px-4 py-2 text-white rounded-lg border-2 mt-2 shadow-soft-md">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
