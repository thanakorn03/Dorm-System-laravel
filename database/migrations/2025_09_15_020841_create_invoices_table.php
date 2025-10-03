<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('invoices', function (Blueprint $table) {
    $table->id();
    $table->foreignId('tenant_id')->constrained()->onDelete('cascade');
    $table->foreignId('room_id')->constrained()->onDelete('cascade'); // ✅ ต้องมี
    $table->decimal('amount', 10, 2);
    $table->date('due_date');
    $table->timestamps();
});
}


    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
