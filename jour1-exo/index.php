
<?php 

// composer init 
// modifier le fichier composer.json 
/**
"psr-4": {
    "lib\\": "lib/"
}
composer dump-autoload
nous allons ajouter une librairie téléchargée depuis packagist 
symfony/yaml 
composer require symfony/yaml 
 */
require __DIR__ . "/vendor/autoload.php"; 

use lib\HomeController ;
use Symfony\Component\Yaml\Yaml ; 

$donnees = Yaml::parseFile("data.yaml"); 

var_dump($donnees); 

echo $donnees["etudiant"];
echo $donnees["adresse"]; 

foreach($donnees["etudiants"] as $etudiant){
    echo $etudiant . "<br>"; 
}

echo $donnees["formation"]["adresse"]["ville"] . "<br>"; 

$bonjour = new HomeController();
echo $bonjour->index() . "<br>"; 

// php -S localhost:1235

echo $donnees["description"];
