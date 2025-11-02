#!/bin/bash

echo "=================================="
echo "🔧 FIX PRODUCTION IESC"
echo "=================================="
echo ""

# Couleurs
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# 1. Vérifier la version PHP
echo -e "${YELLOW}1️⃣ Vérification version PHP...${NC}"
PHP_VERSION=$(php -v | head -n 1)
echo "   $PHP_VERSION"

if php -v | grep -q "PHP 8"; then
    echo -e "   ${GREEN}✓ Version PHP OK${NC}"
else
    echo -e "   ${RED}✗ Version PHP < 8.2 détectée${NC}"
    echo "   Essayez: php82 artisan ou /usr/local/bin/php82 artisan"
fi
echo ""

# 2. Vérifier les extensions PHP
echo -e "${YELLOW}2️⃣ Vérification extensions PHP...${NC}"
REQUIRED_EXTS="pdo pdo_mysql mbstring xml ctype json bcmath fileinfo tokenizer"
MISSING_EXTS=""

for ext in $REQUIRED_EXTS; do
    if php -m | grep -qi "^$ext\$"; then
        echo -e "   ${GREEN}✓${NC} $ext"
    else
        echo -e "   ${RED}✗${NC} $ext (MANQUANT)"
        MISSING_EXTS="$MISSING_EXTS $ext"
    fi
done

if [ -n "$MISSING_EXTS" ]; then
    echo -e "   ${RED}Extensions manquantes:$MISSING_EXTS${NC}"
fi
echo ""

# 3. Vérifier le fichier .env
echo -e "${YELLOW}3️⃣ Vérification fichier .env...${NC}"
if [ -f .env ]; then
    echo -e "   ${GREEN}✓ .env existe${NC}"
    
    if grep -q "^APP_KEY=base64:" .env; then
        echo -e "   ${GREEN}✓ APP_KEY configurée${NC}"
    else
        echo -e "   ${RED}✗ APP_KEY manquante ou vide${NC}"
        echo "   Exécutez: php artisan key:generate"
    fi
    
    if grep -q "^DB_DATABASE=" .env && ! grep -q "^DB_DATABASE=$" .env; then
        echo -e "   ${GREEN}✓ DB_DATABASE configurée${NC}"
    else
        echo -e "   ${RED}✗ DB_DATABASE non configurée${NC}"
    fi
else
    echo -e "   ${RED}✗ .env n'existe pas${NC}"
    echo "   Copiez .env.example vers .env"
fi
echo ""

# 4. Vérifier les permissions
echo -e "${YELLOW}4️⃣ Correction des permissions...${NC}"
chmod -R 755 storage bootstrap/cache 2>/dev/null && echo -e "   ${GREEN}✓ chmod 755 appliqué${NC}" || echo -e "   ${RED}✗ Impossible de modifier les permissions${NC}"
chmod -R 777 storage 2>/dev/null && echo -e "   ${GREEN}✓ storage en 777${NC}" || echo -e "   ${YELLOW}⚠ Permissions storage limitées${NC}"
echo ""

# 5. Nettoyer les caches
echo -e "${YELLOW}5️⃣ Nettoyage des caches...${NC}"
php artisan cache:clear 2>/dev/null && echo -e "   ${GREEN}✓ cache:clear${NC}" || echo -e "   ${RED}✗ cache:clear échoué${NC}"
php artisan config:clear 2>/dev/null && echo -e "   ${GREEN}✓ config:clear${NC}" || echo -e "   ${RED}✗ config:clear échoué${NC}"
php artisan route:clear 2>/dev/null && echo -e "   ${GREEN}✓ route:clear${NC}" || echo -e "   ${RED}✗ route:clear échoué${NC}"
php artisan view:clear 2>/dev/null && echo -e "   ${GREEN}✓ view:clear${NC}" || echo -e "   ${RED}✗ view:clear échoué${NC}"
echo ""

# 6. Optimisation production
echo -e "${YELLOW}6️⃣ Optimisation pour production...${NC}"
php artisan config:cache 2>/dev/null && echo -e "   ${GREEN}✓ config:cache${NC}" || echo -e "   ${RED}✗ config:cache échoué${NC}"
php artisan route:cache 2>/dev/null && echo -e "   ${GREEN}✓ route:cache${NC}" || echo -e "   ${RED}✗ route:cache échoué${NC}"
php artisan view:cache 2>/dev/null && echo -e "   ${GREEN}✓ view:cache${NC}" || echo -e "   ${RED}✗ view:cache échoué${NC}"
echo ""

# 7. Composer autoload
echo -e "${YELLOW}7️⃣ Composer autoload...${NC}"
if command -v composer &> /dev/null; then
    composer dump-autoload -o 2>/dev/null && echo -e "   ${GREEN}✓ dump-autoload${NC}" || echo -e "   ${RED}✗ dump-autoload échoué${NC}"
else
    echo -e "   ${YELLOW}⚠ Composer non trouvé${NC}"
fi
echo ""

# 8. Test connexion base de données
echo -e "${YELLOW}8️⃣ Test connexion base de données...${NC}"
php artisan migrate:status 2>/dev/null && echo -e "   ${GREEN}✓ Connexion DB OK${NC}" || echo -e "   ${RED}✗ Impossible de se connecter à la DB${NC}"
echo ""

echo "=================================="
echo -e "${GREEN}✅ DIAGNOSTIC TERMINÉ${NC}"
echo "=================================="
echo ""
echo "Si php artisan ne fonctionne toujours pas:"
echo ""
echo "1. Utilisez le bon binaire PHP:"
echo "   which php"
echo "   php82 artisan --version"
echo "   /usr/local/bin/php82 artisan --version"
echo ""
echo "2. Vérifiez les logs:"
echo "   tail -50 storage/logs/laravel.log"
echo ""
echo "3. Erreur exacte:"
echo "   php artisan 2>&1 | head -20"
echo ""

