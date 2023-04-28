<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('audited_works', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('revenueId');
            $table->text('auditWorkPerformed');
            $table->foreign('revenueId')->references('clientRevenueId')->on('client_revenues')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audited_works');
    }
};
