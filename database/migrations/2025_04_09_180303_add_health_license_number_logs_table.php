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
        Schema::create('health_license_number_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('health_license_id')->constrained('health_license_apps')->onDelete('cascade');
            $table->text('number')->nullable();
            $table->text('book')->nullable();
            $table->text('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('health_license_number_logs', function (Blueprint $table) {
            //
            $table->dropColumn('health_license_number_logs');
        });
    }
};
