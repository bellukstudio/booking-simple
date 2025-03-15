<x-layouts.app>

    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg mt-10">
        <h2 class="text-2xl font-semibold text-center mb-6 text-gray-800">Pembayaran Booking</h2>

        <div class="mb-4">
            <h3 class="font-medium text-gray-700">Detail Booking:</h3>
            <div class="mt-2 p-4 bg-gray-100 rounded-lg shadow-sm text-gray-700">
                <p><span class="font-medium">Paket:</span> {{ $booking->packet->name }}</p>
                <p><span class="font-medium">Jumlah Jam:</span> {{ $booking->qty }}</p>
                <p><span class="font-medium">Tanggal:</span> {{ date('d F Y', strtotime($booking->date_booking)) }}</p>
                <p><span class="font-medium">Total:</span> Rp {{ number_format($booking->total_price) }}</p>
            </div>
        </div>

        <button id="pay-button"
            class="w-full bg-red-700 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 transform hover:scale-105">
            Bayar Sekarang
        </button>
    </div>

    <!-- Midtrans Script -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('app.midtrans.clientKey') }}">
    </script>
    <script>
        document.getElementById('pay-button').onclick = function() {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    window.location.href = '{{ route('booking.success') }}';
                },
                onPending: function(result) {
                    alert("Menunggu pembayaran.");
                },
                onError: function(result) {
                    alert("Pembayaran gagal!");
                },
                onClose: function() {
                    alert("Pembayaran dibatalkan");
                }
            });
        };
    </script>

</x-layouts.app>
