<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PIC_Seminar>
 */
class PIC_SeminarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::pluck('id')->toArray(); 
        return[
            'id_user' => $this->faker->randomElement($userIds),
            'nama_seminar' => fake()->word(rand(8,15),true),
            'deskripi_seminar' => fake()->text(),
            'lokasi_seminar' => fake()->address(),
            'gmaps_seminar' => fake()->url(),
            'tanggal_seminar' => fake()->date(),
            'gratis_berbayar' => $this->faker->randomElement(['Gratis', 'Berbayar']),
            'vidcon_seminar' => fake()->url(),
            'tgl_pendaftaran_awal' => fake()->date(),
            'tgl_pendaftaran_akhir' => fake()->date(),
            'setup_tgl_unduh' => fake()->date(),
            'sertifikat' => fake()->image(),
            'poster' => fake()->image(),
            'status' => $this->faker->randomElement(['ACCEPTED'])
        ];
    }
}
