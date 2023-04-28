<?php

use App\Enums\UserAvailability;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('availabilityStatus', [UserAvailability::AVAILABLE, UserAvailability::NOT_AVAILABLE, UserAvailability::PROFILE_UNDER_CONSIDERATION])->default(UserAvailability::AVAILABLE)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('availabilityStatus');
        });
    }
};
