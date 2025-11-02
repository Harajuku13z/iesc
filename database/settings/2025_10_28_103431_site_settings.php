<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Colors for site branding
        $this->migrator->add('site.primary_color', '#9e5a59');
        $this->migrator->add('site.secondary_color', '#000000');
    }
};
