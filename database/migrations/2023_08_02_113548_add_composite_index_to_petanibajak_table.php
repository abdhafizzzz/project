<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompositeIndexToPetanibajakTable extends Migration
{
    public function up()
    {
        Schema::table('petanibajak', function (Blueprint $table) {
            $table->index(['nokp', 'tahunpohon']);
        });
    }

    public function down()
    {
        Schema::table('petanibajak', function (Blueprint $table) {
            $table->dropIndex(['nokp', 'tahunpohon']);
        });
    }
}

