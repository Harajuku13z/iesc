<?php

namespace App\Filament\Pages;

use Filament\Pages\SettingsPage;
use App\Settings\SiteSettings;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Form;

class ManageSiteSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Paramètres du site';
    protected static ?string $navigationGroup = 'Configuration';
    protected static string $settings = SiteSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informations générales')
                    ->description('Informations de base sur votre établissement')
                    ->schema([
                        TextInput::make('site_name')
                            ->label('Nom du site')
                            ->maxLength(255)
                            ->required(),
                        Textarea::make('site_description')
                            ->label('Description du site')
                            ->rows(3)
                            ->maxLength(500),
                        TextInput::make('contact_email')
                            ->label('Email de contact')
                            ->email()
                            ->maxLength(255),
                        TextInput::make('contact_phone')
                            ->label('Téléphone de contact')
                            ->tel()
                            ->maxLength(255),
                        TextInput::make('contact_address')
                            ->label('Adresse')
                            ->maxLength(500),
                    ]),

                Section::make('Réseaux Sociaux & Pied de Page')
                    ->description('Liens vers vos réseaux sociaux et configuration du pied de page')
                    ->schema([
                        TextInput::make('social_facebook_url')
                            ->label('URL Facebook')
                            ->url()
                            ->maxLength(255),
                        TextInput::make('social_linkedin_url')
                            ->label('URL LinkedIn')
                            ->url()
                            ->maxLength(255),
                        TextInput::make('social_instagram_url')
                            ->label('URL Instagram')
                            ->url()
                            ->maxLength(255),
                        TextInput::make('social_twitter_url')
                            ->label('URL Twitter/X')
                            ->url()
                            ->maxLength(255),
                        Textarea::make('footer_description')
                            ->label('Description du pied de page')
                            ->rows(3)
                            ->maxLength(500),
                    ]),

                Section::make('Couleurs du site')
                    ->description('Définissez les couleurs principales visibles sur le site public')
                    ->columns(2)
                    ->schema([
                        ColorPicker::make('primary_color')
                            ->label('Couleur principale')
                            ->default('#2563eb')
                            ->required(),
                        ColorPicker::make('secondary_color')
                            ->label('Couleur secondaire')
                            ->default('#0ea5e9')
                            ->required(),
                    ]),

                Section::make('Identité visuelle')
                    ->schema([
                        FileUpload::make('site_logo_path')
                            ->label('Logo (Header)')
                            ->disk('public')
                            ->directory('settings')
                            ->image(),
                        FileUpload::make('site_favicon_path')
                            ->label('Favicon')
                            ->disk('public')
                            ->directory('settings')
                            ->image(),
                    ]),
                Section::make('Informations de Contact')
                    ->description('Basé sur les infos du flyer.')
                    ->schema([
                        TextInput::make('contact_email')
                            ->label('Email de contact')
                            ->email()
                            ->default('institutenseignementsupérieur@gmail.com'),
                        TextInput::make('contact_phone')
                            ->label('Téléphone')
                            ->default('+242 06 541 98 91 / 05 022 64 08'),
                        Textarea::make('contact_address')
                            ->label('Adresse Postale')
                            ->default('112, Avenue de France Poto-poto'),
                    ]),
                Section::make('Réseaux Sociaux & Pied de Page')
                    ->schema([
                        TextInput::make('social_facebook_url')->label('URL Facebook')->url(),
                        TextInput::make('social_linkedin_url')->label('URL LinkedIn')->url(),
                        Textarea::make('footer_text')->label('Texte du pied de page'),
                    ]),
            ]);
    }
}
