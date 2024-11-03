<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    // Menambahkan mutasi baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'barang_id' => 'required|exists:barangs,id',
            'tanggal' => 'required|date',
            'jenis_mutasi' => 'required|string',
            'jumlah' => 'required|integer',
        ]);

        $mutasi = Mutasi::create($request->all());

        return response()->json($mutasi, 201);
    }

    // Menampilkan semua mutasi
    public function index()
    {
        $mutasis = Mutasi::all();
        return response()->json($mutasis);
    }

    // Menampilkan mutasi tertentu
    public function show($id)
    {
        $mutasi = Mutasi::findOrFail($id);
        return response()->json($mutasi);
    }

    // Memperbarui mutasi tertentu
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'barang_id' => 'sometimes|required|exists:barangs,id',
            'tanggal' => 'sometimes|required|date',
            'jenis_mutasi' => 'sometimes|required|string',
            'jumlah' => 'sometimes|required|integer',
        ]);

        $mutasi = Mutasi::findOrFail($id);
        $mutasi->update($request->all());

        return response()->json($mutasi);
    }

    // Menghapus mutasi tertentu
    public function destroy($id)
    {
        $mutasi = Mutasi::findOrFail($id);
        $mutasi->delete();

        return response()->json(['message' => 'Barang deleted successfully']);
    }

    // Menampilkan history mutasi untuk barang tertentu
    public function showHistoryForBarang($id)
    {
        $mutasis = Mutasi::where('barang_id', $id)->get();
        return response()->json($mutasis);
    }

    // Menampilkan history mutasi untuk user tertentu
    public function showHistoryForUser($id)
    {
        $mutasis = Mutasi::where('user_id', $id)->get();
        return response()->json($mutasis);
    }
}
