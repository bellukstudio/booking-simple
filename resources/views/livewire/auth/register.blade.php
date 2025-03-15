    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md mt-20">
        <h2 class="text-2xl font-semibold mb-4 text-center">Register</h2>

        <form wire:submit.prevent="register">
            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" wire:model="name"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" wire:model="email"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Password</label>
                <input type="password" wire:model="password"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Confirm Password</label>
                <input type="password" wire:model="password_confirmation"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
            </div>

            <button type="submit" class="w-full  bg-red-800 text-white py-2 rounded-md hover:bg-red-600">
                Register
            </button>
        </form>

        <p class="mt-4 text-center text-gray-600">
            Already have an account? <a href="{{ route('login') }}" class="text-red-600">Login</a>
        </p>
    </div>
