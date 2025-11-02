<?php

namespace App\Filament\Pages;

use App\Settings\SiteSettings;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use Filament\Notifications\Notification;
use Filament\Actions\Action;

class HomepageConfig extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Configuration Page d\'accueil';
    protected static ?string $navigationGroup = 'Contenu';
    protected static string $settings = SiteSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Section Héro')
                    ->schema([
                        FileUpload::make('home_hero_image')
                            ->label('Image de fond du héros')
                            ->disk('public')
                            ->directory('homepage')
                            ->image()
                            ->imageEditor(false)
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio(null)
                            ->columnSpanFull(),
                        TextInput::make('home_hero_title')
                            ->label('Titre principal')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('home_hero_subtitle')
                            ->label('Sous-titre')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Section::make('Section À propos')
                    ->schema([
                        TextInput::make('home_about_title')
                            ->label('Titre "À propos"')
                            ->maxLength(255),
                        Textarea::make('home_about_text')
                            ->label('Texte "À propos"')
                            ->rows(5)
                            ->columnSpanFull(),
                        FileUpload::make('home_about_image')
                            ->label('Image "À propos"')
                            ->disk('public')
                            ->directory('homepage')
                            ->image()
                            ->imageEditor(false)
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio(null),
                    ]),

                Section::make('Avantages - 3 colonnes')
                    ->schema([
                        TextInput::make('advantage_1_title')
                            ->label('Titre avantage 1')
                            ->default('Formation d\'Excellence')
                            ->maxLength(255),
                        Textarea::make('advantage_1_text')
                            ->label('Texte avantage 1')
                            ->default('Programmes adaptés aux réalités du marché du travail')
                            ->rows(2),
                        TextInput::make('advantage_2_title')
                            ->label('Titre avantage 2')
                            ->default('Équipe Pédagogique')
                            ->maxLength(255),
                        Textarea::make('advantage_2_text')
                            ->label('Texte avantage 2')
                            ->default('Enseignants qualifiés et expérimentés')
                            ->rows(2),
                        TextInput::make('advantage_3_title')
                            ->label('Titre avantage 3')
                            ->default('Infrastructures Modernes')
                            ->maxLength(255),
                        Textarea::make('advantage_3_text')
                            ->label('Texte avantage 3')
                            ->default('Équipements et technologies de pointe')
                            ->rows(2),
                        TextInput::make('advantage_4_title')
                            ->label('Titre avantage 4')
                            ->default('Partenariats Stratégiques')
                            ->maxLength(255),
                        Textarea::make('advantage_4_text')
                            ->label('Texte avantage 4')
                            ->default('Collaborations avec des entreprises leaders')
                            ->rows(2),
                    ])
                    ->columns(2),

                Section::make('Sections principales')
                    ->schema([
                        TextInput::make('home_section_title_programs')
                            ->label('Titre section Formations')
                            ->maxLength(255),
                        Textarea::make('home_section_subtitle_programs')
                            ->label('Sous-titre section Formations')
                            ->rows(2)
                            ->columnSpanFull(),
                        TextInput::make('home_section_title_events')
                            ->label('Titre section Événements')
                            ->maxLength(255),
                        Textarea::make('home_section_subtitle_events')
                            ->label('Sous-titre section Événements')
                            ->rows(2)
                            ->columnSpanFull(),
                    ]),

                Section::make('Section CTA (Call to Action)')
                    ->schema([
                        TextInput::make('home_cta_title')
                            ->label('Titre CTA')
                            ->default('Prêt à commencer votre aventure ?')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('home_cta_subtitle')
                            ->label('Sous-titre CTA')
                            ->default('Rejoignez l\'IESC et donnez un nouvel élan à votre carrière professionnelle')
                            ->rows(3)
                            ->columnSpanFull(),
                        FileUpload::make('home_cta_background_image')
                            ->label('Image de fond CTA')
                            ->disk('public')
                            ->directory('homepage')
                            ->image()
                            ->imageEditor(false)
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio(null)
                            ->columnSpanFull(),
                    ]),

                Section::make('Statistiques')
                    ->schema([
                        TextInput::make('stat_1_number')
                            ->label('Chiffre 1')
                            ->default('500+')
                            ->maxLength(50),
                        TextInput::make('stat_1_label')
                            ->label('Description 1')
                            ->default('Étudiants formés')
                            ->maxLength(255),
                        TextInput::make('stat_2_number')
                            ->label('Chiffre 2')
                            ->default('85%')
                            ->maxLength(50),
                        TextInput::make('stat_2_label')
                            ->label('Description 2')
                            ->default('Taux d\'insertion professionnelle')
                            ->maxLength(255),
                        TextInput::make('stat_3_number')
                            ->label('Chiffre 3')
                            ->default('50+')
                            ->maxLength(50),
                        TextInput::make('stat_3_label')
                            ->label('Description 3')
                            ->default('Partenaires entreprises')
                            ->maxLength(255),
                        TextInput::make('stat_4_number')
                            ->label('Chiffre 4')
                            ->default('10+')
                            ->maxLength(50),
                        TextInput::make('stat_4_label')
                            ->label('Description 4')
                            ->default('Années d\'expérience')
                            ->maxLength(255),
                    ])
                    ->columns(2),
            ]);
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $current = app(\App\Settings\SiteSettings::class)->toArray();
        foreach (array_keys($current) as $key) {
            if (! array_key_exists($key, $data)) {
                $data[$key] = $current[$key] ?? null;
            }
        }
        return $data;
    }
}