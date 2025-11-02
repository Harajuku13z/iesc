#!/bin/bash

echo "🔧 RÉPARATION ADMIN FILAMENT"
echo "============================"
echo ""

echo "1️⃣ Nettoyage des caches..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
echo "   ✓ Caches nettoyés"
echo ""

echo "2️⃣ Optimisation..."
php artisan optimize:clear
echo "   ✓ Optimisation effacée"
echo ""

echo "3️⃣ Vérification de l'utilisateur admin..."
php artisan tinker --execute="
\$user = \App\Models\User::where('email', 'admin@iesc.cg')->first();
if (\$user) {
    echo 'Admin existe: ' . \$user->email . PHP_EOL;
    echo 'Role: ' . \$user->role . PHP_EOL;
} else {
    echo 'Création de l\'admin...' . PHP_EOL;
    \$user = \App\Models\User::create([
        'name' => 'Admin IESC',
        'email' => 'admin@iesc.cg',
        'password' => bcrypt('admin123'),
        'role' => 'admin'
    ]);
    echo 'Admin créé: admin@iesc.cg / admin123' . PHP_EOL;
}
"
echo ""

echo "4️⃣ Vérification des routes admin..."
php artisan route:list --path=admin | head -20
echo ""

echo "============================"
echo "✅ RÉPARATION TERMINÉE"
echo ""
echo "Essayez maintenant:"
echo "  URL: http://localhost:8000/admin"
echo "  Email: admin@iesc.cg"
echo "  Mot de passe: admin123"
echo ""
echo "Si problème persiste:"
echo "  1. Videz le cache du navigateur (CTRL+F5)"
echo "  2. Essayez en navigation privée"
echo "  3. Vérifiez storage/logs/laravel.log"
echo ""

