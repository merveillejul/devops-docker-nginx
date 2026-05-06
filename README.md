# Projet DevOps - Infrastructure conteneurisee

![CI](https://github.com/merveillejul/devops-docker-nginx/actions/workflows/ci.yml/badge.svg)

## Presentation

Projet personnel de montee en competences DevOps.
Mise en place d'une infrastructure web complete conteneurisee avec Docker,
deployee sur Linux Ubuntu et versionnee avec Git/GitHub.

Auteur : Merveille Juliana NOURRYSSOU-OPOU
Formation : BTS SIO SLAM - Orientation Cloud et DevOps

---

## Stack technique

| Technologie    | Role                          |
|----------------|-------------------------------|
| Nginx          | Serveur web / Reverse proxy   |
| PHP 8.2 FPM    | Execution du code backend     |
| MySQL 8        | Base de donnees relationnelle |
| Docker         | Conteneurisation des services |
| Docker Compose | Orchestration multi-conteneurs|
| GitHub Actions | Pipeline CI/CD automatise     |
| Linux Ubuntu   | Systeme d'exploitation serveur|

---

## Architecture

Navigateur
    |
    v
Nginx (port 8081)
    |
    v
PHP-FPM (port 9000)
    |
    v
MySQL (port 3306)

---

## Fonctionnalites

- Serveur web Nginx configure comme reverse proxy vers PHP-FPM
- Image PHP personnalisee avec extension PDO MySQL (Dockerfile)
- Connexion base de donnees MySQL et enregistrement des visites
- Donnees persistantes avec volumes Docker
- Pipeline CI/CD : build et test automatiques a chaque push

---

## Lancer le projet

Prerequis : Docker et Docker Compose installes

1. Cloner le projet
   git clone https://github.com/merveillejul/devops-docker-nginx.git
   cd devops-docker-nginx

2. Lancer tous les conteneurs
   docker-compose up -d --build

3. Ouvrir dans le navigateur
   http://localhost:8081

4. Arreter le projet
   docker-compose down

---

## Structure du projet

devops-docker-nginx/
├── .github/workflows/ci.yml   # Pipeline GitHub Actions
├── nginx/default.conf          # Configuration Nginx
├── site/index.php              # Application PHP + MySQL
├── Dockerfile                  # Image PHP personnalisee
├── docker-compose.yml          # Orchestration des conteneurs
└── README.md

---

## CI/CD

A chaque push sur la branche main, GitHub Actions :
1. Construit les images Docker
2. Lance tous les conteneurs
3. Verifie que Nginx repond correctement
4. Arrete les conteneurs
