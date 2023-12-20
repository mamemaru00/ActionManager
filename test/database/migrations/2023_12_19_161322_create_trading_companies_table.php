<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradingCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trading_companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->nullable(); // プロジェクトIDのカラムを追加
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade')->comment('プロジェクトid'); // 外部キー制約の修正
            
            $table->string('trading_company_name')->comment('取引会社名');
            $table->string('trading_company_manager_name')->comment('取引先担当者名');
            $table->unsignedBigInteger('trading_company_tel')->comment('取引先電話番号');

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
        Schema::dropIfExists('trading_companies');
    }
}
