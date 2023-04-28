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
        Schema::create('firm_experiences', function (Blueprint $table) {
            $table->id('firmExperienceId');
            $table->string('saproId')->nullable();
            $table->date('startPeriod')->nullable();
            $table->date('endPeriod')->nullable();
            $table->string('level')->nullable();
            $table->string('company')->nullable();
            $table->string('country')->nullable();
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
        Schema::dropIfExists('firm_experiences');
    }
};
