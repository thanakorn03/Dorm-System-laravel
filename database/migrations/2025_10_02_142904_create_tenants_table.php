<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->string('phone')->nullable();
    $table->foreignId('room_id')->nullable()->constrained()->onDelete('set null');
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
