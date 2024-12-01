<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Surat</title>
    <link rel="icon" href="{{ asset('img/logoarsip.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-green-100 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-green-600 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="flex items-center space-x-3">
                <img src="{{ asset('img/logoarsip.png') }}" alt="BrandLogo" class="h-24">
                <span class="text-white text-2xl font-bold">Arsip Surat</span>
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-green-500 text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl font-bold mb-3">Selamat Datang di Halaman Arsip Surat</h1>
            <h2 class="text-2xl font-semibold mb-5">Desa Karangduren, Kecamatan Pakisaji</h2>
            <p class="text-lg mb-8">Kelola Arsip Surat dengan Mudah, Cepat, dan Terorganisir.</p>
            <a href="/login" class="bg-white text-green-600 font-semibold py-3 px-8 rounded-md hover:bg-green-100 transition duration-300">Get Started</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-8 justify-items-center">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <div class="mb-4">
                    <img src="img/arsipsurat.png" alt="Feature 2" class="mx-auto mb-4 w-24 h-20">
                </div>
                <h3 class="text-xl font-semibold text-green-600 mb-2">Mudah Melihat Surat Arsip</h3>
                <p>Akses dan telusuri semua arsip surat yang disimpan dengan aman di sistem.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <div class="mb-4">
                    <img src="img/kategori.png" alt="Feature 3" class="mx-auto mb-4 w-20 h-20">
                </div>
                <h3 class="text-xl font-semibold text-green-600 mb-2">Mengkategorikan Surat</h3>
                <p>Kategorikan dan atur surat dengan mudah ke dalam kategori berbeda untuk pengelolaan yang lebih baik.</p>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="bg-green-700 text-white py-8">
        <div class="container mx-auto px-6 text-center">
            <p class="text-sm">&copy; 2024 Landing Page Archive Letter. Desa Karangduren, Kecamatan Pakisaji.</p>
            <div class="mt-4 space-x-4">
                <a href="#" class="text-white hover:text-green-200">Privacy Policy</a>
                <a href="#" class="text-white hover:text-green-200">Terms of Service</a>
            </div>
        </div>
    </footer>

</body>
</html>
