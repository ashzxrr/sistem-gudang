<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Barang;

class MutasiFactory extends Factory
{
    protected $model = \App\Models\Mutasi::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,      // mengambil id acak dari tabel users
            'barang_id' => Barang::inRandomOrder()->first()->id,  // mengambil id acak dari tabel barangs
            'tanggal' => now()->startOfYear()->addMonths($this->faker->numberBetween(0, 11))->addDays($this->faker->numberBetween(0, 27)),
            'jenis_mutasi' => $this->faker->randomElement(['Keluar', 'Masuk']),
            'jumlah' => $this->faker->numberBetween(1, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
