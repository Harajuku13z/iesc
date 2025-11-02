<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Homepage simple fields
        $this->migrator->add('general.home_hero_image', null);
        $this->migrator->add('general.home_hero_title', null);
        $this->migrator->add('general.home_section_title_programs', null);
        $this->migrator->add('general.home_section_title_events', null);
        $this->migrator->add('general.home_about_title', null);
        $this->migrator->add('general.home_about_text', null);
    }
};
