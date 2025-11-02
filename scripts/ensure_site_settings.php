<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';
/** @var \Illuminate\Contracts\Console\Kernel $kernel */
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$values = [
    'site_name' => 'IESC Université',
    'site_description' => "Institut d'Enseignement Supérieur du Commerce",
    'contact_email' => 'contact@iesc.cg',
    'contact_phone' => '+242 06 541 98 91',
    'contact_address' => '112, Avenue de France Poto-poto',
    'social_facebook_url' => '',
    'social_linkedin_url' => '',
    'social_instagram_url' => '',
    'social_twitter_url' => '',
    'footer_description' => 'IESC, excellence & insertion professionnelle.',
    'primary_color' => '#9e5a59',
    'secondary_color' => '#000000',
    'site_logo_path' => 'settings/01K8R3G6JMBQ16HHSKN0SJ2XQQ.jpg',
    'site_favicon_path' => null,
    'home_hero_image' => 'homepage/01K8RQ2X0AYH56HZXRXF4JQHJR.jpg',
    'home_hero_title' => "IESC : Votre Tremplin vers l'Excellence et l'Emploi",
    'home_hero_subtitle' => "Formez-vous aux métiers d'avenir au Congo. Inscriptions 2025-2026 en cours !",
    'home_about_title' => "IESC : Le Futur de l'Enseignement Supérieur à Brazzaville",
    'home_about_text' => "L'IESC offre une formation supérieure de pointe. Nous préparons les futurs professionnels grâce à des Licences adaptées au marché (Informatique, Gestion, Droit). Notre engagement : des compétences solides, un cadre d'étude moderne et une insertion professionnelle assurée. Choisissez l'IESC pour un avenir garanti.",
    'home_about_image' => 'homepage/01K8RQ6FKHS8BSBQ4M2J47XH2M.jpg',
    'advantage_1_title' => 'STAGE PROFESSIONNEL GARANTI',
    'advantage_1_text' => "Un stage assuré pour chaque diplômé. L'assurance d'une première expérience concrète en entreprise.",
    'advantage_2_title' => 'FILIÈRES À FORT EMPLOI',
    'advantage_2_text' => "Formez-vous aux métiers les plus demandés : Génie Informatique, Administration, Droit, Banque, etc.",
    'advantage_3_title' => "CADRE D'ÉTUDE MODERNE",
    'advantage_3_text' => 'Salles climatisées, laboratoires informatiques, bibliothèque et caméras de surveillance.',
    'advantage_4_title' => "FACILITÉ D'ACHAT DE PC",
    'advantage_4_text' => "Possibilité d'acquérir votre ordinateur portable à crédit pour des études 100% connectées.",
    'home_section_title_programs' => "Nos 4 Pôles d'Excellence en Licence",
    'home_section_subtitle_programs' => 'Sciences, Droit, Informatique : La voie qui vous mènera au succès professionnel.',
    'home_section_title_events' => "Actualités & Moments Forts de l'IESC",
    'home_section_subtitle_events' => "Gardez le contact avec la dynamique de l'école : séminaires, conférences et vie étudiante.",
    'home_cta_title' => 'DÉBUT DES INSCRIPTIONS : 16 SEPTEMBRE 2025',
    'home_cta_subtitle' => "Les places sont limitées. Réservez votre avenir professionnel dès aujourd'hui !",
    'home_cta_background_image' => 'homepage/01K8RPW88XNNFTVH999DTSM7MF.jpg',
    'stat_1_number' => '4',
    'stat_1_label' => 'Grandes Filières de Licence reconnues',
    'stat_2_number' => '95%',
    'stat_2_label' => "Taux d'insertion professionnelle de nos diplômés",
    'stat_3_number' => '30 000',
    'stat_3_label' => 'FCFA, Frais de scolarité mensuels compétitifs',
    'stat_4_number' => '1',
    'stat_4_label' => 'Stage garanti pour chaque étudiant en fin de cursus',
];

foreach ($values as $name => $value) {
    $exists = DB::table('settings')->where('group', 'site')->where('name', $name)->exists();
    if (! $exists) {
        DB::table('settings')->insert([
            'group' => 'site',
            'name' => $name,
            'payload' => json_encode($value),
        ]);
        echo "Inserted: {$name}\n";
    }
}

echo "Done.\n";





