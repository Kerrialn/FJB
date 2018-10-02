<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('first_name', 190);
            $table->string('last_name', 190);
            $table->string('email', 190)->unique();
            $table->string('phone', 190)->unique();
            $table->string('industry', 190)->nullable();
            $table->string('profession', 190)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('cv_path', 190)->nullable();
            $table->string('password', 190);
            $table->enum('account_type', ['candidate', 'company', 'admin'])->default('candidate');
            $table->rememberToken();
            $table->timestamps();
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
}
