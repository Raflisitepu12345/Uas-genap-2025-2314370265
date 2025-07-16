<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['member', 'book'])->get();
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $members = Member::all();
        $books = Book::all();
        return view('borrowings.create', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
            'book_id' => 'required',
            'borrowed_at' => 'required|date',
        ]);

        Borrowing::create($request->all());

        return redirect()->route('borrowings.index')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    public function edit(Borrowing $borrowing)
    {
        $members = Member::all();
        $books = Book::all();
        return view('borrowings.edit', compact('borrowing', 'members', 'books'));
    }

    public function update(Request $request, Borrowing $borrowing)
    {
        $request->validate([
            'member_id' => 'required',
            'book_id' => 'required',
            'borrowed_at' => 'required|date',
        ]);

        $borrowing->update($request->all());

        return redirect()->route('borrowings.index')->with('success', 'Peminjaman berhasil diperbarui.');
    }

    public function destroy(Borrowing $borrowing)
    {
        $borrowing->delete();
        return redirect()->route('borrowings.index')->with('success', 'Peminjaman berhasil dihapus.');
    }
}
