<?php

use App\Enums\UserTypeEnum;
use App\Models\ContractStatus;
use App\Models\SeniorityLevel;
use App\Models\Specialisation;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SeniorityLevel::class, 'seniorityLevelId')->nullable();
            $table->foreignIdFor(ContractStatus::class, 'contractStatusId')->nullable();
            $table->foreignIdFor(Specialisation::class, 'specialisationId')->nullable();
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('email')->unique();
            $table->string('saproEmail')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable()->default(now());
            $table->string('password');
            $table->string('saproId')->unique()->nullable();
            $table->enum('type',[UserTypeEnum::SUPER_ADMIN,UserTypeEnum::ADMIN,UserTypeEnum::USER,UserTypeEnum::CLIENT,UserTypeEnum::REPORTING])->default(UserTypeEnum::CLIENT)->nullable();
            $table->date('saproContractStartDate')->nullable();
            $table->date('saproContractEndDate')->nullable();
            $table->string('location')->nullable();
            $table->string('nationality')->nullable();
            $table->string('articleFirm')->nullable();
            $table->string('highestQualification')->nullable();
            $table->text('travel')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
