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
        Schema::create('schedulings', function (Blueprint $table) {
            $table->id('schedulingId');
            $table->string('saproId')->nullable();
            $table->date('year')->nullable();
            $table->string('bsHostFirmCode')->nullable();
            $table->date('bsStartDate')->nullable();
            $table->date('bsEndDate')->nullable();
            $table->string('postBsHostFirmCode')->nullable();
            $table->date('postBsStartDate')->nullable();
            $table->date('postBsEndDate')->nullable();
            $table->foreign('saproId')->references('saproId')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedulings');
    }
};
