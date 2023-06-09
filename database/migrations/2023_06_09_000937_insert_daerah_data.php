<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $daerahList = [
            'Banggi' => 32,
            'Beaufort' => 17,
            'Beluran' => 8,
            'Kemabong' => 38,
            'Keningau' => 13,
            'Kinabatangan' => 9,
            'Kota Belud' => 3,
            'Kota Kinabalu' => 1,
            'Kota Marudu' => 22,
            'Kuala Penyu' => 18,
            'Kudat' => 5,
            'Kunak' => 23,
            'Lahad Datu' => 11,
            'Matunggong' => 36,
            'Membakut' => 35,
            'Menumbok' => 34,
            'Nabawan' => 15,
            'Paitan' => 40,
            'Papar' => 2,
            'Penampang' => 21,
            'Pitas' => 26,
            'Putatan' => 39,
            'Ranau' => 6,
            'Sandakan' => 7,
            'Semporna' => 12,
            'Sipitang' => 19,
            'Sook' => 37,
            'Tambunan' => 14,
            'Tamparuli' => 33,
            'Tawau' => 10,
            'Telupid' => 30,
            'Tenom' => 16,
            'Tongod' => 31,
            'Tuaran' => 4,
        ];

        foreach ($daerahList as $name => $value) {
            DB::table('daerah')->insert([
                'name' => $name,
                'value' => $value,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daerah', function (Blueprint $table) {
            //
        });
    }
};
