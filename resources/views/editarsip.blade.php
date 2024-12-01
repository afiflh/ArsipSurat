@extends('layout.main')

@section('content')
<div class="w-full px-6 py-6 mx-auto">
    <div class="bg-gray-200 rounded-lg shadow-md p-6">
        <div class="mb-6 border-b border-gray-300">
            <h2 class="text-left text-xl font-semibold mb-2">Edit Kategori Surat</h2>
            <div class="border-b-4"></div>
        </div>

        <p class="mt-3 text-sm text-gray-600">
            Silakan ubah formulir di bawah untuk mengedit kategori surat.
        </p>

        <form action="{{ route('arsip.update', $arsipSurat->id_surat) }}" method="POST" enctype="multipart/form-data" class="w-full bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nomor_surat" class="block text-gray-700 font-semibold mb-2">Nomor Surat</label>
                <input type="text" name="nomor_surat" id="nomor_surat" value="{{ old('nomor_surat', $arsipSurat->nomor_surat) }}" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="id_kategori" class="block text-gray-700 font-semibold mb-2">Kategori</label>
                <select name="id_kategori" id="id_kategori" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id_kategori }}" {{ $item->id_kategori == $arsipSurat->id_kategori ? 'selected' : '' }}>
                            {{ $item->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="judul" class="block text-gray-700 font-semibold mb-2">Judul</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $arsipSurat->judul) }}" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="file_pdf" class="block text-gray-700 font-semibold mb-2">File PDF (Opsional)</label>
                <input type="file" name="file_pdf" id="file_pdf" accept="application/pdf" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @if ($arsipSurat->file_pdf)
                    <p class="text-sm text-gray-500 mt-2">File saat ini: 
                        <a href="{{ asset('storage/' . $arsipSurat->file_pdf) }}" target="_blank" class="text-blue-500 hover:underline">
                            {{ basename($arsipSurat->file_pdf) }}
                        </a>
                    </p>
                @endif
            </div>
            <div class="flex justify-start space-x-4">
                <a style="background-color: rgb(107 114 128);" href="{{ route('arsip.index') }}" class="px-4 py-2 text-white rounded-lg">
                    Kembali
                </a>
                <button style="background-color: rgb(34 197 94);" type="submit" class="px-4 py-2 text-white rounded-lg">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
