<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'app_category_index', methods: ['GET'])]
public function index(CategoryRepository $categoryRepository): Response
{
    return $this->render('category/index.html.twig', [
        'categories' => $categoryRepository->findAll(),
    ]);
}
}
