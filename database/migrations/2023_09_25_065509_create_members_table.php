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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number', 40);
            $table->string('password', 40);
            $table->string('name', 40);
            $table->string('email', 40);
            $table->string('profession', 40);
            $table->string('blood_group', 40);
            $table->date('hsc_year');
            $table->integer('hsc_roll');
            $table->string('hsc_board', 40);
            $table->string('hsc_institute_name', 40);
            $table->date('ssc_year');
            $table->integer('ssc_roll');
            $table->string('ssc_board', 40);
            $table->string('ssc_institute_name', 40);
            $table->string('present_address', 40);
            $table->string('permanent_address', 40);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
