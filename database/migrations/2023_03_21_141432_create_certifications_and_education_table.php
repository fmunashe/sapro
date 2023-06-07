<?php

use App\Models\QualificationCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('certifications_and_education', function (Blueprint $table) {
            $table->id('certificationsAndEducationId');
            $table->string('saproId')->nullable();
            $table->text('institute')->nullable();
            $table->text('certificationsAndEducation')->nullable();
            $table->foreignIdFor(QualificationCategory::class)->nullable()->constrained()->onDelete('cascade');
            $table->text('certificateName')->nullable();
            $table->text('certificatePath')->nullable();
            $table->boolean('approved')->nullable()->default(false);
            $table->string('approvedBy')->nullable();
            $table->date('year')->nullable();
            $table->foreign('saproId')->references('saproId')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certifications_and_education');
    }
};
