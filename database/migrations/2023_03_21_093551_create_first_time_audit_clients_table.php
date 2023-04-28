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
        Schema::create('first_time_audit_clients', function (Blueprint $table) {
            $table->id('firstTimeAuditClientId');
            $table->string('saproId')->nullable();
            $table->string('firstTimeAuditClient')->nullable();
            $table->text('sector')->nullable();
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
        Schema::dropIfExists('first_time_audit_clients');
    }
};
