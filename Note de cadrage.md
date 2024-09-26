# Mini blog

## Controller


| Controller | Route | Description |
| :--- | :--- | :--- |
| HomeController | / | Page d'accueil |
| ArticleController | /article | Page des articles |
| ArticleController | /article/{id} | Page d'un article |


Commande pour créer un controller :
````bash
    symfony console make:controller
````


## Entity

| Entity | Description |
| :--- | :--- |
| Article | Article du blog |

Commande pour créer une entité :
````bash
    symfony console make:entity
````

### Propriétés

| Propriété | Type | Description |
| :--- | :--- | :--- |
| id | int | Identifiant unique |
| title | string | Titre de l'article |
| content | text | Contenu de l'article |
| createdAt | datetime | Date de création de l'article |
| updatedAt | datetime | Date de modification de l'article |
| isPremium | boolean | Article premium |
| author | string | Auteur de l'article |

## Routes

Route de l'accueil du blog : 

```php
    return $this->render('home/index.html.twig', [
        'controller_name' => 'HomeController',
        'articles' => $articles->findBy(
                [],
                ['createdAt' => 'DESC'],
                6
            )
        )
    ]);

```

Route des articles

```php
    return $this->render('article/index.html.twig', [
        'controller_name' => 'ArticleController',
        'articles' => $articles->findBy(
                [],
                ['createdAt' => 'DESC']
            )
        )
    ]);
```

Route d'un article

```php

#Route : /article/{id}, name="article_show", methods=["GET"])
public function show(ArticleRepository $articles, $id): Response{
    return $this->render('article/show.html.twig', [
        'articles' => $articles->findOneBy(
                [id => $id],
            )
        )
    ]);
}
```