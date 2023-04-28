<?php

use App\Enums\RequestStatus;
use App\Models\ClientRequest;
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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ClientRequest::class)->constrained()->onDelete('cascade');
            $table->enum('status', [RequestStatus::OPEN, RequestStatus::APPROVED, RequestStatus::CLOSED, RequestStatus::IN_REVIEW, RequestStatus::PROCESSING, RequestStatus::REJECTED, RequestStatus::PROCESSED])->default(RequestStatus::IN_REVIEW)->nullable();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
