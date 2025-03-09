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
            $table->string('slug')->unique()->index();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('created_by')->index();
            $table->string('banner_image')->nullable();
            $table->string('logo_image')->nullable();
            $table->date('event_date')->nullable()->index();
            $table->time('start_at')->nullable()->index();
            $table->integer('fee');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('participants', function(Blueprint $table){
            $table->id();
            $table->foreignId('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade')->index();
            $table->string('name');
            $table->string('email')->index();
            $table->string('contact')->index();
            $table->string('payment_id');
            $table->string('image_path')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
        Schema::dropIfExists('events');
    }
};
