<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('社員名');
            $table->integer('affiliation_office')->comment('所属事業所');
            $table->string('email')->comment('メールアドレス')->unique();
            $table->timestamp('email_verified_at')->comment('メールアドレス確認')->nullable();
            $table->string('password')->comment('パスワード');
            $table->rememberToken();

            
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
        // Schema::dropIfExists('user_office');
        Schema::dropIfExists('project_user');
        Schema::dropIfExists('users');
    }
}
