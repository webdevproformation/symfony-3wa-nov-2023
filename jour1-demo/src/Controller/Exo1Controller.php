<?php 

namespace App\Controller ;

use App\Entity\Article;

use Doctrine\ORM\EntityManager;
use App\Repository\ArticleRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Exo1Controller extends AbstractController{

    // ajouter un attribut directement à côté de la méthode 
    //#[Route("/toto" , name:"nom")]
    /**
     * @Route("/url-avec-des-mots-cle" , name="nom")
     *
     * @return Response
     */
    public function index( ArticleRepository $repo , ManagerRegistry $doctrine ) :Response{

        /* $user = [
            "nom" => "Alain",
            "age" => 20,
            "adresse" => "65 rue de Lille"
        ];
        $user2 = [
            "nom" => "Céline",
            "age" => 12,
            "adresse" => "65 rue de Marseille"
        ]; */

        $nouvelArticle = new Article();
        $nouvelArticle->setTitle("coucou")
                      ->setAuteur("moi")
                      ->setDescription("re coucou")
                      ->setLiked(200);
        $em = $doctrine->getManager();
        $em->persist($nouvelArticle);
        $em->flush(); 

        // SELECT $articles = $repo->findAll();

        return $this->render("toto/titi.html.twig" , /* [ "articles" => $articles ] */); 
        return new Response("un peu de coucou final test"); 
    }
}