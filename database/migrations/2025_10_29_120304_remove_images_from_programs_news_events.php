<?php

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
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn(['image', 'gallery']);
        });

        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn(['image', 'gallery']);
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['image', 'gallery']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->string('image')->nullable()->after('description');
            $table->json('gallery')->nullable()->after('image');
        });

        Schema::table('news', function (Blueprint $table) {
            $table->string('image')->nullable()->after('content');
            $table->json('gallery')->nullable()->after('image');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->string('image')->nullable()->after('description');
            $table->json('gallery')->nullable()->after('image');
        });
    }
};
