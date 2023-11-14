<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article/new', name: 'app_article')]
    public function index(): Response
    {
        // générer le formulaire depuis ArticleType 
        $article = new Article();
        $article->setAuteur("Victor Hugo");
        $form = $this->createForm(ArticleType::class , $article);
        // et le retourner 
        return $this->render('article/index.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
