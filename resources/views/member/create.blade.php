<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Member
        </h2>
    </x-slot>

    <div class="py-4 px-6 max-w-3xl mx-auto">
        <form action="{{ route('members.store') }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700">Nama</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2" value="{{ old('name') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" value="{{ old('email') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Alamat</label>
                <textarea name="address" class="w-full border rounded px-3 py-2">{{ old('address') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">No. HP</label>
                <input type="text" name="phone" class="w-full border rounded px-3 py-2" value="{{ old('phone') }}">
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Simpan
                </button>
                <a href="{{ route('members.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
