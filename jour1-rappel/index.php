<?php 
// créer un nouveau dossier jour1-rappel
// dans ce dossier index.php 
// le fichier principal de notre mini projet 

// importer la class 
require_once "src/User.php";
require_once "src/lib/User.php"; 
// erreur fatale => vous ne pouvez pas avoir deux fois le même nom de class 
// FQCN (Fully Qualified Class Name)

$user = new \src\lib\User(); // créer un objet

$user2 = new \src\User();
echo $user->name();
echo "<br>"; 
echo $user2->new() ; // exécuter la méthode de mon objet $user ; 

// cd jour1-rappel
// php -S localhost:1234
// http://localhost:1234
