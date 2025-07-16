<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Peminjaman
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('borrowings.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                + Tambah Peminjaman
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr class="text-left text-sm font-medium text-gray-700">
                        <th class="px-4 py-2">Member</th>
                        <th class="px-4 py-2">Buku</th>
                        <th class="px-4 py-2">Tanggal Pinjam</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-sm text-gray-800">
                    @forelse ($borrowings as $borrowing)
                        <tr>
                            <td class="px-4 py-2">{{ $borrowing->member->name }}</td>
                            <td class="px-4 py-2">{{ $borrowing->book->title }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($borrowing->borrowed_at)->format('d M Y') }}</td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('borrowings.edit', $borrowing->id) }}"
                                   class="text-yellow-600 hover:underline">Edit</a>

                                <form action="{{ route('borrowings.destroy', $borrowing->id) }}" method="POST" class="inline-block"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-4 text-center text-gray-500">Tidak ada data peminjaman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
