<?php

use App\Models\ContractStatus;
use App\Models\SeniorityLevel;
use App\Models\Specialisation;
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
        Schema::create('fact_external_clients', function (Blueprint $table) {
            $table->id('externalClientId');
            $table->foreignIdFor(SeniorityLevel::class, 'seniorityLevelId')->nullable();
            $table->foreignIdFor(ContractStatus::class, 'contractStatusId')->nullable();
            $table->foreignIdFor(Specialisation::class, 'specialisationId')->nullable();
            $table->string('saproId')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('personalEmail')->nullable();
            $table->string('saproEmail')->nullable();
            $table->date('saproContractStartDate')->nullable();
            $table->date('saproContractEndDate')->nullable();
            $table->string('location')->nullable();
            $table->string('nationality')->nullable();
            $table->string('articleFirm')->nullable();
            $table->string('highestQualification')->nullable();
            $table->text('travel')->nullable();
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
        Schema::dropIfExists('fact_external_clients');
    }
};
