<?php 

namespace App\Controller ;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController{ // class 

    public function index( ManagerRegistry $doctrine , ArticleRepository $repo ) : Response { // méthode => action  
        // echo "coucou";
        // die();
       // return new Response("coucou"); 
       //$table = [1,2,3];
       //dump($table);
       // dd($table); // dump and die()

        /* 
        INSERT 
        $article = new Article();
        $article->setTitle("premier article")
                ->setAuteur("Victor Hugo")
                ->setCreatedAt(new \DateTimeImmutable());
        $em = $doctrine->getManager();
        $em->persist($article);
        $em->flush();  */

        // $connexion PDO 
        // SQL = "INSERT INTO ..."
        // $statement = $connexion-> prepare(SQL)
        // $statemente->executer()

        // UPDATE
        /* $article1 = $repo->find(1); // SELECT 
        $article1->setAuteur("George Sand");
        $em = $doctrine->getManager();
        $em->persist($article1);
        $em->flush(); */

        // $sql =  "SELECT * FROM article WHERE id = ?"
        // $statement = $connexion->prepare($sql);
        // $statement->bindParams(1, $id , PDO::PARAM_INT)

        // dd($article);

        // SELECT * 
        $articles = $repo->findAll();
        //dump($articles); 
        
        return $this->render("home/index.html.twig" , [ "articles" => $articles ]); 
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