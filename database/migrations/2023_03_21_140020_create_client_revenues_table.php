<?php

use App\Models\User;
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
        Schema::create('client_revenues', function (Blueprint $table) {
            $table->id('clientRevenueId');
            $table->string('saproId')->nullable();
            $table->string('mainClient')->nullable();
            $table->string('revenue')->nullable();
            $table->string('sector')->nullable();
            $table->string('timeOnClient')->nullable();
            $table->boolean('approved')->nullable()->default(false);
            $table->string('approvedBy')->nullable();
            $table->foreign('saproId')->references('saproId')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_revenues');
    }
};
