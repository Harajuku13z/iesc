<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Program;
use App\Models\StaticPage;
use App\Models\CareerOpening;
use App\Models\News;
use App\Models\Event;

class DemoContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1) Site Settings (spatie settings table)
        $settings = [
            ['group' => 'general', 'name' => 'site_name', 'payload' => json_encode('IESC Université')],
            ['group' => 'general', 'name' => 'site_logo_path', 'payload' => json_encode(null)],
            ['group' => 'general', 'name' => 'site_favicon_path', 'payload' => json_encode(null)],
            ['group' => 'general', 'name' => 'contact_email', 'payload' => json_encode('contact@iesc.test')],
            ['group' => 'general', 'name' => 'contact_phone', 'payload' => json_encode('+242 06 541 98 91 / 05 022 64 08')],
            ['group' => 'general', 'name' => 'contact_address', 'payload' => json_encode('112, Avenue de France Poto-poto')],
            ['group' => 'general', 'name' => 'social_facebook_url', 'payload' => json_encode('https://facebook.com/iesc')],
            ['group' => 'general', 'name' => 'social_linkedin_url', 'payload' => json_encode('https://linkedin.com/company/iesc')],
            ['group' => 'general', 'name' => 'footer_text', 'payload' => json_encode('© '.date('Y').' IESC Université. Tous droits réservés.')],
        ];
        foreach ($settings as $setting) {
            DB::table('settings')->updateOrInsert(
                ['group' => $setting['group'], 'name' => $setting['name']],
                $setting
            );
        }

        // 2) Homepage sections
        $sections = [
            ['key' => 'hero_title', 'type' => 'text', 'content' => "IESC : Votre tremplin vers l'emploi."],
            ['key' => 'hero_subtitle', 'type' => 'textarea', 'content' => "Formez-vous aux métiers d'avenir en Droit, Gestion et Informatique. Inscriptions en cours."],
            ['key' => 'hero_cta_text', 'type' => 'text', 'content' => 'Postuler Maintenant'],

            ['key' => 'quick_link_1_title', 'type' => 'text', 'content' => 'Admission'],
            ['key' => 'quick_link_1_content', 'type' => 'textarea', 'content' => '<ul><li>Dossier en ligne</li><li>Dates clés</li></ul>'],
            ['key' => 'quick_link_2_title', 'type' => 'text', 'content' => 'Nos Formations'],
            ['key' => 'quick_link_2_content', 'type' => 'textarea', 'content' => '<p>Licences et Masters en Droit, Info, Gestion</p>'],
            ['key' => 'quick_link_3_title', 'type' => 'text', 'content' => 'Vie Étudiante'],
            ['key' => 'quick_link_3_content', 'type' => 'textarea', 'content' => '<p>Associations, logement, restauration</p>'],
            ['key' => 'quick_link_4_title', 'type' => 'text', 'content' => 'Carrières'],
            ['key' => 'quick_link_4_content', 'type' => 'textarea', 'content' => '<p>Stages, alternance, emploi</p>'],

            ['key' => 'info_keys_title', 'type' => 'text', 'content' => 'Infos Pratiques : Inscriptions 2025/2026'],
            ['key' => 'info_keys_content', 'type' => 'textarea', 'content' => '<ul><li>Clôture: 30/11</li><li>Rentrée: 05/01</li></ul>'],
            ['key' => 'thematic_block_title', 'type' => 'text', 'content' => "L'IESC s'engage pour l'excellence"],
            ['key' => 'thematic_block_content', 'type' => 'textarea', 'content' => '<p>Un enseignement professionnalisant et des partenariats avec les entreprises.</p>'],

            ['key' => 'stats_1_value', 'type' => 'text', 'content' => '85%'],
            ['key' => 'stats_1_label', 'type' => 'text', 'content' => 'Taux de réussite en Licence'],
            ['key' => 'stats_2_value', 'type' => 'text', 'content' => '4'],
            ['key' => 'stats_2_label', 'type' => 'text', 'content' => "Pôles d'enseignement"],
            ['key' => 'stats_3_value', 'type' => 'text', 'content' => '100%'],
            ['key' => 'stats_3_label', 'type' => 'text', 'content' => 'Corps professoral qualifié'],
        ];
        // Homepage sections removed

        // 3) Programs
        if (Program::count() === 0) {
            $faculties = [
                'Droit des Affaires' => 'Droit',
                'Informatique - IA' => 'Informatique',
                'Gestion des Entreprises' => 'Gestion',
            ];
            foreach ($faculties as $title => $faculty) {
                Program::create([
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'faculty' => $faculty,
                    'description' => '<p>Description du programme '.$title.'</p>',
                    'opportunities' => '<p>Débouchés professionnels</p>',
                    'is_active' => true,
                ]);
            }
        }

        // 4) Static pages
        StaticPage::updateOrCreate(
            ['slug' => 'a-propos'],
            ['title' => 'À propos de l\'Université', 'content' => '<p>Présentation de l\'IESC.</p>']
        );
        StaticPage::updateOrCreate(
            ['slug' => 'recherche'],
            ['title' => 'Recherche', 'content' => '<p>Nos axes de recherche.</p>']
        );
        StaticPage::updateOrCreate(
            ['slug' => 'international'],
            ['title' => 'International', 'content' => '<p>Partenariats internationaux.</p>']
        );
        StaticPage::updateOrCreate(
            ['slug' => 'vie-etudiante'],
            ['title' => 'Vie Étudiante', 'content' => '<p>Vie de campus et services.</p>']
        );

        // 5) Career openings
        for ($i = 1; $i <= 3; $i++) {
            CareerOpening::updateOrCreate(
                ['title' => "Offre d'emploi #$i"],
                [
                    'type' => 'CDI',
                    'description' => '<p>Nous recrutons poste #'.$i.'</p>',
                    'location' => 'Campus IESC',
                    'is_active' => true,
                ]
            );
        }

        // 6) News
        if (News::count() === 0) {
            $newsData = [
                ['Ouverture des inscriptions 2025-2026', '<p>Les inscriptions sont ouvertes.</p>'],
                ['Nouveau programme en IA', "<p>Ouverture d'un parcours IA.</p>"],
                ['Semaine de l\'orientation', '<p>Rencontrez nos équipes.</p>'],
                ['Partenariat avec Entreprise X', '<p>Signature d\'un partenariat stratégique.</p>'],
            ];
            foreach ($newsData as [$title, $content]) {
                News::create([
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'content' => $content,
                    'published_at' => now()->subDays(rand(0, 10)),
                    'is_active' => true,
                ]);
            }
        }

        // 7) Events
        if (Event::count() === 0) {
            $eventData = [
                ['Journée Portes Ouvertes', '<p>Venez découvrir l\'IESC.</p>', 7, 7],
                ["Conférence Entrepreneuriat", "<p>Intervenants du secteur privé.</p>", 14, 14],
                ['Hackathon Étudiant', '<p>Challenge innovation.</p>', 21, 22],
                ['Forum des Métiers', '<p>Rencontre entreprises.</p>', 30, 30],
            ];
            foreach ($eventData as [$title, $content, $startIn, $endIn]) {
                Event::create([
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'description' => $content,
                    'start_date' => now()->addDays($startIn)->startOfDay()->addHours(10),
                    'end_date' => now()->addDays($endIn)->startOfDay()->addHours(16),
                    'location' => 'Campus IESC',
                    'is_active' => true,
                ]);
            }
        }

        // 8) Demo images skipped (Media Library not enabled on these models here)
    }
}

     */
    public function run(): void
    {
        // 1) Site Settings (spatie settings table)
        $settings = [
            ['group' => 'general', 'name' => 'site_name', 'payload' => json_encode('IESC Université')],
            ['group' => 'general', 'name' => 'site_logo_path', 'payload' => json_encode(null)],
            ['group' => 'general', 'name' => 'site_favicon_path', 'payload' => json_encode(null)],
            ['group' => 'general', 'name' => 'contact_email', 'payload' => json_encode('contact@iesc.test')],
            ['group' => 'general', 'name' => 'contact_phone', 'payload' => json_encode('+242 06 541 98 91 / 05 022 64 08')],
            ['group' => 'general', 'name' => 'contact_address', 'payload' => json_encode('112, Avenue de France Poto-poto')],
            ['group' => 'general', 'name' => 'social_facebook_url', 'payload' => json_encode('https://facebook.com/iesc')],
            ['group' => 'general', 'name' => 'social_linkedin_url', 'payload' => json_encode('https://linkedin.com/company/iesc')],
            ['group' => 'general', 'name' => 'footer_text', 'payload' => json_encode('© '.date('Y').' IESC Université. Tous droits réservés.')],
        ];
        foreach ($settings as $setting) {
            DB::table('settings')->updateOrInsert(
                ['group' => $setting['group'], 'name' => $setting['name']],
                $setting
            );
        }

        // 2) Homepage sections
        $sections = [
            ['key' => 'hero_title', 'type' => 'text', 'content' => "IESC : Votre tremplin vers l'emploi."],
            ['key' => 'hero_subtitle', 'type' => 'textarea', 'content' => "Formez-vous aux métiers d'avenir en Droit, Gestion et Informatique. Inscriptions en cours."],
            ['key' => 'hero_cta_text', 'type' => 'text', 'content' => 'Postuler Maintenant'],

            ['key' => 'quick_link_1_title', 'type' => 'text', 'content' => 'Admission'],
            ['key' => 'quick_link_1_content', 'type' => 'textarea', 'content' => '<ul><li>Dossier en ligne</li><li>Dates clés</li></ul>'],
            ['key' => 'quick_link_2_title', 'type' => 'text', 'content' => 'Nos Formations'],
            ['key' => 'quick_link_2_content', 'type' => 'textarea', 'content' => '<p>Licences et Masters en Droit, Info, Gestion</p>'],
            ['key' => 'quick_link_3_title', 'type' => 'text', 'content' => 'Vie Étudiante'],
            ['key' => 'quick_link_3_content', 'type' => 'textarea', 'content' => '<p>Associations, logement, restauration</p>'],
            ['key' => 'quick_link_4_title', 'type' => 'text', 'content' => 'Carrières'],
            ['key' => 'quick_link_4_content', 'type' => 'textarea', 'content' => '<p>Stages, alternance, emploi</p>'],

            ['key' => 'info_keys_title', 'type' => 'text', 'content' => 'Infos Pratiques : Inscriptions 2025/2026'],
            ['key' => 'info_keys_content', 'type' => 'textarea', 'content' => '<ul><li>Clôture: 30/11</li><li>Rentrée: 05/01</li></ul>'],
            ['key' => 'thematic_block_title', 'type' => 'text', 'content' => "L'IESC s'engage pour l'excellence"],
            ['key' => 'thematic_block_content', 'type' => 'textarea', 'content' => '<p>Un enseignement professionnalisant et des partenariats avec les entreprises.</p>'],

            ['key' => 'stats_1_value', 'type' => 'text', 'content' => '85%'],
            ['key' => 'stats_1_label', 'type' => 'text', 'content' => 'Taux de réussite en Licence'],
            ['key' => 'stats_2_value', 'type' => 'text', 'content' => '4'],
            ['key' => 'stats_2_label', 'type' => 'text', 'content' => "Pôles d'enseignement"],
            ['key' => 'stats_3_value', 'type' => 'text', 'content' => '100%'],
            ['key' => 'stats_3_label', 'type' => 'text', 'content' => 'Corps professoral qualifié'],
        ];
        // Homepage sections removed

        // 3) Programs
        if (Program::count() === 0) {
            $faculties = [
                'Droit des Affaires' => 'Droit',
                'Informatique - IA' => 'Informatique',
                'Gestion des Entreprises' => 'Gestion',
            ];
            foreach ($faculties as $title => $faculty) {
                Program::create([
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'faculty' => $faculty,
                    'description' => '<p>Description du programme '.$title.'</p>',
                    'opportunities' => '<p>Débouchés professionnels</p>',
                    'is_active' => true,
                ]);
            }
        }

        // 4) Static pages
        StaticPage::updateOrCreate(
            ['slug' => 'a-propos'],
            ['title' => 'À propos de l\'Université', 'content' => '<p>Présentation de l\'IESC.</p>']
        );
        StaticPage::updateOrCreate(
            ['slug' => 'recherche'],
            ['title' => 'Recherche', 'content' => '<p>Nos axes de recherche.</p>']
        );
        StaticPage::updateOrCreate(
            ['slug' => 'international'],
            ['title' => 'International', 'content' => '<p>Partenariats internationaux.</p>']
        );
        StaticPage::updateOrCreate(
            ['slug' => 'vie-etudiante'],
            ['title' => 'Vie Étudiante', 'content' => '<p>Vie de campus et services.</p>']
        );

        // 5) Career openings
        for ($i = 1; $i <= 3; $i++) {
            CareerOpening::updateOrCreate(
                ['title' => "Offre d'emploi #$i"],
                [
                    'type' => 'CDI',
                    'description' => '<p>Nous recrutons poste #'.$i.'</p>',
                    'location' => 'Campus IESC',
                    'is_active' => true,
                ]
            );
        }

        // 6) News
        if (News::count() === 0) {
            $newsData = [
                ['Ouverture des inscriptions 2025-2026', '<p>Les inscriptions sont ouvertes.</p>'],
                ['Nouveau programme en IA', "<p>Ouverture d'un parcours IA.</p>"],
                ['Semaine de l\'orientation', '<p>Rencontrez nos équipes.</p>'],
                ['Partenariat avec Entreprise X', '<p>Signature d\'un partenariat stratégique.</p>'],
            ];
            foreach ($newsData as [$title, $content]) {
                News::create([
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'content' => $content,
                    'published_at' => now()->subDays(rand(0, 10)),
                    'is_active' => true,
                ]);
            }
        }

        // 7) Events
        if (Event::count() === 0) {
            $eventData = [
                ['Journée Portes Ouvertes', '<p>Venez découvrir l\'IESC.</p>', 7, 7],
                ["Conférence Entrepreneuriat", "<p>Intervenants du secteur privé.</p>", 14, 14],
                ['Hackathon Étudiant', '<p>Challenge innovation.</p>', 21, 22],
                ['Forum des Métiers', '<p>Rencontre entreprises.</p>', 30, 30],
            ];
            foreach ($eventData as [$title, $content, $startIn, $endIn]) {
                Event::create([
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'description' => $content,
                    'start_date' => now()->addDays($startIn)->startOfDay()->addHours(10),
                    'end_date' => now()->addDays($endIn)->startOfDay()->addHours(16),
                    'location' => 'Campus IESC',
                    'is_active' => true,
                ]);
            }
        }
        // 8) Demo images skipped (Media Library not enabled on these models here)
    }
}
