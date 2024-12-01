@extends('layout.main')

@section('content')
<!-- cards -->
<div class="w-full px-6 py-6 mx-auto">
    <!-- Card Wrapper -->
    <div class="bg-gray-200 rounded-lg shadow-md p-6">
        <!-- Header -->
        <div class="mb-6 border-b border-gray-300">
            <h2 class="text-left text-xl font-semibold mb-2">Surat {{$arsipSurat->judul}}</h2>
            <div class="border-b-4"></div>
        </div>

        <p class="mt-3 text-sm text-gray-600">
            Nomor: {{ $arsipSurat->nomor_surat }}<br>
            Kategori: {{ $arsipSurat->kategori->nama_kategori ?? 'Tidak ada kategori' }}<br>
            Judul: {{ $arsipSurat->judul }}<br>
            Waktu Pengarsipan: {{ $arsipSurat->waktu_pengarsipan }}
        </p>

        <!-- Menampilkan PDF dalam iframe -->
        <div>
            <iframe src="{{ asset('storage/' . $arsipSurat->file_pdf) }}" width="100%" height="650px" frameborder="0"></iframe>
        </div>
        
        <div class="mb-4 flex space-x-4">
            <!-- Tombol Kembali -->
            <a href="{{ route('arsip.index') }}" class="px-4 py-2 text-white rounded-lg border-2 mt-2 shadow-soft-md bg-gray-500 hover:bg-gray-600">
                Kembali
            </a>

            <!-- Tombol Edit -->
            <a href="{{ route('arsip.edit', $arsipSurat->id_surat) }}" class="px-4 py-2 text-white rounded-lg border-2 mt-2 shadow-soft-md bg-yellow-500 hover:bg-yellow-600">
                Ubah
            </a>
        </div>

    </div>
</div>
<!-- end cards -->
@endsection