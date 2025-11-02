# 🌐 Configuration Document Root - Erreur 403

## 🔴 Problème : Erreur 403 Forbidden

L'erreur 403 survient car le serveur web pointe vers la racine du projet au lieu du dossier `public/`.

## ✅ Solution Recommandée : Changer le Document Root

### 📱 **Sur cPanel :**

1. **Connectez-vous à cPanel**
2. Allez dans **"Domaines"** ou **"Domains"**
3. Trouvez votre domaine et cliquez sur **"Gérer"** ou **"Manage"**
4. Changez le **Document Root** :
   
   **DE :**
   ```
   /home/u570136219/public_html
   ```
   
   **VERS :**
   ```
   /home/u570136219/public_html/public
   ```

5. **Sauvegardez** les modifications
6. **Attendez 1-2 minutes** pour la propagation
7. **Visitez votre site** - Ça devrait fonctionner ! ✅

---

### 📱 **Sur Plesk :**

1. Connectez-vous à **Plesk**
2. Allez dans **"Hébergement Web"** ou **"Hosting Settings"**
3. Trouvez **"Racine du document"** ou **"Document Root"**
4. Changez vers : `/public_html/public`
5. **Appliquez** les changements

---

### 📱 **Sur DirectAdmin :**

1. Connectez-vous à **DirectAdmin**
2. Allez dans **"Gestion des domaines"**
3. Cliquez sur votre domaine
4. Trouvez **"Document Root"**
5. Changez vers : `public_html/public`
6. **Sauvegardez**

---

### 📱 **Via .htaccess (Alternative si vous ne pouvez pas changer le Document Root) :**

Si vous **ne pouvez pas** modifier le Document Root, les fichiers suivants ont été créés automatiquement :

**À la racine (`public_html/`) :**
- `.htaccess` - Redirige automatiquement vers `public/`
- `index.php` - Fichier de redirection de secours

Ces fichiers permettront au site de fonctionner même si le Document Root n'est pas changé.

---

## 🔧 Script de Correction Automatique

Sur votre serveur SSH, exécutez :

```bash
./fix-403-forbidden.sh
```

Ce script va :
- ✅ Corriger toutes les permissions
- ✅ Créer/vérifier les fichiers .htaccess
- ✅ Créer les fichiers de redirection
- ✅ Vérifier la structure

---

## 🔍 Vérifications Après Configuration

### Test 1 : Vérifier que le site charge
```bash
curl -I https://votre-domaine.com
```
Vous devriez voir : `HTTP/1.1 200 OK`

### Test 2 : Vérifier les permissions
```bash
ls -la public/index.php
```
Devrait montrer : `-rw-r--r--` (644)

### Test 3 : Vérifier les logs si erreur 500
```bash
tail -50 storage/logs/laravel.log
```

---

## 🐛 Problèmes Courants

### Erreur 500 après correction du 403

**Cause :** Problème de .env ou de cache

**Solution :**
```bash
php artisan config:clear
php artisan cache:clear
chmod -R 777 storage bootstrap/cache
```

### Page blanche

**Cause :** Erreur PHP

**Solution :**
```bash
# Activer l'affichage des erreurs temporairement
# Dans .env, changez:
APP_DEBUG=true

# Puis visitez le site pour voir l'erreur exacte
```

### Les assets (CSS/JS) ne chargent pas

**Cause :** Assets non compilés

**Solution :**
```bash
npm install
npm run build
```

---

## 📊 Structure Correcte des Dossiers

```
public_html/                 ← Document Root ANCIEN (cause le 403)
├── .htaccess               ← Redirige vers public/
├── index.php               ← Redirige vers public/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/                  ← Document Root CORRECT ✅
│   ├── .htaccess
│   ├── index.php           ← Point d'entrée Laravel
│   ├── css/
│   ├── js/
│   └── storage -> ../storage/app/public
├── resources/
├── routes/
├── storage/
└── vendor/
```

---

## ✅ Checklist Finale

- [ ] Document Root changé vers `/public_html/public`
- [ ] Permissions corrigées (755 pour dossiers, 644 pour fichiers)
- [ ] `storage/` et `bootstrap/cache/` en 777
- [ ] `.env` existe et est configuré
- [ ] `vendor/` existe (sinon : `composer install`)
- [ ] Cache vidé (`php artisan cache:clear`)
- [ ] Site accessible sans erreur 403

---

## 📞 Support

Si le problème persiste après avoir suivi ce guide :

1. Vérifiez les logs : `tail -100 storage/logs/laravel.log`
2. Contactez votre hébergeur pour vérifier la configuration Apache/Nginx
3. Assurez-vous que mod_rewrite est activé

---

**Dernière mise à jour :** 2 novembre 2025

