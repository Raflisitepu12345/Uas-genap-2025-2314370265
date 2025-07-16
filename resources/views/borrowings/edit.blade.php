<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Peminjaman
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('borrowings.update', $borrowing->id) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div>
                <label for="member_id" class="block font-medium text-sm text-gray-700">Nama Member</label>
                <select name="member_id" id="member_id" class="form-select w-full mt-1 rounded border-gray-300" required>
                    <option value="">-- Pilih Member --</option>
                    @foreach ($members as $member)
                        <option value="{{ $member->id }}" {{ $borrowing->member_id == $member->id ? 'selected' : '' }}>
                            {{ $member->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="book_id" class="block font-medium text-sm text-gray-700">Judul Buku</label>
                <select name="book_id" id="book_id" class="form-select w-full mt-1 rounded border-gray-300" required>
                    <option value="">-- Pilih Buku --</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}" {{ $borrowing->book_id == $book->id ? 'selected' : '' }}>
                            {{ $book->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="borrowed_at" class="block font-medium text-sm text-gray-700">Tanggal Pinjam</label>
                <input type="date" name="borrowed_at" id="borrowed_at" value="{{ $borrowing->borrowed_at->format('Y-m-d') }}"
                    class="form-input w-full mt-1 rounded border-gray-300" required>
            </div>

            <div class="flex space-x-2">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
                <a href="{{ route('borrowings.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
