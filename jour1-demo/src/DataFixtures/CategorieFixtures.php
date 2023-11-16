<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        // $product = new Product();
        $categorie = new Categorie();
        $categorie->setLabel($faker->words(1 , true))
                -> setDescription($faker->paragraphs(1, true))
                ->setEtat(true);
        $manager->persist($categorie);
        $manager->flush();// ne pas oublier le flush

        $this->addReference("categorie_1" , $categorie) ; 
        // méthode nous allons pouvoir passe une catégorie factice 
        // d'une fixture à l'autre 

    }
}
