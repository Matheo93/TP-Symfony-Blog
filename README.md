# Blog Symfony

Ce projet est un blog développé avec Symfony 6.4, répondant aux exigences d'un TP de développement web.

## Installation

1. Clonez le dépôt :
git clone https://github.com/Matheo93/TP-Symfony-Blog.git

2. Installez les dépendances :
composer install

3. Configurez votre base de données dans le fichier `.env.local`

4. Créez la base de données :
php bin/console doctrine:database:create
   
5. Appliquez les migrations :
php bin/console doctrine:migrations:migrate
   
6. Chargez les fixtures (données de test) :
php bin/console doctrine:fixtures:load
   
7. Installez les dépendances front-end :
npm install
npm run build
   
8. Lancez le serveur Symfony :
symfony server:start
   
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

[Beuve Mathéo]

## Licence

Ce projet est sous licence MIT.
Description du TP pour GitHub :
CopyCe projet est un blog développé avec Symfony 6.4 dans le cadre d'un TP de développement web. Il met en œuvre les fonctionnalités essentielles d'un blog moderne, notamment la gestion des articles, des catégories, et des utilisateurs. Le projet utilise Doctrine ORM pour la persistance des données, Twig pour le rendu des templates, et intègre Bootstrap pour un design responsive. L'interface d'administration est gérée via EasyAdmin Bundle pour une gestion simplifiée du contenu.
