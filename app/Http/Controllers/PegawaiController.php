<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(Request $request)
{
    $query = Pegawai::query();

    // Filter by search query
    if ($request->has('search')) {
        $query->where('nama', 'like', '%' . $request->search . '%')
              ->orWhere('jabatan', 'like', '%' . $request->search . '%');
    }

    // Sorting
    if ($request->has('sort')) {
        $query->orderBy($request->sort, $request->order ?? 'asc');
    }

    $pegawai = $query->paginate(10);
    return view('pegawai.index', compact('pegawai'));
}

public function create()
{
    return view('pegawai.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
    ]);

    Pegawai::create($validated);
    return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan!');
}

}
