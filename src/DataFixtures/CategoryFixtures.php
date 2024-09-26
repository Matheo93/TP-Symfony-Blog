<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('admin@example.com');
        $user->setPassword('$2y$13$hYqzGx7PCZ1nFVUd6zd3JO6THx0T4Oln9CIwWIYnTrRLw0VuVJxBi'); // Hashed password for 'password123'
        $manager->persist($user);

        $categories = ['Technologie', 'Voyage', 'Cuisine', 'Sport', 'Culture'];

        foreach ($categories as $categoryName) {
            $category = new Category();
            $category->setName($categoryName);
            $manager->persist($category);
        }

        $manager->flush();
    }
}