<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Conservé pour compat, mais corrige le groupe vers 'site' si nécessaire
        if (! $this->migrator->has('site.primary_color')) {
            $this->migrator->add('site.primary_color', '#9e5a59');
        }
        if (! $this->migrator->has('site.secondary_color')) {
            $this->migrator->add('site.secondary_color', '#000000');
        }
    }
};
