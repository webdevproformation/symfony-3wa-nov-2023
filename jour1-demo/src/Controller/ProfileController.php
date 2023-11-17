<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function index( ArticleRepository $repo ): Response
    {

        /**
         * @var App\Entity\Membre
         */
        $user = $this->getUser();
        $pseudo = $user->getPseudo();

        $articlesUser = $repo->findBy([
            "membre" =>  $user
        ]); // requête avec jointure

        return $this->render('profile/index.html.twig', [
            'pseudo' => $pseudo,
            "articles" => $articlesUser
        ]);
    }
}
