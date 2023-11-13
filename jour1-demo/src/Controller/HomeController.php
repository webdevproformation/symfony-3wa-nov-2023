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
       //$table = [1,2,3];
       //dump($table);
       // dd($table); // dump and die()
        return $this->render("home/index.html.twig"); 
        // plusieurs pages pour notre premier site ! 
        // appeler une fichier de vue  
    }
    // cas pratique créer une nouvelle route exo1
    // cette route a l'url suivant : https://127.0.0.1:8000/exo1
    // appeler la méthode exo1 dans le class Exo1Controller 

    // nouveauté du langage PHP 8
    // attribut 
    #[Route("/contact" , name:"contact")]
    public function contact() : Response{
        
        //return new Response("nous contacter") ; 
        return $this->render("home/contact.html.twig");
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

    #[Route("/exo2", name:"exo2")]
    public function exo2() : Response{
        return $this->render("home/exo2.html.twig"); 
    }


    // créer une nouvelle route exo2
    // appeler une méthode exo2 dans le controlle HomeController
    // cette méthode appelle une vue 
    // home/exo2.html.twig 
    // cette vue va hérité du template base.html.twig
    // le fichier exo2.html.twig  remplis le block body avec la balise html 
    // <h1>exo 2</h1>
    // remplir la balise <title></title> avec le texte "je suis exo 2"
}