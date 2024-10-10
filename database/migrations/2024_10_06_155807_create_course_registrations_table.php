<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_registrations', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'application_number')->unique();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('email')->unique();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string(column: 'gender')->nullable();

            $table->unsignedBigInteger('address_id')->unsigned()->index()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');

            $table->unsignedBigInteger('course_id')->unsigned()->index()->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

            $table->string('address_detail')->nullable();
            $table->string('application_status')->nullable();
            $table->string('application_update')->nullable();
            $table->boolean('default')->nullable();
            $table->string('description')->nullable();
            $table->string('edit_description')->nullable();

            // default
            $table->unsignedBigInteger('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_registrations');
    }
};
