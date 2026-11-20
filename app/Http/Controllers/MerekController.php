<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merek;

class MerekController extends Controller
{
    public function index()
    {
        $merek = Merek::all();
        return view('merek.index', compact('merek'));
    }

    public function create()
    {
        return view('merek.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_merek' => 'required|string|max:255',
        ]);

        Merek::create([
            'nama_merek' => $request->nama_merek
        ]);

        return redirect()->route('merek.index')->with('success', 'Merek berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $merek = Merek::findOrFail($id);
        return view('merek.edit', compact('merek'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_merek' => 'required|string|max:255',
        ]);

        $merek = Merek::findOrFail($id);
        $merek->update([
            'nama_merek' => $request->nama_merek
        ]);

        return redirect()->route('merek.index')->with('success', 'Merek berhasil diupdate!');
    }

    public function destroy($id)
    {
        $merek = Merek::findOrFail($id);
        $merek->delete();

        return redirect()->route('merek.index')->with('success', 'Merek berhasil dihapus!');
    }
}

