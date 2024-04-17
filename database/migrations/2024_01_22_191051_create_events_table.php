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
        Schema::create('events', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('description');
            $table->integer('customer_id');
            $table->integer('location_id');
            $table->date('hire_date');
            $table->string('status');
            $table->integer('budget_used');
            $table->string('notes');
            $table->date('event_date');
            $table->integer('attendance');
            $table->string('feedback');
            $table->date('completion_date');
            $table->integer('organizer_id');    
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
