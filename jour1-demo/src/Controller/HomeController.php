<?php 

namespace App\Controller ;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController{ // class 

    public function index() : Response { // méthode => action  
        // echo "coucou";
        // die();
       // return new Response("coucou"); 
        return $this->render("home/index.html.twig"); 
        // appeler une fichier de vue  
    }
    // cas pratique créer une nouvelle route exo1
    // cette route a l'url suivant : https://127.0.0.1:8000/exo1
    // appeler la méthode exo1 dans le class Exo1Controller 

    // nouveauté du langage PHP 8
    // attribut 
    #[Route("/contact" , name:"contact")]
    public function contact() : Response{
        return new Response("nous contacter") ; 
    }

    /**
     * phpdoc 
     * @Route("/sav" , name="sav")
     * 
     * @return Response
     */
    public function sav():Response{
        // composer require annotations
        return new Response("nous contacte le sav") ; 
    }
}