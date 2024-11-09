<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil query dari request, jika tidak ada maka nilai default adalah null
        $search = $request->query('search');

        // Jika ada parameter pencarian, lakukan pencarian
        $barangs = Barang::when($search, function ($query, $search) {
            return $query->where('nama_barang', 'like', '%' . $search . '%')
                         ->orWhere('kode', 'like', '%' . $search . '%')
                         ->orWhere('kategori', 'like', '%' . $search . '%');
        })->get();

        return response()->json($barangs);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode' => 'required|string|max:50|unique:barangs',
            'kategori' => 'required|string|max:100',
            'lokasi' => 'required|string|max:100',
        ]);

        $barang = Barang::create($validatedData);
        return response()->json($barang, 201);
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return response()->json($barang);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'sometimes|required|string|max:255',
            'kode' => 'sometimes|required|string|max:50|unique:barangs,kode,' . $id,
            'kategori' => 'sometimes|required|string|max:100',
            'lokasi' => 'sometimes|required|string|max:100',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($validatedData);
        return response()->json(['message' => 'Barang updated successfully']);
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return response()->json(['message' => 'Barang deleted successfully']);
    }
}
