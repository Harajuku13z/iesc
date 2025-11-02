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
        Schema::table('homepage_sections', function (Blueprint $table) {
            $table->string('name')->default('Section')->after('id');
            $table->string('title')->nullable()->after('name');
            $table->text('subtitle')->nullable()->after('title');
            $table->string('image')->nullable()->after('content');
            $table->string('background_color')->nullable()->after('image');
            $table->string('text_color')->nullable()->after('background_color');
            $table->json('settings')->nullable()->after('text_color');
            $table->boolean('is_active')->default(true)->after('settings');
            $table->integer('sort_order')->default(0)->after('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homepage_sections', function (Blueprint $table) {
            $table->dropColumn([
                'name', 'title', 'subtitle', 'image', 
                'background_color', 'text_color', 'settings', 
                'is_active', 'sort_order'
            ]);
        });
    }
};
