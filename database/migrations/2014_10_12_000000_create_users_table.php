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
            $table->string('name');
            $table->string('prenoms')->nullable();
            $table->string('email')->unique();
            $table->string('telephone1')->nullable();
            $table->string('telephone2')->nullable();
            $table->string('adresse')->nullable();
            $table->string('cv')->nullable();
            $table->string('photo1')->nullable();
            $table->string('photo2')->nullable();
            $table->string('fonction')->nullable();
            $table->string('description')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
