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
        Schema::table('tax_refund_requests', function (Blueprint $table) {
            //
            $table->string('road')->nullable();
            $table->string('alley')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tax_refund_requests', function (Blueprint $table) {
            //
            $table->dropColumn('road');
            $table->dropColumn('alley');
        });
    }
};
