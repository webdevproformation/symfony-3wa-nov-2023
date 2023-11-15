<?php

namespace App\Controller;

use App\Entity\Search;
use App\Form\SearchType;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RechercheController extends AbstractController
{
    #[Route('/recherche', name: 'app_recherche')]
    public function index( ArticleRepository $repo , Request $request ): Response
    {

        $articles = $repo->getArticleDesc();

        $search = new Search();
        $form = $this->createForm(SearchType::class , $search);
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $articles = $repo->getArticleByKeyWord($search->getTexte());
        }

        //dd($form->createView());
        return $this->render('recherche/index.html.twig', [
            'articles' => $articles,
            "titreH1" => count($articles) . " articles ",
            'form' => $form->createView()
        ]);
    }
}
