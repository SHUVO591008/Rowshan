<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_credentials', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('user_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('password')->nullable();
            $table->BigInteger('role_id')->nullable();
            $table->string('status')->comment('active,inactive')->nullable();
            $table->string('last_login')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('login_credentials');
    }
}
