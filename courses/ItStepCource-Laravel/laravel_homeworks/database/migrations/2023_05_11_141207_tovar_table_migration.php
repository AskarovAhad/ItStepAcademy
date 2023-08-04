<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TovarTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tovar_table', function(Blueprint $table){
            $table->id();
            $table->string('tovar_name', 50);
            $table->integer('tovar_kod');
            $table->string('tovar_unit', 10);
            $table->integer('tovar_price');
            $table->integer('sklad_id');
            $table->string('ovar_info', 255);
            $table->timestamps();  // created_at and updated_at
            $table->softDeletes(); // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Удалить  created_at and updated_at , deleted_at TIMESTAMP
        Schema::table('tovar_table', function (Blueprint $table) {
            $table->dropIfExists('tovar_table');
        });

    }
}
