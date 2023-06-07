<?php

use App\Models\SoftwareCategory;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('software_experiences', function (Blueprint $table) {
            $table->id('softwareExperienceId');
            $table->string('saproId')->nullable();
            $table->string('level')->nullable();
            $table->text('softwareExperience')->nullable();
            $table->foreignIdFor(SoftwareCategory::class)->nullable()->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('software_experiences');
    }
};
