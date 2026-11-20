<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Merek;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        $merek = Merek::all();
        return view('produk.index', compact('produk', 'merek'));
    }

    public function create()
    {
        $merek = Merek::all();
        return view('produk.create', compact('merek'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:150',
            'merek_id' => 'required|integer',
            'harga' => 'required|integer',
            'berat_gram' => 'required|integer',
            'panjang_cm' => 'required|integer',
            'lebar_cm' => 'required|integer',
            'tinggi_cm' => 'required|integer',
        ]);

        // Ambil nama merek berdasarkan merek_id untuk disimpan ke kolom 'merek'
        $merekData = Merek::findOrFail($request->merek_id);

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'merek' => $merekData->nama_merek,
            'harga' => $request->harga,
            'berat_gram' => $request->berat_gram,
            'panjang_cm' => $request->panjang_cm,
            'lebar_cm' => $request->lebar_cm,
            'tinggi_cm' => $request->tinggi_cm,
            'merek_id' => $request->merek_id,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $merek = Merek::all();
        return view('produk.edit', compact('produk', 'merek'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:150',
            'merek_id' => 'required|integer',
            'harga' => 'required|integer',
            'berat_gram' => 'required|integer',
            'panjang_cm' => 'required|integer',
            'lebar_cm' => 'required|integer',
            'tinggi_cm' => 'required|integer',
        ]);

        $merekData = Merek::findOrFail($request->merek_id);
        $produk = Produk::findOrFail($id);

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'merek' => $merekData->nama_merek,
            'harga' => $request->harga,
            'berat_gram' => $request->berat_gram,
            'panjang_cm' => $request->panjang_cm,
            'lebar_cm' => $request->lebar_cm,
            'tinggi_cm' => $request->tinggi_cm,
            'merek_id' => $request->merek_id,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}