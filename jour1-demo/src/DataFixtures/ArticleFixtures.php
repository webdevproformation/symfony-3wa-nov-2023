<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory ;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager  ): void
    {
        $faker = Factory::create();
       
        // récupérer la référence dans une autre fixture 
        $categorie = $this->getReference("categorie_1");

        for($i = 0 ; $i < 100 ; $i++){

            $auteur = $faker->randomElements(['Victor Hugo', 'moi'])[0];

            $article = new Article();
            $article->setTitle($faker->words(7, true))
                    ->setDescription($faker->paragraphs(3, true))
                    ->setAuteur($auteur)
                    ->setLiked($faker->numberBetween(2,10))
                    ->setCategories($categorie)
                    ->setImage("76765393cb30ff425944521c25e1cdd1.jpg");

            $manager->persist($article);
        }
        $manager->flush();
    }

    // permet de dire dans quel ordre les fixtures doivent être exécuté 
    // par la commande php bin/console doctrine:fixtures:load
    public function getDependencies(): array{
        return [
            CategorieFixtures::class
        ];
    }
}
