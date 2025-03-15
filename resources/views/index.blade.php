<x-layouts.app>
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-screen flex items-center justify-center text-center text-white"
        style="background-image: url('https://images.unsplash.com/photo-1618836958889-76f62f3724cb?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">

        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/30 via-transparent to-black/50 backdrop-brightness-75">
        </div>

        <!-- Content -->
        <div class="relative z-10 p-10 rounded-lg">
            <h1 class="text-4xl md:text-6xl font-bold drop-shadow-lg">
                Sewa PlayStation, Main Sepuasnya!
            </h1>
            <p class="mt-4 text-lg drop-shadow-md">
                Nikmati pengalaman bermain terbaik dengan harga terjangkau.
            </p>
            <a href="#booking"
                class="mt-6 inline-block px-6 py-3 bg-red-600 hover:bg-red-800 rounded-full text-white text-lg font-semibold shadow-lg">
                Booking Sekarang
            </a>
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="mt-6 inline-block px-6 py-3 bg-red-600 hover:bg-red-800 rounded-full text-white text-lg font-semibold shadow-lg">
                        Keluar
                    </button>
                </form>
            @endauth

        </div>
    </section>


    <!-- Fitur -->
    <section class="py-16 px-6 text-center">
        <h2 class="text-3xl font-bold">Kenapa Memilih Kami?</h2>
        <div class="grid md:grid-cols-2 gap-8 mt-8 justify-self-center">
            <div class="p-6 bg-white shadow-lg rounded-lg">
                <h3 class="text-xl font-semibold">PlayStation Terbaru</h3>
                <p class="mt-2 text-gray-600">Kami menyediakan PS5 dan PS4 dengan game terbaru.</p>
            </div>
            <div class="p-6 bg-white shadow-lg rounded-lg">
                <h3 class="text-xl font-semibold">Akses 24 Jam</h3>
                <p class="mt-2 text-gray-600">Buka setiap hari, booking kapan saja dengan mudah.</p>
            </div>
        </div>
    </section>

    <!-- Harga Paket -->
    <section id="booking" class="py-16 px-6 bg-gray-200 text-center">
        <h2 class="text-3xl font-bold">Pilih Paket Anda</h2>
        <div class="grid md:grid-cols-2 gap-8 mt-8">
            <!-- Paket PlayStation 4 -->
            <div class="p-6 bg-white shadow-lg rounded-lg">
                <h3 class="text-xl font-semibold">PlayStation 4</h3>
                <p class="mt-2 text-gray-600">Rp 30.000 per sesi</p>
                <p class="text-sm text-red-600">Tambahan Rp 50.000 untuk pemesanan di hari Sabtu/Minggu</p>

                @auth
                    <a href="{{ route('booking') }}" class="block mt-4 px-4 py-2 bg-red-800 text-white rounded-full">
                        Pesan Sekarang
                    </a>
                @else
                    <a href="{{ route('login') }}" class="block mt-4 px-4 py-2 bg-red-800 text-white rounded-full">
                        Login untuk Memesan
                    </a>
                @endauth
            </div>

            <!-- Paket PlayStation 5 -->
            <div class="p-6 bg-white shadow-lg rounded-lg">
                <h3 class="text-xl font-semibold">PlayStation 5</h3>
                <p class="mt-2 text-gray-600">Rp 40.000 per sesi</p>
                <p class="text-sm text-red-600">Tambahan Rp 50.000 untuk pemesanan di hari Sabtu/Minggu</p>

                @auth
                    <a href="{{ route('booking') }}" class="block mt-4 px-4 py-2 bg-red-800 text-white rounded-full">
                        Pesan Sekarang
                    </a>
                @else
                    <a href="{{ route('login') }}" class="block mt-4 px-4 py-2 bg-red-800 text-white rounded-full">
                        Login untuk Memesan
                    </a>
                @endauth
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 px-6 bg-red-800 text-white text-center">
        <h2 class="text-3xl font-bold">Siap Bermain?</h2>
        <p class="mt-4">Klik tombol di bawah untuk memesan sekarang.</p>
        <a href="#booking"
            class="mt-6 inline-block px-6 py-3 bg-white text-red-600 rounded-full text-lg font-semibold">Booking
            Sekarang</a>
    </section>
</x-layouts.app>
