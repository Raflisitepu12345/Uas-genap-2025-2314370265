<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(10);
        return view('book.index', compact('books'));
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'stock' => 'required|integer',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit(Book $book)
    {
        return view('book.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'stock' => 'required|integer',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
}
