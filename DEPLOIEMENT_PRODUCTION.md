# 🚀 Guide de Déploiement en Production - IESC

## 📋 Prérequis

- PHP >= 8.2
- MySQL 5.7+ ou MariaDB 10.3+
- Composer
- Node.js & NPM (pour compiler les assets)
- Accès SSH au serveur

## 🔧 Étape 1 : Préparer les fichiers

### Sur votre serveur SSH :

```bash
# Se connecter en SSH
ssh votre_user@votre_serveur

# Aller dans le répertoire web
cd public_html  # ou www ou httpdocs selon votre hébergeur

# Cloner le dépôt
git clone https://github.com/Harajuku13z/iesc.git .

# OU si déjà cloné, faire un pull
git pull origin main
```

## ⚙️ Étape 2 : Configuration

### Créer le fichier `.env` :

```bash
cp .env.example .env
nano .env  # ou vi .env
```

### Configurer `.env` avec vos informations de production :

```env
APP_NAME="IESC Université"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://votre-domaine.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=u570136219_iesc
DB_USERNAME=u570136219_iesc
DB_PASSWORD=Harajuku1993@

# Si hébergeur différent de localhost:
# DB_HOST=mysql.votrehebergeur.com
```

## 🔑 Étape 3 : Installation des dépendances

```bash
# Composer (si disponible)
composer install --optimize-autoloader --no-dev

# Si composer n'est pas disponible directement:
php composer.phar install --optimize-autoloader --no-dev

# Générer la clé d'application
php artisan key:generate

# NPM pour les assets
npm install
npm run build
```

## 🗄️ Étape 4 : Base de données

```bash
# Exécuter les migrations
php artisan migrate --force

# Initialiser les settings
php scripts/ensure_site_settings.php

# Créer un utilisateur admin
php artisan tinker
```

Dans tinker, exécutez :
```php
\App\Models\User::create([
    'name' => 'Admin IESC',
    'email' => 'admin@iesc.cg',
    'password' => bcrypt('VotreMotDePasseSecurise'),
    'role' => 'admin'
]);
exit
```

## 🔒 Étape 5 : Permissions et sécurité

```bash
# Permissions correctes
chmod -R 755 storage bootstrap/cache
chmod -R 775 storage
chmod 644 .env

# Optimisations Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Autoload optimisé
composer dump-autoload -o
```

## 🌐 Étape 6 : Configuration du serveur web

### Pour cPanel / Hébergement partagé :

1. Dans cPanel, allez dans "Domaines" ou "Document Root"
2. Pointez votre domaine vers le dossier `public` du projet
3. Exemple : `/home/username/public_html/public`

### Créer un fichier `.htaccess` à la racine (si nécessaire) :

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

## 🔍 Étape 7 : Vérifications

### Test des commandes artisan :

```bash
# Version PHP
php -v

# Extensions PHP
php -m | grep -E 'pdo|mysql|mbstring|xml|ctype|json|bcmath'

# Test artisan
php artisan --version

# Migrations status
php artisan migrate:status

# Connexion DB
php artisan tinker --execute="DB::connection()->getPdo();"
```

## 🐛 Dépannage

### Si `php artisan` ne fonctionne pas :

#### 1. Vérifier la version PHP
```bash
which php
php -v

# Tester avec des versions spécifiques
php82 artisan --version
/usr/local/bin/php82 artisan --version
```

#### 2. Utiliser le script de diagnostic
```bash
./fix-production.sh
```

#### 3. Vérifier les logs
```bash
tail -50 storage/logs/laravel.log
```

#### 4. Permissions
```bash
# Propriétaire correct
chown -R votre_user:votre_user .

# Permissions storage
chmod -R 777 storage bootstrap/cache
```

#### 5. Créer un alias PHP (si version incorrecte)
```bash
# Dans ~/.bashrc ou ~/.bash_profile
alias php='/usr/local/bin/php82'
alias php-cli='/usr/local/bin/php82'

# Recharger
source ~/.bashrc
```

### Si la base de données ne se connecte pas :

```bash
# Test manuel
mysql -h 127.0.0.1 -u u570136219_iesc -p

# Vérifier le .env
cat .env | grep DB_

# Recreer le cache
php artisan config:clear
php artisan cache:clear
```

## 📱 Étape 8 : Test final

Visitez votre site :
- Frontend : `https://votre-domaine.com`
- Admin : `https://votre-domaine.com/admin`

## 🔄 Mises à jour futures

```bash
# 1. Pull les modifications
git pull origin main

# 2. Installer les nouvelles dépendances
composer install --optimize-autoload --no-dev
npm install && npm run build

# 3. Migrations
php artisan migrate --force

# 4. Nettoyer et recacher
php artisan config:clear
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 📞 Support

En cas de problème :
1. Consultez les logs : `storage/logs/laravel.log`
2. Activez temporairement le debug : `APP_DEBUG=true` dans `.env`
3. Vérifiez la documentation de votre hébergeur pour les spécificités PHP

---

**Dernière mise à jour :** 2 novembre 2025

