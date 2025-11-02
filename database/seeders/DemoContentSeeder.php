<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Program;
use App\Models\News;
use App\Models\Event;
use App\Models\CareerOpening;

class DemoContentSeeder extends Seeder
{
    public function run(): void
    {
        // 1) Programs
        if (Program::count() === 0) {
            $programs = [
                [
                    'title' => 'Licence en Sciences et Administration',
                    'description' => 'Formation complète en gestion d\'entreprise, administration et management. Développez vos compétences en finance, comptabilité, marketing et ressources humaines.',
                    'duration' => '3 ans',
                    'is_active' => true,
                ],
                [
                    'title' => 'Licence en Informatique et Génie Logiciel',
                    'description' => 'Maîtrisez le développement web, mobile et les systèmes d\'information. Programmation, bases de données, intelligence artificielle et cybersécurité.',
                    'duration' => '3 ans',
                    'is_active' => true,
                ],
                [
                    'title' => 'Licence en Droit',
                    'description' => 'Formation juridique complète avec pratique professionnelle. Droit civil, pénal, commercial et international. Stages en cabinets d\'avocats.',
                    'duration' => '3 ans',
                    'is_active' => true,
                ],
                [
                    'title' => 'Licence en Commerce et Marketing',
                    'description' => 'Techniques de vente, marketing digital, gestion commerciale et négociation. Formation adaptée au marché africain et international.',
                    'duration' => '3 ans',
                    'is_active' => true,
                ],
                [
                    'title' => 'Licence en Comptabilité et Finance',
                    'description' => 'Comptabilité générale, analytique, audit et contrôle de gestion. Préparation aux métiers de la finance d\'entreprise.',
                    'duration' => '3 ans',
                    'is_active' => true,
                ],
                [
                    'title' => 'Licence en Ressources Humaines',
                    'description' => 'Gestion du personnel, recrutement, formation, droit du travail et développement des compétences en entreprise.',
                    'duration' => '3 ans',
                    'is_active' => true,
                ],
            ];

            foreach ($programs as $program) {
                Program::create([
                    'title' => $program['title'],
                    'slug' => Str::slug($program['title']),
                    'description' => $program['description'],
                    'is_active' => $program['is_active'],
                ]);
            }
        }

        // 2) News/Actualités
        if (News::count() === 0) {
            $news = [
                [
                    'title' => 'Ouverture des inscriptions 2025-2026',
                    'content' => '<p>Les candidatures pour l\'année académique 2025-2026 sont officiellement ouvertes. Les places sont limitées, ne tardez pas à déposer votre dossier.</p><p>Les inscriptions se clôturent le 30 novembre 2025.</p>',
                    'published_at' => now()->subDays(2),
                ],
                [
                    'title' => 'Nouveau partenariat avec Total Energies',
                    'content' => '<p>L\'IESC renforce ses partenariats avec les grandes entreprises. Total Energies accueillera 10 de nos étudiants en stage cette année.</p>',
                    'published_at' => now()->subDays(5),
                ],
                [
                    'title' => 'Lancement du programme Intelligence Artificielle',
                    'content' => '<p>Un nouveau parcours spécialisé en IA et Machine Learning sera disponible dès la rentrée 2025. Formation en partenariat avec Microsoft.</p>',
                    'published_at' => now()->subDays(7),
                ],
                [
                    'title' => 'Remise des diplômes 2024',
                    'content' => '<p>Félicitations à la promotion 2024 ! 95% de nos diplômés ont trouvé un emploi dans les 6 mois suivant l\'obtention de leur diplôme.</p>',
                    'published_at' => now()->subDays(10),
                ],
                [
                    'title' => 'Nouveau laboratoire informatique inauguré',
                    'content' => '<p>Un laboratoire équipé de 50 PC dernière génération et d\'outils de développement professionnels est maintenant accessible à tous nos étudiants.</p>',
                    'published_at' => now()->subDays(15),
                ],
            ];

            foreach ($news as $item) {
                News::create([
                    'title' => $item['title'],
                    'slug' => Str::slug($item['title']),
                    'content' => $item['content'],
                    'published_at' => $item['published_at'],
                    'is_published' => true,
                ]);
            }
        }

        // 3) Events/Événements
        if (Event::count() === 0) {
            $events = [
                [
                    'title' => 'Journée Portes Ouvertes',
                    'description' => '<p>Venez découvrir nos campus, rencontrer nos enseignants et échanger avec nos étudiants. Visites guidées toute la journée.</p><p>Programme : présentations des formations, démonstrations, ateliers pratiques.</p>',
                    'starts_at' => now()->addDays(15)->setTime(9, 0),
                    'ends_at' => now()->addDays(15)->setTime(17, 0),
                    'location' => 'Campus IESC - 112 Avenue de France',
                ],
                [
                    'title' => 'Conférence sur l\'Entrepreneuriat',
                    'description' => '<p>Conférence animée par des entrepreneurs à succès. Apprenez les clés pour créer et développer votre entreprise.</p>',
                    'starts_at' => now()->addDays(20)->setTime(14, 0),
                    'ends_at' => now()->addDays(20)->setTime(17, 0),
                    'location' => 'Amphithéâtre principal',
                ],
                [
                    'title' => 'Hackathon Étudiant - Challenge Innovation',
                    'description' => '<p>48h pour développer une solution innovante. Prix : 500 000 FCFA pour l\'équipe gagnante + accompagnement entrepreneurial.</p>',
                    'starts_at' => now()->addDays(25)->setTime(8, 0),
                    'ends_at' => now()->addDays(27)->setTime(18, 0),
                    'location' => 'Campus IESC',
                ],
                [
                    'title' => 'Forum des Métiers et de l\'Emploi',
                    'description' => '<p>Rencontrez des recruteurs de grandes entreprises. Entretiens, ateliers CV, conférences métiers. Ouvert à tous les étudiants.</p>',
                    'starts_at' => now()->addDays(35)->setTime(9, 0),
                    'ends_at' => now()->addDays(35)->setTime(16, 0),
                    'location' => 'Campus IESC',
                ],
                [
                    'title' => 'Séminaire : Droit du Numérique',
                    'description' => '<p>Séminaire sur les enjeux juridiques du numérique en Afrique. Intervenants : avocats spécialisés et juristes d\'entreprise.</p>',
                    'starts_at' => now()->addDays(40)->setTime(10, 0),
                    'ends_at' => now()->addDays(40)->setTime(13, 0),
                    'location' => 'Salle de conférence',
                ],
            ];

            foreach ($events as $event) {
                Event::create([
                    'title' => $event['title'],
                    'slug' => Str::slug($event['title']),
                    'description' => $event['description'],
                    'starts_at' => $event['starts_at'],
                    'ends_at' => $event['ends_at'],
                    'location' => $event['location'],
                    'is_published' => true,
                ]);
            }
        }

        // 4) Career Openings
        if (CareerOpening::count() === 0) {
            $careers = [
                [
                    'title' => 'Enseignant en Informatique (H/F)',
                    'type' => 'CDI',
                    'description' => '<p>Nous recherchons un enseignant passionné pour nos cours de développement web et programmation.</p><p><strong>Profil recherché :</strong></p><ul><li>Master en Informatique</li><li>3+ ans d\'expérience professionnelle</li><li>Maîtrise de JavaScript, Python, PHP</li></ul>',
                    'location' => 'Brazzaville',
                ],
                [
                    'title' => 'Enseignant en Droit (H/F)',
                    'type' => 'CDI',
                    'description' => '<p>Poste d\'enseignant en droit des affaires et droit civil.</p><p><strong>Profil :</strong></p><ul><li>Master 2 en Droit</li><li>Expérience en cabinet d\'avocats</li><li>Excellente pédagogie</li></ul>',
                    'location' => 'Brazzaville',
                ],
                [
                    'title' => 'Conseiller en Orientation (H/F)',
                    'type' => 'CDD 12 mois',
                    'description' => '<p>Accompagnement des étudiants dans leur parcours académique et professionnel.</p><p><strong>Missions :</strong></p><ul><li>Entretiens individuels</li><li>Ateliers collectifs</li><li>Suivi des candidatures</li></ul>',
                    'location' => 'Brazzaville',
                ],
                [
                    'title' => 'Responsable Relations Entreprises (H/F)',
                    'type' => 'CDI',
                    'description' => '<p>Développer les partenariats avec les entreprises pour stages et recrutement.</p><p><strong>Compétences :</strong></p><ul><li>Commercial et négociation</li><li>Réseau professionnel</li><li>Gestion de projets</li></ul>',
                    'location' => 'Brazzaville',
                ],
            ];

            foreach ($careers as $career) {
                CareerOpening::create([
                    'title' => $career['title'],
                    'type' => $career['type'],
                    'description' => $career['description'],
                    'location' => $career['location'],
                    'is_active' => true,
                ]);
            }
        }
    }
}
