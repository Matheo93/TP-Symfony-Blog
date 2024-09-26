<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Créer un utilisateur admin
        $admin = new User();
        $admin->setEmail('admin@example.com');
        $admin->setPassword($this->passwordHasher->hashPassword($admin, 'adminpass'));
        $manager->persist($admin);

        // Créer des catégories
        $categories = [];
        for ($i = 1; $i <= 5; $i++) {
            $category = new Category();
            $category->setName('Catégorie ' . $i);
            $manager->persist($category);
            $categories[] = $category;
        }

        // Créer des articles
        for ($i = 1; $i <= 20; $i++) {
            $article = new Article();
            $article->setTitle('Article ' . $i);
            $article->setSlug('article-' . $i);
            $article->setContent('Contenu de l\'article ' . $i . '. ' . str_repeat('Lorem ipsum dolor sit amet. ', 10));
            $article->setIsPublic(true);
            $article->setViews(rand(0, 100));
            $article->setCreator($admin);
            $article->setCategory($categories[array_rand($categories)]);
            $article->setCreatedAt(new \DateTimeImmutable());
            $article->setUpdatedAt(new \DateTimeImmutable());
            $manager->persist($article);
        }

        $manager->flush();
    }
}