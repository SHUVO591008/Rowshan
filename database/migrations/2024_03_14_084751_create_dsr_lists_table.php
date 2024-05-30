<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDsrListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dsr_lists', function (Blueprint $table) {
            $table->id();
            $table->string('unique_code')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('mobile')->nullable();
            $table->string('nid_number')->nullable();
            $table->date('dob')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('gender')->nullable();
            $table->string('joining_date')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('religion')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->text('qualification')->nullable();
            $table->text('experience_details')->nullable();
            $table->string('total_experience')->nullable();
            $table->string('image')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_AC')->nullable();
            $table->string('AC_holder')->nullable();
            $table->text('about')->nullable();
            $table->text('documents')->nullable();
            $table->string('Pass_code')->nullable();
            $table->rememberToken();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('gurdian_mobile')->nullable();
            $table->string('gurdian_nid_number')->nullable();
            $table->string('gurdian_image')->nullable();
            $table->string('relationship')->nullable();
            $table->string('gurdian_documents')->nullable();
            $table->string('status')->comment('active,inactive')->nullable();
            $table->string('last_login')->nullable();
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
        Schema::dropIfExists('dsr_lists');
    }
}
