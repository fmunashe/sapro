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
        Schema::create('international_experiences', function (Blueprint $table) {
            $table->id('internationalExperienceId');
            $table->string('saproId')->nullable();
            $table->date('startPeriod');
            $table->date('endPeriod');
            $table->string('city');
            $table->string('country');
            $table->text('sector');
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
        Schema::dropIfExists('international_experiences');
    }
};
