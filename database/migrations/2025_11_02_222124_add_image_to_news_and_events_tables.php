<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('image')->nullable()->after('slug');
        });
        
        Schema::table('events', function (Blueprint $table) {
            $table->string('image')->nullable()->after('slug');
        });
        
        Schema::table('programs', function (Blueprint $table) {
            if (!Schema::hasColumn('programs', 'image')) {
                $table->string('image')->nullable()->after('slug');
            }
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('image');
        });
        
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('image');
        });
        
        Schema::table('programs', function (Blueprint $table) {
            if (Schema::hasColumn('programs', 'image')) {
                $table->dropColumn('image');
            }
        });
    }
};
