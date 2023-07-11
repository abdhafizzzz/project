<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pemohon');
            $table->string('nokp');
            $table->text('alamat');
            $table->string('poskod');
            $table->unsignedBigInteger('daerah_id');
            $table->string('notel');
            $table->string('nohp')->nullable();
            $table->string('nokad');
            $table->integer('tahunpohon');
            $table->boolean('rd_daftar');
            $table->boolean('ch_musim')->nullable();
            $table->boolean('ch_musim2')->nullable();
            $table->date('tarikh');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('daerah_id')->references('id')->on('daerah');//->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar');
    }
}
