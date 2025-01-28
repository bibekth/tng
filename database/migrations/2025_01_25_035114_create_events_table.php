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
            $table->id();
            $table->string('name')->unique()->nullable();
            $table->string('title')->unique()->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->string('banner_image')->nullable();
            $table->string('logo_image')->nullable();
            $table->date('event_date')->nullable();
            $table->time('start_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
