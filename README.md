# Blog Symfony

Ce projet est un blog développé avec Symfony 6.4, répondant aux exigences d'un TP de développement web.

## Installation

1. Clonez le dépôt :
git clone https://github.com/Matheo93/TP-Symfony-Blog.git
Copy
2. Installez les dépendances :
composer install
Copy
3. Configurez votre base de données dans le fichier `.env.local`

4. Créez la base de données :
php bin/console doctrine:database:create
Copy
5. Appliquez les migrations :
php bin/console doctrine:migrations:migrate
Copy
6. Chargez les fixtures (données de test) :
php bin/console doctrine:fixtures:load
Copy
7. Installez les dépendances front-end :
npm install
npm run build
Copy
8. Lancez le serveur Symfony :
symfony server:start
Copy
## Fonctionnalités

- Système d'authentification (inscription, connexion, déconnexion)
- Gestion des articles (création, modification, suppression)
- Gestion des catégories
- Affichage des articles sur la page d'accueil
- Système de commentaires
- Interface d'administration avec EasyAdmin

## Technologies utilisées

- Symfony 6.4
- Doctrine ORM
- Twig
- Bootstrap 5
- EasyAdmin Bundle

## Auteur

[Votre nom]

## Licence

Ce projet est sous licence MIT.
Description du TP pour GitHub :
CopyCe projet est un blog développé avec Symfony 6.4 dans le cadre d'un TP de développement web. Il met en œuvre