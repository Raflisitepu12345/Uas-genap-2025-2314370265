<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // Tampilkan semua member
    public function index()
    {
        $members = Member::all();
        return view('member.index', compact('members'));
    }

    // Tampilkan form tambah member
    public function create()
    {
        return view('member.create');
    }

    // Simpan data member baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
        ]);

        Member::create($validated);

        return redirect()->route('members.index')->with('success', 'Member berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit(Member $member)
    {
        return view('member.edit', compact('member'));
    }

    // Update data member
    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
        ]);

        $member->update($validated);

        return redirect()->route('members.index')->with('success', 'Data member berhasil diperbarui.');
    }

    // Hapus member
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member berhasil dihapus.');
    }
}
