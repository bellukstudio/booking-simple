<div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md mt-10">
    @if (session()->has('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 mb-4">
            {{ session('error') }}
        </div>
    @endif

    <h2 class="text-2xl font-semibold text-center mb-6">Buat Booking</h2>

    <form wire:submit.prevent="submit">
        <div class="mb-4">
            <label for="packet_id" class="block text-gray-700 font-medium mb-1">Pilih Paket</label>
            <select wire:model="packet_id" id="packet_id"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Paket --</option>
                @foreach ($packets as $packet)
                    <option value="{{ $packet->id }}">{{ $packet->name }} - Rp {{ number_format($packet->price) }}
                    </option>
                @endforeach
            </select>
            @error('packet_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="qty" class="block text-gray-700 font-medium mb-1">Jumlah Jam</label>
            <input type="number" wire:model="qty" id="qty"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('qty')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="date_booking" class="block text-gray-700 font-medium mb-1">Tanggal Booking</label>
            <input type="date" wire:model="date_booking" id="date_booking"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('date_booking')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit"
            class="w-full bg-red-800 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
            Buat Booking dan Bayar
        </button>
    </form>
</div>
