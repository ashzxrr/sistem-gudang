<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    protected $model = \App\Models\Barang::class;

    public function definition()
    {
        return [
            'nama_barang' => $this->faker->word,
            'kode' => strtoupper($this->faker->bothify('BRG###')), // contoh format kode seperti BRG123
            'kategori' => $this->faker->randomElement(['Elektronik', 'Furnitur', 'Alat Tulis', 'Peralatan']),
            'lokasi' => $this->faker->randomElement(['Gudang A1', 'Gudang A2', 'Gudang A3']), // atau bisa pakai data lokasi yang lebih spesifik
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
