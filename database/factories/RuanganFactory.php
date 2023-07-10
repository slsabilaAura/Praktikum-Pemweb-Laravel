<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Ruangan;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ruangan>
 */
class RuanganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Ruangan::class;
    public function definition(): array
    {
        $faker = Faker::create();
        return [
        'id_user' => 1,
        'nama_ruangan' => $faker->name,
        'deskripsi_ruangan' => $faker->paragraph,
        'luas_ruang' => $faker->randomNumber(2),
        'ruang_img' => $faker->image(public_path('images'), 640, 480, null, false),
        ];
    }
}
