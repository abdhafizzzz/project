<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaerahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daerahList = [
            ['id' => 32, 'name' => 'Banggi'],
            ['id' => 17, 'name' => 'Beaufort'],
            ['id' => 8, 'name' => 'Beluran'],
            ['id' => 38, 'name' => 'Kemabong'],
            ['id' => 13, 'name' => 'Keningau'],
            ['id' => 9, 'name' => 'Kinabatangan'],
            ['id' => 3, 'name' => 'Kota Belud'],
            ['id' => 1, 'name' => 'Kota Kinabalu'],
            ['id' => 22, 'name' => 'Kota Marudu'],
            ['id' => 18, 'name' => 'Kuala Penyu'],
            ['id' => 5, 'name' => 'Kudat'],
            ['id' => 23, 'name' => 'Kunak'],
            ['id' => 11, 'name' => 'Lahad Datu'],
            ['id' => 36, 'name' => 'Matunggong'],
            ['id' => 35, 'name' => 'Membakut'],
            ['id' => 34, 'name' => 'Menumbok'],
            ['id' => 15, 'name' => 'Nabawan'],
            ['id' => 40, 'name' => 'Paitan'],
            ['id' => 2, 'name' => 'Papar'],
            ['id' => 21, 'name' => 'Penampang'],
            ['id' => 26, 'name' => 'Pitas'],
            ['id' => 39, 'name' => 'Putatan'],
            ['id' => 6, 'name' => 'Ranau'],
            ['id' => 7, 'name' => 'Sandakan'],
            ['id' => 12, 'name' => 'Semporna'],
            ['id' => 19, 'name' => 'Sipitang'],
            ['id' => 37, 'name' => 'Sook'],
            ['id' => 14, 'name' => 'Tambunan'],
            ['id' => 33, 'name' => 'Tamparuli'],
            ['id' => 10, 'name' => 'Tawau'],
            ['id' => 30, 'name' => 'Telupid'],
            ['id' => 16, 'name' => 'Tenom'],
            ['id' => 31, 'name' => 'Tongod'],
            ['id' => 4, 'name' => 'Tuaran'],
        ];

        foreach ($daerahList as $daerah) {
        DB::table('daerah')->insert([
            'id' => $daerah['id'],
            'name' => $daerah['name'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        }
    }
}
