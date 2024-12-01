@extends('layout.main')

@section('content')
<div class="w-full px-6 py-6 mx-auto">
    <div class="bg-gray-200 rounded-lg shadow-md p-6">
        <div class="mb-6 border-b border-gray-300">
            <h2 class="text-left text-xl font-semibold mb-2">Tambah Kategori Surat</h2>
            <div class="border-b-4"></div>
        </div>

        <p class="mt-3 text-sm text-gray-600">
            Silakan isi formulir di bawah untuk menambah kategori surat baru.
        </p>

        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf

            <!-- Input ID Kategori -->
            <div class="mb-4">
                <label for="id_kategori" class="block text-sm font-medium text-gray-600">ID Kategori</label>
                <input 
                    type="text" 
                    id="id_kategori" 
                    name="id_kategori" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" 
                    value="{{ $nextId }}" 
                    readonly>
            </div>

            <!-- Input Nama Kategori -->
            <div class="mb-4">
                <label for="nama_kategori" class="block text-sm font-medium text-gray-600">Nama Kategori</label>
                <input 
                    type="text" 
                    id="nama_kategori" 
                    name="nama_kategori" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg" 
                    required>
            </div>

            <!-- Input Keterangan -->
            <div class="mb-4">
                <label for="keterangan" class="block text-sm font-medium text-gray-600">Keterangan</label>
                <textarea 
                    id="keterangan" 
                    name="keterangan" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg" 
                    required></textarea>
            </div>

            <!-- Button Actions -->
            <div class="mb-4 flex space-x-4">
                <!-- Tombol Kembali -->
                <a href="{{ route('kategori.index') }}" class="px-4 py-2 text-white rounded-lg border-2 mt-2 shadow-soft-md bg-gray-500 hover:bg-gray-600">
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
