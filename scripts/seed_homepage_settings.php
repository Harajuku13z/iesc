<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';
/** @var \Illuminate\Contracts\Console\Kernel $kernel */
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

/** @var \App\Settings\SiteSettings $s */
$s = app(\App\Settings\SiteSettings::class);

$s->site_name = 'IESC Université';
$s->site_description = "Institut d'Enseignement Supérieur du Commerce";
$s->contact_email = 'contact@iesc.cg';
$s->contact_phone = '+242 06 541 98 91';
$s->contact_address = '112, Avenue de France Poto-poto';
$s->social_facebook_url = '';
$s->social_linkedin_url = '';
$s->social_instagram_url = '';
$s->social_twitter_url = '';
$s->footer_description = 'IESC, excellence & insertion professionnelle.';
$s->primary_color = '#9e5a59';
$s->secondary_color = '#000000';
$s->site_logo_path = 'settings/01K8R3G6JMBQ16HHSKN0SJ2XQQ.jpg';
$s->site_favicon_path = null;

$s->home_hero_image = 'homepage/01K8RQ2X0AYH56HZXRXF4JQHJR.jpg';
$s->home_hero_title = "IESC : Votre Tremplin vers l'Excellence et l'Emploi";
$s->home_hero_subtitle = "Formez-vous aux métiers d'avenir au Congo. Inscriptions 2025-2026 en cours !";

$s->home_about_title = "IESC : Le Futur de l'Enseignement Supérieur à Brazzaville";
$s->home_about_text = "L'IESC offre une formation supérieure de pointe. Nous préparons les futurs professionnels grâce à des Licences adaptées au marché (Informatique, Gestion, Droit). Notre engagement : des compétences solides, un cadre d'étude moderne et une insertion professionnelle assurée. Choisissez l'IESC pour un avenir garanti.";
$s->home_about_image = 'homepage/01K8RQ6FKHS8BSBQ4M2J47XH2M.jpg';

$s->advantage_1_title = 'STAGE PROFESSIONNEL GARANTI';
$s->advantage_1_text = "Un stage assuré pour chaque diplômé. L'assurance d'une première expérience concrète en entreprise.";
$s->advantage_2_title = 'FILIÈRES À FORT EMPLOI';
$s->advantage_2_text = "Formez-vous aux métiers les plus demandés : Génie Informatique, Administration, Droit, Banque, etc.";
$s->advantage_3_title = "CADRE D'ÉTUDE MODERNE";
$s->advantage_3_text = 'Salles climatisées, laboratoires informatiques, bibliothèque et caméras de surveillance.';
$s->advantage_4_title = "FACILITÉ D'ACHAT DE PC";
$s->advantage_4_text = "Possibilité d'acquérir votre ordinateur portable à crédit pour des études 100% connectées.";

$s->home_section_title_programs = "Nos 4 Pôles d'Excellence en Licence";
$s->home_section_subtitle_programs = 'Sciences, Droit, Informatique : La voie qui vous mènera au succès professionnel.';
$s->home_section_title_events = "Actualités & Moments Forts de l'IESC";
$s->home_section_subtitle_events = "Gardez le contact avec la dynamique de l'école : séminaires, conférences et vie étudiante.";

$s->home_cta_title = 'DÉBUT DES INSCRIPTIONS : 16 SEPTEMBRE 2025';
$s->home_cta_subtitle = "Les places sont limitées. Réservez votre avenir professionnel dès aujourd'hui !";
$s->home_cta_background_image = 'homepage/01K8RPW88XNNFTVH999DTSM7MF.jpg';

$s->stat_1_number = '4';
$s->stat_1_label = 'Grandes Filières de Licence reconnues';
$s->stat_2_number = '95%';
$s->stat_2_label = "Taux d'insertion professionnelle de nos diplômés";
$s->stat_3_number = '30 000';
$s->stat_3_label = 'FCFA, Frais de scolarité mensuels compétitifs';
$s->stat_4_number = '1';
$s->stat_4_label = 'Stage garanti pour chaque étudiant en fin de cursus';

$s->save();

echo "Settings saved\n";





