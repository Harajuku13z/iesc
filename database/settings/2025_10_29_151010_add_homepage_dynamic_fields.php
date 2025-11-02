<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Homepage simple content
        $this->migrator->add('general.home_hero_subtitle', null);
        $this->migrator->add('general.home_about_image', null);
        
        // Avantages
        $this->migrator->add('general.advantage_1_title', null);
        $this->migrator->add('general.advantage_1_text', null);
        $this->migrator->add('general.advantage_2_title', null);
        $this->migrator->add('general.advantage_2_text', null);
        $this->migrator->add('general.advantage_3_title', null);
        $this->migrator->add('general.advantage_3_text', null);
        $this->migrator->add('general.advantage_4_title', null);
        $this->migrator->add('general.advantage_4_text', null);
        
        // Sections principales
        $this->migrator->add('general.home_section_subtitle_programs', null);
        $this->migrator->add('general.home_section_subtitle_events', null);
        
        // CTA
        $this->migrator->add('general.home_cta_title', null);
        $this->migrator->add('general.home_cta_subtitle', null);
        $this->migrator->add('general.home_cta_background_image', null);
        
        // Statistiques
        $this->migrator->add('general.stat_1_number', null);
        $this->migrator->add('general.stat_1_label', null);
        $this->migrator->add('general.stat_2_number', null);
        $this->migrator->add('general.stat_2_label', null);
        $this->migrator->add('general.stat_3_number', null);
        $this->migrator->add('general.stat_3_label', null);
        $this->migrator->add('general.stat_4_number', null);
        $this->migrator->add('general.stat_4_label', null);
    }
};
