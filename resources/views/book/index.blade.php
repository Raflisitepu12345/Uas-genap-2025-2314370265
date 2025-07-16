<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Buku
        </h2>
    </x-slot>

    <div class="py-4 px-6">
        <a href="{{ route('books.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Buku</a>

        @if (session('success'))
            <div class="text-green-600 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border text-sm">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-2 border">Judul</th>
                    <th class="p-2 border">Penulis</th>
                    <th class="p-2 border">Stok</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                    <tr>
                        <td class="p-2 border">{{ $book->title }}</td>
                        <td class="p-2 border">{{ $book->author }}</td>
                        <td class="p-2 border">{{ $book->stock }}</td>
                        <td class="p-2 border">
                            <a href="{{ route('books.edit', $book->id) }}" class="text-blue-500 mr-2">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="p-4 text-center">Belum ada data buku.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
