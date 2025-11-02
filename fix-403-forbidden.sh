#!/bin/bash

echo "🔧 CORRECTION ERREUR 403 FORBIDDEN"
echo "===================================="
echo ""

# 1. Corriger les permissions des dossiers et fichiers
echo "1️⃣ Correction des permissions..."
find . -type d -exec chmod 755 {} \;
find . -type f -exec chmod 644 {} \;
chmod -R 777 storage bootstrap/cache
chmod 755 artisan
echo "   ✓ Permissions corrigées"
echo ""

# 2. Créer/Vérifier .htaccess dans public/
echo "2️⃣ Vérification .htaccess dans public/..."
if [ ! -f "public/.htaccess" ]; then
    cat > public/.htaccess << 'HTACCESS'
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
HTACCESS
    echo "   ✓ .htaccess créé dans public/"
else
    echo "   ✓ .htaccess existe déjà"
fi
echo ""

# 3. Créer .htaccess à la racine (redirection vers public/)
echo "3️⃣ Création .htaccess racine (redirection vers public/)..."
cat > .htaccess << 'ROOTHTACCESS'
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
ROOTHTACCESS
echo "   ✓ .htaccess racine créé"
echo ""

# 4. Créer index.php de redirection à la racine
echo "4️⃣ Création index.php de redirection..."
cat > index.php << 'PHPINDEX'
<?php
header('Location: public/index.php');
exit;
PHPINDEX
echo "   ✓ index.php de redirection créé"
echo ""

# 5. Vérifier que public/index.php existe
echo "5️⃣ Vérification public/index.php..."
if [ -f "public/index.php" ]; then
    echo "   ✓ public/index.php existe"
else
    echo "   ✗ public/index.php MANQUANT!"
    echo "   Recréez-le depuis le dépôt Git"
fi
echo ""

# 6. Afficher la structure des dossiers
echo "6️⃣ Structure actuelle:"
ls -la | grep -E "^d|htaccess|index.php"
echo ""

echo "===================================="
echo "✅ CORRECTIONS APPLIQUÉES"
echo ""
echo "📋 Configuration serveur requise:"
echo ""
echo "Option A - Document Root vers public/ (RECOMMANDÉ):"
echo "   Dans votre panneau d'hébergement (cPanel, Plesk, etc.):"
echo "   1. Allez dans 'Domaines' ou 'Document Root'"
echo "   2. Changez le Document Root de:"
echo "      /home/u570136219/public_html"
echo "   vers:"
echo "      /home/u570136219/public_html/public"
echo ""
echo "Option B - Garder Document Root actuel:"
echo "   Les fichiers .htaccess créés vont rediriger automatiquement"
echo "   vers le dossier public/"
echo ""
echo "🔍 Test:"
echo "   1. Visitez votre site"
echo "   2. Si erreur 500, vérifiez: tail -50 storage/logs/laravel.log"
echo "   3. Si toujours 403, contactez votre hébergeur"
echo ""

