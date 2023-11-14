<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article/new', name: 'article_new')]
    public function index( Request $request , ManagerRegistry $doctrine ): Response
    {
        // générer le formulaire depuis ArticleType 
        $article = new Article();
        $article->setAuteur("Victor Hugo");
        $form = $this->createForm(ArticleType::class , $article);
        // et le retourner 

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $doctrine->getManager();
            // dd($article);
            $em->persist($article); // va stocker les valeurs du formulaire 
            // DANS l'entité
            $em->flush();
            $this->addFlash("success", "Article bien crée");
            return $this->redirectToRoute("home");
        }

        return $this->render('article/index.html.twig', [
            "form" => $form->createView()
        ]);
    }
}

// cas pratique 
// créer CategorieType basé sur l'entité Categorie 
// créer un nouveau Controller permettant d'ajouter de nouvelle catégorie 
// dans la vue de l'action du controlleur => afficher un formulaire 
// qui va permettre d'ajouter une nouvelle catégorie 