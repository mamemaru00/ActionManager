<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('trading_company_id')->nullable();
            $table->foreign('trading_company_id')->references('id')->on('trading_companies');

            $table->string('project_code')->comment('プロジェクトコード');
            $table->string('project_name')->comment('プロジェクト名');
            $table->dateTime('sales_in_charge')->comment('納期');
            $table->string('order_amount')->comment('受注金額');
            $table->dateTime('order_date')->comment('受注日');
            $table->string('status')->comment('ステータス');

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
        Schema::dropIfExists('projects');
    }
}
