<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Buku
        </h2>
    </x-slot>

    <div class="py-4 px-6">
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label>Judul</label>
                <input type="text" name="title" class="w-full border p-2" value="{{ $book->title }}" required>
            </div>

            <div class="mb-4">
                <label>Penulis</label>
                <input type="text" name="author" class="w-full border p-2" value="{{ $book->author }}" required>
            </div>

            <div class="mb-4">
                <label>Penerbit</label>
                <input type="text" name="publisher" class="w-full border p-2" value="{{ $book->publisher }}">
            </div>

            <div class="mb-4">
                <label>Tahun</label>
                <input type="number" name="year" class="w-full border p-2" value="{{ $book->year }}">
            </div>

            <div class="mb-4">
                <label>Stok</label>
                <input type="number" name="stock" class="w-full border p-2" value="{{ $book->stock }}" required>
            </div>

            <div class="mb-4">
                <label>Deskripsi</label>
                <textarea name="description" class="w-full border p-2">{{ $book->description }}</textarea>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Perbarui</button>
        </form>
    </div>
</x-app-layout>
