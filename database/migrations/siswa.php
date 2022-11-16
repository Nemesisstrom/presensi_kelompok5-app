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
        $this->table = 'siswa';
    }
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->string('nis', '15')->autoincrement();
            $table->string('nama_siswa', '255')->nullable(false);
            $table->string('jk_siswa', '10')->nullable(false);

             // Foreign key untuk id_kelas
      $table
      ->foreign('id_kelas')
      ->references('id_kelas')
      ->on('kelas')
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
