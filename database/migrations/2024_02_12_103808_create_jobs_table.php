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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('organization_unit');
            $table->string('sub_organization');
            $table->dateTime('date_fixed');
            $table->string('direct_manager');
            $table->text('description')->nullable();
            $table->string('time_in_minutes')->default(0);
            $table->string('time_in_hours')->default(0);
            $table->string('time')->nullable()->default(0);
            $table->string('group')->default(0);
            $table->string('rate')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
