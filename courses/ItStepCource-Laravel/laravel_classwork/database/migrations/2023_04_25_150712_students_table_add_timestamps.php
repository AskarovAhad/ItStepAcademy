<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StudentsTableAddTimestamps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Добавить created_at and updated_at , deleted_at TIMESTAMP
        Schema::table('students_table', function (Blueprint $table) {
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
        Schema::table('students_table', function (Blueprint $table) {
            $table->dropTimestamps();
            $table->dropSoftDeletes();
        });


    }
}
