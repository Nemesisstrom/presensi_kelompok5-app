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
     * 
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
            $table->char('id_user', '6')->autoincrement();
            $table->string('username', '255')->nullable(false);
            $table->string('password', '255')->nullable(false);

             // Foreign key untuk id_level
      $table
      ->foreign('id_level')
      ->references('id_level')
      ->on('level_user')
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
        Schema::dropIfExists('users');
    }
};
