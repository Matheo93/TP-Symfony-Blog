<?php

namespace App\Controller;

use App\Entity\Article; // Assurez-vous que la classe Article existe
use App\Form\ArticleType; // Assurez-vous que la classe ArticleType existe
use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function index(ArticleRepository $articleRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $articleRepository->createQueryBuilder('a')
            ->orderBy('a.createdAt', 'DESC')
            ->getQuery();

        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10 // Nombre d'articles par page
        );

        return $this->render('article/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    #[Route('/search', name: 'app_article_search', methods: ['GET'])]
    public function search(Request $request, ArticleRepository $articleRepository, PaginatorInterface $paginator): Response
    {
        $queryTerm = $request->query->get('q');
        $query = $articleRepository->createQueryBuilder('a')
            ->where('a.title LIKE :queryTerm')
            ->setParameter('queryTerm', '%' . $queryTerm . '%')
            ->orderBy('a.createdAt', 'DESC')
            ->getQuery();

        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10 // Nombre d'articles par page
        );

        return $this->render('article/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    #[Route('/articles/new', name: 'app_article_new')]
public function new(Request $request, EntityManagerInterface $entityManager): Response
{
    $article = new Article();
    $form = $this->createForm(ArticleType::class, $article);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $article->setCreator($this->getUser());
        $article->setCreatedAt(new \DateTimeImmutable());
        $article->setUpdatedAt(new \DateTimeImmutable());
        $article->setViews(0);
        $entityManager->persist($article);
        $entityManager->flush();

        return $this->redirectToRoute('app_article_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->render('article/new.html.twig', [
        'form' => $form->createView(),
    ]);
}

    #[Route('/article/{id}', name: 'app_article_show', methods: ['GET', 'POST'])]
    public function show($id, ArticleRepository $articleRepository, Request $request, EntityManagerInterface $entityManager): Response
    {
        $article = $articleRepository->find($id);
        if (!$article) {
            throw $this->createNotFoundException('L\'article demandé n\'existe pas.');
        }

        $comment = new Comment();
        $commentForm = $this->createForm(CommentType::class, $comment);
        $commentForm->handleRequest($request);

        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            $comment->setArticle($article);
            $comment->setCreatedAt(new \DateTimeImmutable());
            $comment->setAuthor($this->getUser());

            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute('app_article_show', ['id' => $article->getId()]);
        }

        return $this->render('article/show.html.twig', [
            'article' => $article,
            'comment_form' => $commentForm->createView(),
        ]);
    }
}
