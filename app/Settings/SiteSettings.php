<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{
    public ?string $site_name = null;
    public ?string $site_description = null;

    public ?string $contact_email = null;
    public ?string $contact_phone = null;
    public ?string $contact_address = null;

    public ?string $social_facebook_url = null;
    public ?string $social_linkedin_url = null;
    public ?string $social_instagram_url = null;
    public ?string $social_twitter_url = null;

    public ?string $footer_description = null;

    public ?string $primary_color = null;
    public ?string $secondary_color = null;

    public ?string $site_logo_path = null;
    public ?string $site_favicon_path = null;

    // Homepage fields (non-bloquants si absents)
    public ?string $home_hero_image = null;
    public ?string $home_hero_title = null;
    public ?string $home_hero_subtitle = null;

    public ?string $home_about_title = null;
    public ?string $home_about_text = null;
    public ?string $home_about_image = null;

    public ?string $advantage_1_title = null;
    public ?string $advantage_1_text = null;
    public ?string $advantage_2_title = null;
    public ?string $advantage_2_text = null;
    public ?string $advantage_3_title = null;
    public ?string $advantage_3_text = null;
    public ?string $advantage_4_title = null;
    public ?string $advantage_4_text = null;

    public ?string $home_section_title_programs = null;
    public ?string $home_section_subtitle_programs = null;
    public ?string $home_section_title_events = null;
    public ?string $home_section_subtitle_events = null;

    public ?string $home_cta_title = null;
    public ?string $home_cta_subtitle = null;
    public ?string $home_cta_background_image = null;

    public ?string $stat_1_number = null;
    public ?string $stat_1_label = null;
    public ?string $stat_2_number = null;
    public ?string $stat_2_label = null;
    public ?string $stat_3_number = null;
    public ?string $stat_3_label = null;
    public ?string $stat_4_number = null;
    public ?string $stat_4_label = null;

    public static function group(): string
    {
        return 'site';
    }
}







