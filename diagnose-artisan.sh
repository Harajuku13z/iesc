#!/bin/bash

echo "🔍 DIAGNOSTIC APPROFONDI - PHP ARTISAN"
echo "========================================"
echo ""

# 1. Test de base
echo "1️⃣ Test php artisan basique:"
php artisan 2>&1 | head -10
echo ""

# 2. Test avec verbosité
echo "2️⃣ Test avec verbosité:"
php artisan --verbose 2>&1 | head -20
echo ""

# 3. Vérifier le fichier artisan
echo "3️⃣ Fichier artisan (premières lignes):"
head -10 artisan
echo ""

# 4. Test autoload
echo "4️⃣ Test autoload Composer:"
php -r "require 'vendor/autoload.php'; echo 'Autoload OK\n';" 2>&1
echo ""

# 5. Test bootstrap
echo "5️⃣ Test bootstrap Laravel:"
php -r "require 'bootstrap/app.php'; echo 'Bootstrap OK\n';" 2>&1
echo ""

# 6. Vérifier .env
echo "6️⃣ Variables .env importantes:"
cat .env | grep -E "^APP_|^DB_" | grep -v "PASSWORD"
echo ""

# 7. Logs récents
echo "7️⃣ Logs Laravel (dernières 20 lignes):"
if [ -f "storage/logs/laravel.log" ]; then
    tail -20 storage/logs/laravel.log
else
    echo "Aucun fichier de log trouvé"
fi
echo ""

# 8. Vérifier vendor
echo "8️⃣ Dossier vendor:"
if [ -d "vendor" ]; then
    echo "✓ vendor/ existe"
    if [ -f "vendor/autoload.php" ]; then
        echo "✓ vendor/autoload.php existe"
    else
        echo "✗ vendor/autoload.php MANQUANT - Exécutez: composer install"
    fi
else
    echo "✗ vendor/ MANQUANT - Exécutez: composer install"
fi
echo ""

# 9. Test direct de Laravel Kernel
echo "9️⃣ Test Laravel Kernel:"
php -r "
require 'vendor/autoload.php';
\$app = require 'bootstrap/app.php';
echo 'App créée: ' . get_class(\$app) . PHP_EOL;
" 2>&1
echo ""

# 10. Vérifier les permissions
echo "🔟 Permissions fichiers critiques:"
ls -la artisan | awk '{print "artisan: " $1}'
ls -lad storage | awk '{print "storage: " $1}'
ls -lad bootstrap/cache | awk '{print "bootstrap/cache: " $1}'
echo ""

echo "========================================"
echo "✅ DIAGNOSTIC TERMINÉ"
echo ""
echo "📋 Actions recommandées selon l'erreur:"
echo ""
echo "Si 'vendor/autoload.php' manquant:"
echo "  → composer install"
echo ""
echo "Si erreur de permissions:"
echo "  → chmod 755 artisan"
echo "  → chmod -R 777 storage bootstrap/cache"
echo ""
echo "Si erreur .env ou APP_KEY:"
echo "  → php artisan key:generate"
echo ""
echo "Si erreur de syntaxe PHP:"
echo "  → Vérifiez les logs ci-dessus"
echo ""

