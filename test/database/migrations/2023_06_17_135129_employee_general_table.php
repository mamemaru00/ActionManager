<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_general', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreignId('general_id');

            // 外部キー制約
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->constrained()
                ->onDelete('cascade');

            $table->foreign('general_id')
                ->references('id')
                ->on('generals')
                ->constrained()
                ->onDelete('cascade');    

            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_general');
    }
}
