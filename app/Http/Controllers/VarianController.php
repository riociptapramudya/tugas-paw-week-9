<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Varian;
use App\Models\Produk;
use App\Models\Merek;

class VarianController extends Controller
{
    public function index()
    {
        $varian = Varian::all();
        $merek = Merek::all();
        return view('varian.index', compact('varian', 'merek'));
    }

    public function create()
    {
        $produk = Produk::all();
        return view('varian.create', compact('produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|integer',
            'warna' => 'required|string|max:50',
            'ukuran' => 'required|string|max:20',
            'stok' => 'required|integer',
        ]);

        Varian::create([
            'produk_id' => $request->produk_id,
            'warna' => $request->warna,
            'ukuran' => $request->ukuran,
            'stok' => $request->stok,
        ]);

        return redirect()->route('varian.index')->with('success', 'Varian berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $varian = Varian::findOrFail($id);
        $varian->delete();

        return redirect()->route('varian.index')->with('success', 'Varian berhasil dihapus!');
    }
}