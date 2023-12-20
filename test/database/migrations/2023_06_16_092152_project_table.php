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
            $table->string('project_code')->comment('プロジェクトコード');
            $table->string('project_name')->comment('プロジェクト名');
            $table->integer('manager_code')->comment('担当者コード');
            $table->string('manager_name')->comment('担当者名');
            $table->unsignedBigInteger('trading_company_id')->nullable();
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
