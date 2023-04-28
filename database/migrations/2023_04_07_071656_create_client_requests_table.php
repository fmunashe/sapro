<?php

use App\Enums\RequestStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('client_requests', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->enum('status', [RequestStatus::OPEN, RequestStatus::APPROVED, RequestStatus::CLOSED, RequestStatus::IN_REVIEW, RequestStatus::PROCESSING, RequestStatus::REJECTED, RequestStatus::PROCESSED])->default(RequestStatus::OPEN)->nullable();
            $table->date('periodStart')->nullable();
            $table->date('periodEnd')->nullable();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('created_by');
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_requests');
    }
};
