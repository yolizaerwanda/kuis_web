<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $beritas = Berita::latest()->get();
        return view('berita.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tanggal' => 'required|date',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'detail' => 'required',
        ]);

        $path = $request->file('foto')->store('foto-berita', 'public');

        Berita::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal,
            'foto' => $path,
            'detail' => $request->detail,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $berita = Berita::findOrFail($id);
    return view('user.show', compact('berita'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        //
        return view('berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $berita = Berita::findOrFail($id); 

        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tanggal' => 'required|date',
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048',
            'detail' => 'required',
        ]);

        $data = $request->only(['judul', 'penulis', 'tanggal', 'detail']);

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($berita->foto);
            $data['foto'] = $request->file('foto')->store('foto-berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $berita = Berita::findOrFail($id);
        Storage::disk('public')->delete($berita->foto);
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    /**
     * Display a listing of the news for users.
     */
    public function userIndex()
    {
        //
        $beritas = Berita::latest()->get();
        return view('user.index', compact('beritas'));
    }
}
