<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory ;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager  ): void
    {
        $faker = Factory::create();
        // $product = new Product();
        $categorie = new Categorie();
        $categorie->setLabel($faker->words(1 , true))
                -> setDescription($faker->paragraphs(1, true))
                ->setEtat(true);

        $manager->persist($categorie); 
        for($i = 0 ; $i < 100 ; $i++){

            $auteur = $faker->randomElements(['Victor Hugo', 'moi'])[0];

            $article = new Article();
            $article->setTitle($faker->words(7, true))
                    ->setDescription($faker->paragraphs(3, true))
                    ->setAuteur($auteur)
                    ->setLiked($faker->numberBetween(2,10))
                    ->setCategories($categorie);

            $manager->persist($article);
        }
        $manager->flush();
    }
}
