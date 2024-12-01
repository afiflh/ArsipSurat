@extends('layout.main')

@section('content')
<!-- cards -->
<div class="w-full px-6 py-6 mx-auto">
    <!-- Card Wrapper -->
    <div class="bg-gray-200 rounded-lg shadow-md p-6">
        <!-- Header -->
        <div class="mb-6 border-b border-gray-300">
            <h2 class="text-left text-xl font-semibold mb-2">ARSIP SURAT</h2>
            <div class="border-b-4"></div>
        </div>

        <!-- Subjudul -->
        <p class="mt-3 text-sm text-gray-600">
                Berikut beberapa surat yang telah terbit dan diarsipkan. <br>
                Klik <span class="font-semibold">Lihat</span> untuk melihat surat lebih detail.
        </p>

        <!-- Feedback Alert -->
        @if (session('success'))
        <div id="alert-success" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="ml-3 text-sm font-medium">{{ session('success') }}</span>
            <button type="button" class="ml-auto text-green-800 rounded-lg p-1.5 hover:bg-green-200 focus:outline-none" data-dismiss-target="#alert-success" aria-label="Close">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
        @endif

        @if (session('error'))
        <div id="alert-error" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="ml-3 text-sm font-medium">{{ session('error') }}</span>
            <button type="button" class="ml-auto text-red-800 rounded-lg p-1.5 hover:bg-red-200 focus:outline-none" data-dismiss-target="#alert-error" aria-label="Close">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
        @endif

        <div class="flex justify-center mb-4 items-center space-x-2">
            <!-- Input Search -->
            <form action="{{ route('arsip.index') }}" method="GET" class="w-full">
                <div class="flex justify-center items-center space-x-2">
                    <input type="text" name="search" class="w-1/3 px-4 py-2 border border-gray-300 rounded-lg" placeholder="Cari Surat" value="{{ request('search') }}">
                    <button type="submit" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-slate-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">
                        Cari
                    </button>
                </div>
            </form>
        </div>

        <!-- Tabel Surat -->
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b text-left">Nomor Surat</th>
                    <th class="px-4 py-2 border-b text-left">Kategori</th>
                    <th class="px-4 py-2 border-b text-left">Judul</th>
                    <th class="px-4 py-2 border-b text-left">Waktu Pengarsipan</th>
                    <th class="px-4 py-2 border-b text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Daftar Surat (Looping Data Surat) -->
                @forelse($arsipSurats as $arsip)
                <tr>
                <td class="px-4 py-2 border-b">{{ $arsip->nomor_surat }}</td>
                        <td class="px-4 py-2 border-b">{{ $arsip->kategori->nama_kategori ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border-b">{{ $arsip->judul }}</td>
                        <td class="px-4 py-2 border-b">{{ $arsip->waktu_pengarsipan->format('Y-m-d H:i:s') }}</td>
                    <td class="px-3 py-2 border-b">
                    <button data-modal-target="popup-modal-{{ $arsip->id_surat }}" data-modal-toggle="popup-modal-{{ $arsip->id_surat }}" class="inline-block px-2 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-red-600 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">
                        Hapus
                    </button>

                    <div id="popup-modal-{{ $arsip->id_surat }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{ $arsip->id_surat }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <h3 class="mb-5 text-sm font-semibold text-gray-500 dark:text-gray-400">
                                        Apakah Anda yakin ingin menghapus arsip surat ini?
                                    </h3>
                                    <!-- Form Hapus -->
                                    <form action="{{ route('arsip.destroy', $arsip->id_surat) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button style="background-color: #E02424;" type="submit" class="text-white font-medium rounded-lg text-sm px-5 py-2.5 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800">
                                            Ya, Hapus
                                        </button>
                                    </form>
                                    <button data-modal-hide="popup-modal-{{ $arsip->id_surat }}" style="background-color: #6B7280;" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-white bg-gray-600 hover:bg-gray-700 focus:outline-none rounded-lg">
                                        Tidak, Batal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('arsip.download', $arsip->id_surat) }}" method="get" style="display:inline;">
                        <button type="submit" style="background-color: yellow;" class="inline-block px-2 py-3 font-bold text-center text-black uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">
                            Unduh
                        </button>
                    </form>
                    <button type="button" style="background-color: blue;" class="inline-block px-2 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">
                        <a href="{{ route('arsip.viewPdf', $arsip->id_surat) }}" class="text-white">Lihat >>></a>
                    </button>
                </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-2 border-b text-center text-2xl text-gray-500">Data tidak ditemukan</td>
                </tr>
                @endforelse
                <!-- Tambahkan data surat lainnya di sini -->
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $arsipSurats->links() }}
        </div>

        <div class="mt-4">
        <a href="{{ route('arsip.create') }}" class="inline-block px-4 py-2 text-white rounded-lg border-2 shadow-xl shadow-soft-md" style="background-color: green;">
            Arsipkan Surat
        </a>
</div>
    </div>
</div>
<!-- end cards -->
@endsection
