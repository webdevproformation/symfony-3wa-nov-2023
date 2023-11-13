<?php 
// créer un nouveau dossier jour1-rappel
// dans ce dossier index.php 
// le fichier principal de notre mini projet 

// importer la class 
//require_once "src/User.php";
//require_once "src/lib/User.php"; 

require __DIR__ . "/vendor/autoload.php";

use src\lib\User ; // c'est cette syntaxe que l'on va utiliser en permanence sur Symfony 
use src\User as User2; 
use src\Article ; 

// équivalence 
// si j'appelle une librairie qui a le namespace src\\ => la class se trouve dans le dossier src/ 

// erreur fatale => vous ne pouvez pas avoir deux fois le même nom de class 
// FQCN (Fully Qualified Class Name)

$user = new User(); // créer un objet

$user2 = new User2();
echo $user->name();
echo "<br>"; 
echo $user2->new() ; // exécuter la méthode de mon objet $user ; 

echo (new Article())->nouveau();

// cd jour1-rappel
// php -S localhost:1234
// http://localhost:1234/index3.php


// composer init 
// oui partout
// modifier le fichier composer.json => psr-4 => "src\\" => "src/"
// composer dump-autoload => mettre à jour le fichier vendor/autoload_psr4.php

//  require __DIR__ . "/vendor/autoload.php";

// use src\User ; 
// import User from User ; 