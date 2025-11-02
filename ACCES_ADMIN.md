# 🔐 Accès Administration IESC

## 📍 URL d'administration

**Panel Admin Filament :**
```
https://iesc.osmoseconsulting.fr/admin
```

---

## 👤 Identifiants par défaut

**Email :** `admin@iesc.cg`  
**Mot de passe :** `admin123`

⚠️ **IMPORTANT :** Changez ce mot de passe après votre première connexion !

---

## 🔧 Créer un nouvel utilisateur admin

### Via SSH :

```bash
# Se connecter en SSH
ssh u570136219@fr-int-web1906.your-server.de

# Aller dans le projet
cd public_html

# Lancer tinker
php artisan tinker
```

### Dans Tinker, exécutez :

```php
\App\Models\User::create([
    'name' => 'Votre Nom',
    'email' => 'votre@email.com',
    'password' => bcrypt('VotreMotDePasse123'),
    'role' => 'admin'
]);

exit
```

---

## 📋 Sections disponibles dans l'admin

### 📚 **Gestion du contenu**
- ✅ **Programmes** - Ajouter/modifier les formations avec images
- ✅ **Actualités** - Publier des news avec images de mise en avant
- ✅ **Événements** - Créer des événements avec dates et lieux
- ✅ **Offres d'emploi** - Publier des postes vacants
- ✅ **Pages statiques** - Gérer le contenu des pages

### 👥 **Gestion académique**
- ✅ **Étudiants** - Base de données complète
- ✅ **Enseignants** - Profils et spécialisations
- ✅ **Cours** - Programmes et emplois du temps
- ✅ **Inscriptions** - Inscriptions aux cours
- ✅ **Notes** - Saisie et consultation des notes
- ✅ **Présences** - Suivi des absences

### 📝 **Candidatures**
- ✅ **Candidatures d'admission** - Gérer les dossiers
- ✅ **Suivi des candidats** - Statuts et notifications

### ⚙️ **Configuration**
- ✅ **Paramètres du site** - Logo, contact, réseaux sociaux
- ✅ **Page d'accueil** - Hero, sections, stats
- ✅ **Couleurs** - Primary (#9e5a59) / Secondary (#000000)

---

## 🎨 Ajouter des images aux actualités

1. Connectez-vous à `/admin`
2. Allez dans **"News"** (Actualités)
3. Cliquez sur une actualité
4. Dans le formulaire, cherchez le champ **"Image"**
5. Uploadez une image (recommandé : 800x600px minimum)
6. Sauvegardez

Les images s'afficheront automatiquement sur la page d'accueil !

---

## 🔒 Sécurité

### Changer le mot de passe admin :

```bash
php artisan tinker
```

```php
$user = \App\Models\User::where('email', 'admin@iesc.cg')->first();
$user->password = bcrypt('NouveauMotDePasseSecurise');
$user->save();

exit
```

### Recommandations :
- ✅ Utilisez un mot de passe fort (12+ caractères)
- ✅ Activez l'authentification à 2 facteurs si possible
- ✅ Ne partagez pas les identifiants admin
- ✅ Créez des comptes séparés pour chaque admin

---

## 🆘 Problèmes courants

### "Page 404" sur /admin

**Solution :**
```bash
php artisan config:clear
php artisan route:clear
php artisan optimize
```

### "Access denied" - Mot de passe incorrect

**Réinitialiser :**
```bash
php artisan tinker
```
```php
$user = \App\Models\User::where('email', 'admin@iesc.cg')->first();
$user->password = bcrypt('admin123');
$user->save();
```

### Les modifications ne s'affichent pas

**Vider le cache :**
```bash
php artisan cache:clear
php artisan view:clear
```

---

**Dernière mise à jour :** 2 novembre 2025

