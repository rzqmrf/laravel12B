<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    public function run(): void
    {
        $fields = [
            [
                'name' => 'Lapangan Futsal International',
                'type' => 'Futsal',
                'price' => 150000,
                'capacity' => 10,
                'status' => 'available',
                'description' => 'Lapangan futsal dengan standar internasional dan rumput sintetis berkualitas tinggi.',
            ],
            [
                'name' => 'Lapangan Futsal Standard',
                'type' => 'Futsal',
                'price' => 100000,
                'capacity' => 10,
                'status' => 'available',
                'description' => 'Lapangan futsal standar dengan fasilitas lengkap.',
            ],
            [
                'name' => 'Lapangan Badminton 1',
                'type' => 'Badminton',
                'price' => 50000,
                'capacity' => 4,
                'status' => 'available',
                'description' => 'Lapangan badminton dengan lantai kayu parket.',
            ],
            [
                'name' => 'Lapangan Badminton 2',
                'type' => 'Badminton',
                'price' => 50000,
                'capacity' => 4,
                'status' => 'available',
                'description' => 'Lapangan badminton dengan lantai vinyl standar BWF.',
            ],
            [
                'name' => 'Lapangan Basket',
                'type' => 'Basket',
                'price' => 200000,
                'capacity' => 12,
                'status' => 'available',
                'description' => 'Lapangan basket indoor dengan ring standar NBA.',
            ],
        ];

        foreach ($fields as $field) {
            Field::create($field);
        }
    }
}
