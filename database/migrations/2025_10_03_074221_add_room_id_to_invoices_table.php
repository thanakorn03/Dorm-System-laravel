<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('invoices', function (Blueprint $table) {
        $table->foreignId('room_id')->after('tenant_id')->constrained()->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('invoices', function (Blueprint $table) {
        $table->dropForeign(['room_id']);
        $table->dropColumn('room_id');
    });
}

};
