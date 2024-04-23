<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::disableForeignKeyConstraints();
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->unique();
            $table->integer('price_per_day');
            $table->enum('avalability', ['available', 'reserved', 'maintenance']);  
            $table->enum('carburant', ['diesel', 'fuel', 'electric', 'hybrid']);
            $table->unsignedBigInteger('carDetail_id');
            $table->foreign('carDetail_id')->references('id')->on('carDetails');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('operator_id');
            $table->foreign('operator_id')->references('id')->on('operators');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('cars');
    }
};

