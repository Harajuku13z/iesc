<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Identité
        $this->migrator->add('site.site_name', 'IESC Université');
        $this->migrator->add('site.site_description', null);

        // Contacts
        $this->migrator->add('site.contact_email', null);
        $this->migrator->add('site.contact_phone', null);
        $this->migrator->add('site.contact_address', null);

        // Réseaux sociaux
        $this->migrator->add('site.social_facebook_url', null);
        $this->migrator->add('site.social_linkedin_url', null);
        $this->migrator->add('site.social_instagram_url', null);
        $this->migrator->add('site.social_twitter_url', null);

        // Pied de page
        $this->migrator->add('site.footer_description', null);

        // Couleurs (défaut demandé)
        $this->migrator->add('site.primary_color', '#9e5a59');
        $this->migrator->add('site.secondary_color', '#000000');

        // Médias
        $this->migrator->add('site.site_logo_path', null);
        $this->migrator->add('site.site_favicon_path', null);

        // Accueil - Héro
        $this->migrator->add('site.home_hero_image', null);
        $this->migrator->add('site.home_hero_title', null);
        $this->migrator->add('site.home_hero_subtitle', null);

        // Accueil - À propos
        $this->migrator->add('site.home_about_title', null);
        $this->migrator->add('site.home_about_text', null);
        $this->migrator->add('site.home_about_image', null);

        // Accueil - Avantages
        $this->migrator->add('site.advantage_1_title', null);
        $this->migrator->add('site.advantage_1_text', null);
        $this->migrator->add('site.advantage_2_title', null);
        $this->migrator->add('site.advantage_2_text', null);
        $this->migrator->add('site.advantage_3_title', null);
        $this->migrator->add('site.advantage_3_text', null);
        $this->migrator->add('site.advantage_4_title', null);
        $this->migrator->add('site.advantage_4_text', null);

        // Accueil - Sections
        $this->migrator->add('site.home_section_title_programs', null);
        $this->migrator->add('site.home_section_subtitle_programs', null);
        $this->migrator->add('site.home_section_title_events', null);
        $this->migrator->add('site.home_section_subtitle_events', null);

        // Accueil - CTA
        $this->migrator->add('site.home_cta_title', null);
        $this->migrator->add('site.home_cta_subtitle', null);
        $this->migrator->add('site.home_cta_background_image', null);

        // Accueil - Statistiques
        $this->migrator->add('site.stat_1_number', null);
        $this->migrator->add('site.stat_1_label', null);
        $this->migrator->add('site.stat_2_number', null);
        $this->migrator->add('site.stat_2_label', null);
        $this->migrator->add('site.stat_3_number', null);
        $this->migrator->add('site.stat_3_label', null);
        $this->migrator->add('site.stat_4_number', null);
        $this->migrator->add('site.stat_4_label', null);
    }
};





