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
        $this->table = 'kesiswaan';
    }
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->char('id_kesiswaan', '6')->autoincrement();
            $table->string('nama_kesiswaan ', '50')->nullable(false);

             // Foreign key untuk id_user
      $table
      ->foreign('id_user')
      ->references('id_user')
      ->on('user')
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
