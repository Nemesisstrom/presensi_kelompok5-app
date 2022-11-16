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
        $this->table = 'user';
    }
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->char('id_jurusan', '3')->autoincrement();
            $table->string('nama_jurusan', '50')->nullable(false);
            $table->string('singkatan_jurusan', '10')->nullable(false);
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
