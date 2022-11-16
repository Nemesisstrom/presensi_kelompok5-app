<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
         //supaya terlindungi dan tidak dapat diakses tabel lain//
    protected $table;
         //untuk mempermudah supaya tidak perlu mengganti column 2 kali//
    public function __construct(){
        $this->table = 'kelas';
    }
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->char('id_kelas', '6')->autoincrement();
            $table->string('nama_kelas', '255')->nullable(false);
            $table->char('jumlah_siswa', '8')->nullable(false);
            $table->string('tingkatan', '4')->nullable(false);
            $table->text('lokasi', '')->nullable(false);

             // Foreign key untuk id_jurusan
      $table
      ->foreign('id_jurusan')
      ->references('id_jurusan')
      ->on('jurusan')
      ->cascadeOnUpdate()
      ->cascadeOnDelete();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
