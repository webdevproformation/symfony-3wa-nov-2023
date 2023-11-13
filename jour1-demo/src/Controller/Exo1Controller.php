<?php 

namespace App\Controller ;

use Symfony\Component\HttpFoundation\Response;

class Exo1Controller{

    public function index() :Response{
        return new Response("un peu de texte"); 
    }
}