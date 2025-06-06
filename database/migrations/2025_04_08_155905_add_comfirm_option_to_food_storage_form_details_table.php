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
        Schema::table('food_storage_form_details', function (Blueprint $table) {
            $table->foreignId('confirm_option')
                  ->nullable() // ถ้าต้องการให้ nullable
                  ->constrained('food_storage_types')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('food_storage_form_details', function (Blueprint $table) {
            //
            $table->dropForeign(['confirm_option']);
            $table->dropColumn('confirm_option');
        });
    }
};
