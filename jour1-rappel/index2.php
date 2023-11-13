<?php 
// créer un nouveau dossier jour1-rappel
// dans ce dossier index.php 
// le fichier principal de notre mini projet 

// importer la class 
require_once "src/User.php";
require_once "src/lib/User.php"; 

use src\lib\User ; // c'est cette syntaxe que l'on va utiliser en permanence sur Symfony 
use src\User as User2; 

// équivalence 
// si j'appelle une librairie qui a le namespace src\\ => la class se trouve dans le dossier src/ 

// erreur fatale => vous ne pouvez pas avoir deux fois le même nom de class 
// FQCN (Fully Qualified Class Name)

$user = new User(); // créer un objet

$user2 = new User2();
echo $user->name();
echo "<br>"; 
echo $user2->new() ; // exécuter la méthode de mon objet $user ; 

// cd jour1-rappel
// php -S localhost:1234
// http://localhost:1234/index2.php
