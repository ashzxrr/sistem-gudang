<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();  // Mengambil semua user
        return response()->json($users); // Mengembalikan data dalam format JSON
    }

    public function store(Request $request)
    {
        \Log::info('Request data:', $request->all());
         // Validasi data yang diterima
         $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Hash password sebelum menyimpannya
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Simpan user ke database
        User::create($validatedData);

        return response()->json(['message' => 'User created successfully'], 201);
    }
    public function show(User $user)
    {
        return $user; // Menampilkan user berdasarkan id
    }

    public function update(Request $request, $id)
    {
    // Validasi input
    $validatedData = $request->validate([
        'nama' => 'sometimes|required|string|max:255',
        'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
        'password' => 'sometimes|required|string|min:8',
    ]);

    // Temukan pengguna berdasarkan I   D
    $user = User::findOrFail($id);

    // Jika password disertakan, hash password baru
    if (isset($validatedData['password'])) {
        $validatedData['password'] = Hash::make($validatedData['password']);
    }

    // Update pengguna
    $user->update($validatedData);

    return response()->json(['message' => 'User updated successfully']);
    }


    public function destroy($id)
    {
        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);
    
        // Hapus pengguna
        $user->delete();
    
        return response()->json(['message' => 'User deleted successfully']);
    }
    
}
