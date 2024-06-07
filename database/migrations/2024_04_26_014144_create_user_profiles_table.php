<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name',25);
            $table->string('city',25);
            $table->string('state',25);
            $table->string('country',25);
            $table->string('street_address',25);
            $table->string('phone',25);
            $table->string('email',25);
            $table->string('skype_id',30);
            $table->string('profession',30);
            $table->date('date_of_birth');
            $table->string('profile_image',255);
            $table->string('profile_image_path',255);
            $table->enum('profile_type', ['student', 'parent'])->default('student');
            $table->string('profile_id',255);
            $table->softDeletes();
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
        Schema::dropIfExists('user_profiles');
    }
}
