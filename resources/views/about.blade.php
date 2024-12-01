@extends('layout.main')

@section('content')
<!-- cards -->
<div class="w-full px-6 py-6 mx-auto">
    <!-- Card Wrapper -->
    <div class="bg-gray-200 rounded-lg shadow-md p-6">
        <!-- Header -->
        <div class="mb-6 border-b border-gray-300">
            <h2 class="text-left text-xl font-semibold">TENTANG APLIKASI</h2>
            <div class="border-b-4 w-full"></div>
        </div>

        <!-- About Section -->
        <div class="flex items-center space-x-4">
            <!-- Foto -->
            <img src="img/IMG_0224.jpg" alt="Foto" class="rounded-full object-cover w-44 h-44">

            <!-- Informasi -->
            <div class="space-y-1">
                <p class="text-lg font-semibold grid grid-cols-2 gap-4">
                    <span class="ml-3">Web ini dibuat oleh:</span>
                </p>
                <div class="text-lg grid grid-cols-2 gap-4 ml-3">
                    <span>Nama</span>
                    <span>: Afif Lukmanul Hakim</span>
                    <span>Prodi</span>
                    <span>: Teknik Informatika</span>
                    <span>NIM</span>
                    <span>: 2141720262</span>
                    <span>Tanggal</span>
                    <span>: 29 November 2024</span>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- end cards -->
@endsection
