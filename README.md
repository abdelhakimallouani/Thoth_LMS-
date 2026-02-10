# Thoth LMS – Backend MVC (PHP)

## 📌 Présentation du projet

**Thoth LMS** est une plateforme d’apprentissage en ligne (Learning Management System) développée en **PHP natif** selon une **architecture MVC**.

Ce projet constitue un **socle backend** solide pour la gestion des étudiants et de leurs cours, avec un système d’authentification sécurisé et un routage centralisé.

---

## 🎯 Objectifs pédagogiques

À la fin de ce projet, vous serez capable de :

- Implémenter une architecture **MVC**
- Mettre en place un **Router centralisé**
- Séparer clairement :
  - **Models** : logique métier et accès base de données
  - **Controllers** : gestion des requêtes
  - **Views** : affichage HTML
- Implémenter une **authentification sécurisée**
- Protéger les routes sensibles
- Comprendre les avantages du MVC face au procédural

---

## 👤 Utilisateur du système

### Student (rôle unique)

- S’inscrire
- Se connecter
- Accéder au dashboard
- Consulter les cours
- Voir les détails d’un cours
- S’inscrire à un cours
- Voir ses cours inscrits
- Se déconnecter

---

## ⚙️ Fonctionnalités

### 🔐 Authentification

- Inscription & connexion
- Déconnexion
- Validation des données
- Hashage des mots de passe (`password_hash`)
- Sessions PHP

### 📚 Gestion des cours

- Liste des cours disponibles
- Détails d’un cours
- Inscription à un cours
- Affichage des cours inscrits

### 🔒 Sécurité

- Vérification de session sur les routes protégées
- Redirection vers `/login` si non connecté
- PDO + requêtes préparées
- Protection XSS (`htmlspecialchars`)
- Protection CSRF sur les formulaires

---

## 🛣️ Routes

### Routes publiques

- `/` → Page d’accueil
- `/register` → Inscription
- `/login` → Connexion

### Routes protégées

- `/student/dashboard`
- `/student/course?id={id}`
- `/logout`



---

## 🗄️ Base de données

### students
- id (PK)
- name
- email
- password

### courses
- id (PK)
- title
- description

### enrollments
- id (PK)
- student_id (FK)
- course_id (FK)
- enrollment_date

---

## 🔐 Règles de sécurité

### Obligatoire
- Hashage des mots de passe
- Sessions PHP
- Requêtes PDO préparées
- Validation serveur
- Protection CSRF

### Interdit
- Mots de passe en clair
- Accès direct aux fichiers
- SQL dans les contrôleurs
- Logique métier dans les vues

---

## ▶️ Installation & exécution (VS Code)

### Prérequis
- PHP >= 8
- MySQL
- Apache (XAMPP recommandé)
- VS Code

### Étapes

```bash
git clone https://github.com/abdelhakimallouani/Thoth_LMS-.git

