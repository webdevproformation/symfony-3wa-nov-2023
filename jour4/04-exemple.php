<?php 

// décrit 
class Etudiant{
    public $nom ;
    public $prenom; 
}

// créer un étudiant 
$e = new Etudiant();
$e->nom = "DOE";
$e->prenom = "John";

// affiche un étudiant 
echo "{$e->prenom} {$e->nom}"; 
