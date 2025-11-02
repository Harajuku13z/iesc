<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['group' => 'general', 'name' => 'site_name', 'payload' => json_encode('IESC Université')],
            ['group' => 'general', 'name' => 'site_logo_path', 'payload' => json_encode(null)],
            ['group' => 'general', 'name' => 'site_favicon_path', 'payload' => json_encode(null)],
            ['group' => 'general', 'name' => 'contact_email', 'payload' => json_encode('institutenseignementsupérieur@gmail.com')],
            ['group' => 'general', 'name' => 'contact_phone', 'payload' => json_encode('+242 06 541 98 91 / 05 022 64 08')],
            ['group' => 'general', 'name' => 'contact_address', 'payload' => json_encode('112, Avenue de France Poto-poto')],
            ['group' => 'general', 'name' => 'social_facebook_url', 'payload' => json_encode(null)],
            ['group' => 'general', 'name' => 'social_linkedin_url', 'payload' => json_encode(null)],
            ['group' => 'general', 'name' => 'social_instagram_url', 'payload' => json_encode(null)],
            ['group' => 'general', 'name' => 'social_twitter_url', 'payload' => json_encode(null)],
            ['group' => 'general', 'name' => 'footer_text', 'payload' => json_encode('© ' . date('Y') . ' IESC Université. Tous droits réservés.')],
        ];

        foreach ($settings as $setting) {
            \DB::table('settings')->updateOrInsert(
                ['group' => $setting['group'], 'name' => $setting['name']],
                $setting
            );
        }
    }
}
            ['group' => 'general', 'name' => 'contact_email', 'payload' => json_encode('institutenseignementsupérieur@gmail.com')],
            ['group' => 'general', 'name' => 'contact_phone', 'payload' => json_encode('+242 06 541 98 91 / 05 022 64 08')],
            ['group' => 'general', 'name' => 'contact_address', 'payload' => json_encode('112, Avenue de France Poto-poto')],
            ['group' => 'general', 'name' => 'social_facebook_url', 'payload' => json_encode(null)],
            ['group' => 'general', 'name' => 'social_linkedin_url', 'payload' => json_encode(null)],
            ['group' => 'general', 'name' => 'social_instagram_url', 'payload' => json_encode(null)],
            ['group' => 'general', 'name' => 'social_twitter_url', 'payload' => json_encode(null)],
            ['group' => 'general', 'name' => 'footer_text', 'payload' => json_encode('© ' . date('Y') . ' IESC Université. Tous droits réservés.')],
        ];

        foreach ($settings as $setting) {
            \DB::table('settings')->updateOrInsert(
                ['group' => $setting['group'], 'name' => $setting['name']],
                $setting
            );
        }
    }
}
