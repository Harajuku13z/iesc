<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('admission_applications', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('id')->constrained()->nullOnDelete();
            $table->string('application_number')->unique()->after('user_id');
            $table->text('admin_notes')->nullable()->after('status');
            $table->timestamp('reviewed_at')->nullable()->after('admin_notes');
            $table->foreignId('reviewed_by')->nullable()->after('reviewed_at')->constrained('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('admission_applications', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['reviewed_by']);
            $table->dropColumn(['user_id', 'application_number', 'admin_notes', 'reviewed_at', 'reviewed_by']);
        });
    }
};

